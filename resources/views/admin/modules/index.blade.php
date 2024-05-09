@extends('Dashboard')

@section('content')


<div class="page-header">
    <h3 class="page-title">Listes des modules</h3>
</div>
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end">
                    {{-- <span id="export" class="btn btn-primary mr-2">Exporter en excel</span> --}}
                    <a href="{{ route('modules.create') }}" class="btn btn-primary mr-2">Ajouter un module</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        @php $datas = []; @endphp
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Intitule</th>
                                <th>Catégorie</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($modules as $key => $module)
                                @php 
                                    $datas[] = [ 
                                        strtoupper($module->code),
                                        strtoupper($module->intitule),
                                        strtoupper($module->categorie),
                                    ];
                                @endphp
                                <tr>
                                    <td>{{ $key += 1}}</td>
                                    <td>{{ strtoupper($module->code) }}</td>
                                    <td>{{ strtoupper($module->intitule) }}</td>
                                    <td>{{ ucfirst($module->categorie) }}</td>
                                    <td>
                                        <a href="{{ route('modules.edit', $module->id) }}" class="fa fa-pencil" title="Modifier"></a>
                                    </td>
                                </tr>
                            @empty
                                <tr></tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @php
        $infos = 'Liste des modules';
    @endphp
    <script>
        $('#export').on('click', function() {
            XlsxPopulate.fromBlankAsync().then(workbook => {
                const sheet = workbook.sheet(0);
                sheet.cell('A1').value('code');
                sheet.cell('B1').value('intitule');
                sheet.cell('C1').value('categorie');

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
