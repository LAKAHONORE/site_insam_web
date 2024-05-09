@extends('Dashboard')

@section('content')

    @php
        $cycles = App\Models\Cycle::all();
    @endphp
    <div class="page-header">
        <h3 class="page-title">Ajout / Modifications des notes de la spécialité {{ ucwords($specialite->intitule) }} Niveau {{ $matiere->niveau_id }}</h3>
    </div>
    <br>
    <h5 class='row'>
        <span class="col">Matière: {{ ucfirst($matiere->intitule )}}</span>
        <span class="col-4">Examen: {{ ucfirst($examen->intitule )}}</span>
        <span class="col-3">Semestre: {{ $semestre }}</span>
    </h5> 
    <br>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: end"><span id="export" class="btn btn-primary mr-2">Exporter en excel</span></div>
                    <div class="table-responsive">
                        <table class="table table-striped" style="width: 100%">
                            @php $datas = []; @endphp
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($specialite->inscriptions($matiere->niveau_id) as $key => $inscription)
                                    @php 
                                        $datas[] = [ 
                                            $inscription->etudiant->inscription->notes()->where(['matiere_id' => $matiere->id,'examen_id' => $examen->id])->get()[0]->id ?? 0,
                                            $inscription->etudiant->inscription->id,
                                            $examen->id,
                                            $matiere->id,
                                            ucfirst($inscription->nom),
                                            ucfirst($inscription->prenom),
                                            $inscription->etudiant->inscription->notes()->where(['matiere_id' => $matiere->id,'examen_id' => $examen->id])->get()[0]->note ?? '',
                                        ];
                                    @endphp
                                    <tr>
                                        <td>{{ $key += 1}}</td>
                                        <td>{{ ucfirst($inscription->matricule) }}</td>
                                        <td>{{ ucwords($inscription->nom) }}</td>
                                        <td>{{ ucwords($inscription->prenom) }}</td>
                                        <td><input inscription_id="{{ $inscription->etudiant->inscription->id }}" composer_id="{{ $inscription->etudiant->inscription->notes()->where(['matiere_id' => $matiere->id,'examen_id' => $examen->id])->get()[0]->id ?? '0' }}" value="{{ $inscription->etudiant->inscription->notes()->where(['matiere_id' => $matiere->id,'examen_id' => $examen->id])->get()[0]->note ?? '' }}" type="number" min="0" max='20' class="note form-control"></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" style="text-align: center">Aucun étudiant pour le moment</td></tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $infos = 'Notes de '.strtoupper($examen->code). ' de ' .strtoupper($matiere->intitule). ' Semestre '. $matiere->semestre. ' de ' .ucfirst($specialite->intitule). ' ' .ucfirst($specialite->periode). ' Niveau ' .$matiere->niveau->intitule;
    @endphp
    <script>
        $('#export').on('click', function() {
            XlsxPopulate.fromBlankAsync().then(workbook => {
                const sheet = workbook.sheet(0);
                sheet.cell('A1').value('id');
                sheet.cell('B1').value('inscription_id');
                sheet.cell('C1').value('examen_id');
                sheet.cell('D1').value('matiere_id');
                sheet.cell('E1').value('Nom');
                sheet.cell('F1').value('Prenom');
                sheet.cell('G1').value('note');

                const data = @json($datas);

                data.forEach((rowData, rowIndex) => {
                    rowData.forEach((cellData, colIndex) => {
                    const cell = sheet.cell(rowIndex + 2, colIndex + 1);
                    cell.value(cellData);
                    });
                });
                
                workbook.outputAsync() .then(function(arrayBuffer) {
                    const blob = new Blob([arrayBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = @json($infos);
                    a.click();
                    URL.revokeObjectURL(url);

                    Swal.fire(
                        'Message',
                        'Exporter avec succès !',
                        'success'
                    );
                });
            }); 
        });

        $('.note').each(function (i, input){
        
            $(input).on('input',function(){
                if ($(this).val() < 0 || $(this).val() > 20 || $(this).val().length > 5) {
                    $(this).val($(this).val().slice(0, -1))
                }
                if ($(this).val().length == 0) {
                    $(this).val('0')
                }   
            })

            
            $(input).on('change',function(){
                let params = null;
                if ($(this).attr('composer_id') !== '0') {
                    params = {
                        composer_id: $(this).attr('composer_id'),
                        note: $(this).val(),
                    }
                }
                else {
                    params = {
                        inscription_id: $(this).attr('inscription_id'),
                        examen_id: @json($examen->id),
                        matiere_id: @json($matiere->id),
                        note: $(this).val(),
                    }
                }
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': '<?= csrf_token(); ?>'},
                    type: 'POST',
                    url: '{{ route("notes.store") }}',
                    data: params,
                    success: function(data) {
                        if (data == 1) {
                            $(input).parent('td').find('span').remove();
                            $(input).parent('td').append(
                                $('<span>',{
                                    'style': 'font-weight:600;font-size:13px;color:green'
                                }).html('Note modifiée avec succès !')
                            )
                        } else {
                            $(input).parent('td').find('span').remove();
                            $(input).parent('td').append(
                                $('<span>',{
                                    'style': 'font-weight:600;font-size:13px;color:green'
                                }).html('Note ajoutée avec succès !')
                            ) 
                        }                    
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            })
        });
    </script>

@endsection
