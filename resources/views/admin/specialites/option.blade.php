@extends('admin.specialites.show')
@section('option')
@php
    use Carbon\Carbon;
@endphp
    @switch($option)
        @case('matieres')
            @php
                $title ='Liste des matières de la spécialitée '. ucwords($specialite->intitule) .' - Niveau '. $niveau->intitule .' - '. ucfirst($specialite->periode);
            @endphp

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div style="text-align: end">
                                <a class="btn btn-primary mr-2" href="{{ route('matieres.create',['x' => $specialite->id, 'm' => $niveau->id,]) }}">Ajouter une matière</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Intitule</th>
                                            <th>Credit</th>
                                            <th>Heures</th>
                                            <th>Semestre</th>
                                            <th>Module</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($specialite->matieres($niveau->id) as $i => $matiere)
                                            <tr class="element">
                                                <td>{{ $i+= 1 }}</td>
                                                <td class="data">{{ strtoupper($matiere->code) }}</td>
                                                <td class="data">{{ ucfirst($matiere->intitule) }}</td>
                                                <td class="data">{{ $matiere->credit }}</td>
                                                <td class="data">{{ $matiere->heure }}</td>
                                                <td class="data">{{ $matiere->semestre }}</td>
                                                <td class="data">{{ strtoupper($matiere->module->code).' - '.ucfirst($matiere->module->intitule) }}</td>
                                                <td>
                                                    <a href="{{ route('matieres.edit', $matiere->id) }}" class="fa fa-pencil" title="Modifier"></a>&nbsp;
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <tr><td colspan="8" style="text-align: center">Aucunes matières dans cette spécialitée ...</td></tr>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            
        @break
        @case('etudiants')
            @php
                $title ='Liste des étudiants de la spécialitée '. ucwords($specialite->intitule) .' - Niveau '. $niveau->intitule .' - '. ucfirst($specialite->periode);
            @endphp
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div style="text-align: end">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Matricule</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($specialite->inscriptions($niveau->id) as $i => $inscription)
                                            <tr class="element">
                                                <td>{{ $i+= 1 }}</td>
                                                <td class="data">{{ strtoupper($inscription->matricule) }}</td>
                                                <td class="data">{{ ucwords($inscription->nom) }}</td>
                                                <td class="data">{{ ucwords($inscription->prenom) }}</td>
                                                <td>
                                                    <a href="{{ route('etudiants.edit', $inscription->etudiant_id) }}" class="fa fa-pencil" title="Modifier"></a>&nbsp;
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <tr><td colspan="8" style="text-align: center">Aucunes matières dans cette spécialitée ...</td></tr>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        @break
        @default
    @endswitch
@endsection
