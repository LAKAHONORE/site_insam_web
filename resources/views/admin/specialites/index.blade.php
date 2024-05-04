@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Listes des specialites</h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('specialites.create') }}" class="btn btn-primary mr-2">Ajouter une specialite</a></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cycle</th>
                                <th>Filiere</th>
                                <th>Code</th>
                                <th>Intitule</th>
                                <th>Période</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($specialites as $key => $specialite)
                                <tr>
                                    <td>{{ $key += 1}}</td>
                                    <td>{{ strtoupper($specialite->filiere->cycle->code) }}</td>
                                    <td>{{ ucwords($specialite->filiere->intitule) }}</td>
                                    <td>{{ strtoupper($specialite->code) }}</td>
                                    <td>{{ ucwords($specialite->intitule) }}</td>
                                    <td>{{ ucwords($specialite->periode) }}</td>
                                    <td>
                                        <a href="{{ route('specialites.edit', $specialite->id) }}" class="fa fa-pencil" title="Modifier"></a>&nbsp;
                                        <a href="{{ route('specialites.show', $specialite->id) }}"><i class="fa fa-bars"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" style="text-align: center">Aucun specialite pour le moment</td></tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
