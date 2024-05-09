@extends('Dashboard')

@section('content')


<div class="page-header">
    <h3 class="page-title">Listes des filieres</h3>
</div>
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end">
                    {{-- <span id="export" class="btn btn-primary mr-2">Exporter en excel</span> --}}
                    <a href="{{ route('filieres.create') }}" class="btn btn-primary mr-2">Ajouter une filiere</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        @php $datas = []; @endphp
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cycle</th>
                                <th>Code</th>
                                <th>Intitule</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($filieres as $key => $filiere)
                                @php 
                                    $datas[] = [ 
                                        strtoupper($filiere->cycle->code),
                                        strtoupper($filiere->code),
                                        ucwords($filiere->intitule)
                                    ];
                                @endphp
                                <tr>
                                    <td>{{ $key += 1}}</td>
                                    <td>{{ strtoupper($filiere->cycle->code) }}</td>
                                    <td>{{ strtoupper($filiere->code) }}</td>
                                    <td>{{ ucwords($filiere->intitule) }}</td>
                                    <td>
                                        <a href="{{ route('filieres.edit', $filiere->id) }}" class="fa fa-pencil" title="Modifier"></a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" style="text-align: center">Aucun filiere pour le moment</td></tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @php
        $infos = 'Liste des filères';
    @endphp
    <script>
        $('#export').on('click', function() {
            XlsxPopulate.fromBlankAsync().then(workbook => {
                const sheet = workbook.sheet(0);
                sheet.cell('A1').value('cycle');
                sheet.cell('B1').value('code');
                sheet.cell('C1').value('intitule');

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
    </script>
</div>

@endsection
