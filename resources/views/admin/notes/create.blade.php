

@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Ajout / Modifications des notes de la spécialité {{ ucwords($specialite->intitule) }} Niveau {{ $matiere->niveau_id }}</h3>
</div>
<h5 class='row'>
    <span class="col">Matière: {{ ucfirst($matiere->intitule )}}</span>
    <span class="col-4">Examen: {{ ucfirst($examen->intitule )}}</span>
    <span class="col-3">Semestre: {{ $semestre }}</span>
</h5>
<br>
<div class="row" style="width: 100%">
    <div class="col-12 col-lg-12 grid-margin stretch-card" style="width: 100%">
        <div class="card" style="width: 100%">
            <div class="card-body" style="width: 100%">
                <div class="table-responsive" style="width: 100%">
                    <table class="table table-striped" style="width: 100%">
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
                                <tr>
                                    <td>{{ $key += 1}}</td>
                                    <td>{{ ucfirst($inscription->matricule) }}</td>
                                    <td>{{ ucwords($inscription->nom) }}</td>
                                    <td>{{ ucwords($inscription->prenom) }}</td>
                                    <td><input inscription_id="{{ $inscription->id }}" composer_id="{{ $inscription->notes()->where(['matiere_id' => $matiere->id,'examen_id' => $examen->id])->get()[0]->id ?? '0' }}" value="{{ $inscription->notes()->where(['matiere_id' => $matiere->id,'examen_id' => $examen->id])->get()[0]->note ?? '' }}" type="number" min="0" max='20' class="note form-control"></td>
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
<script>
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

</div>

@endsection
