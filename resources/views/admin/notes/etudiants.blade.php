

@extends('Dashboard')
@section('content')

<div class="page-header">
    <h3 class="page-title">Rélevé de note semestre {{ $semestre == 0 ? '1 & 2' : $semestre }} de la spécialitée {{ ucwords($specialite->intitule) }} Niveau {{ $niveau->id }}</h3>
</div>
<br>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Documents</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($specialite->inscriptions($niveau->id) as $key => $inscription)
                                <tr>
                                    <td>{{ $key += 1}}</td>
                                    <td>{{ ucwords($inscription->nom) }}</td>
                                    <td>{{ ucwords($inscription->prenom) }}</td>
                                    <td>
                                        <a href="{{ route('notes.releve', [$specialite->id, $niveau->id, $semestre, $inscription->etudiant_id]) }}">Rélevé</a>&nbsp;&nbsp;
                                        <a href="{{ route('notes.pv', [$specialite->id, $niveau->id, $semestre, $inscription->etudiant_id]) }}">pv</a>&nbsp;&nbsp;
                                    </td>
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

@endsection
