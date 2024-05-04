@extends('Dashboard')

@section('content')


<div class="page-header">
    <h3 class="page-title">Listes des ecoles</h3>
</div>
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('ecoles.create') }}" class="btn btn-primary mr-2">Ajouter une école</a></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Intitule</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ecoles as $key => $ecole)
                                <tr>
                                    <td>{{ $key += 1}}</td>
                                    <td>{{ strtoupper($ecole->code) }}</td>
                                    <td>{{ ucwords($ecole->intitule) }}</td>
                                    <td>
                                        <a href="{{ route('ecoles.edit', $ecole->id) }}" class="fa fa-pencil" title="Modifier"></a>
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
