@extends('Dashboard')

@section('content')


<div class="page-header">
    <h3 class="page-title">Listes des cycles</h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('cycles.create') }}" class="btn btn-primary mr-2">Ajouter une école</a></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ecole</th>
                                <th>Code</th>
                                <th>Intitule</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cycles as $key => $cycle)
                                <tr>
                                    <td>{{ $key += 1}}</td>
                                    <td>{{ strtoupper($cycle->ecole->code) }}</td>
                                    <td>{{ strtoupper($cycle->code) }}</td>
                                    <td>{{ ucwords($cycle->intitule) }}</td>
                                    <td>
                                        <a href="{{ route('cycles.edit', $cycle->id) }}" class="fa fa-pencil" title="Modifier"></a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" style="text-align: center">Aucun cycle pour le moment</td></tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
