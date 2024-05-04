@extends('Dashboard')

@section('content')


<div class="page-header">
    <h3 class="page-title">Listes des filieres</h3>
</div>
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('filieres.create') }}" class="btn btn-primary mr-2">Ajouter une filiere</a></div>
                <div class="table-responsive">
                    <table class="table table-striped">
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


</div>

@endsection
