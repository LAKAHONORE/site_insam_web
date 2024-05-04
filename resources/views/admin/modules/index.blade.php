@extends('Dashboard')

@section('content')


<div class="page-header">
    <h3 class="page-title">Listes des modules</h3>
</div>
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('modules.create') }}" class="btn btn-primary mr-2">Ajouter un module</a></div>
                <div class="table-responsive">
                    <table class="table table-striped">
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
                                <tr>
                                    <td>{{ $key += 1}}</td>
                                    <td>{{ strtoupper($module->code) }}</td>
                                    <td>{{ ucwords($module->intitule) }}</td>
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


</div>

@endsection
