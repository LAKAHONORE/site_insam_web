@extends('admin.specialites.show')
@section('option')
    @php
        $title = 'Informations sur la spécialitée ' . ucwords($specialite->intitule) .' - '. ucfirst($specialite->periode)
    @endphp
    <section class='row'>
        @switch($specialite->filiere->cycle->code)
            @case('bts')
                {{-- Etudiants --}}
                <div class="col-5">
                    @foreach ($niveaux->where('intitule', '<', 3) as $niveau)
                        <div class="card" style="padding-left: 10px">
                            <span class="block" style="font-size: 2em">{{ $specialite->inscriptions($niveau->id)->count() }}</span>
                            <p class='row' style="padding-left: 25px">
                                <span class="col">Étudiants au Niveau {{ $niveau->intitule }}</span>
                                <a class="col" style="text-align: end" href="{{ route('option',['etudiants', $specialite->id, $niveau->id]) }}">Détails <i class="bi bi-arrow-right" style="position: relative;top: 2px;"></i></a>
                                &nbsp;&nbsp;
                            </p>
                        </div><br>
                    @endforeach
                </div>

                {{-- Matieres --}}
                <div class="col-5">
                    @foreach ($niveaux->where('intitule', '<', 3) as $niveau)
                        <div class="card">
                            <span class="block" style="font-size: 2em">{{ $specialite->matieres($niveau->id)->count() }}</span>
                            <p class='row' style="padding-left: 25px">
                                <span class="col">Matières au Niveau {{ $niveau->intitule }}</span>
                                <a class="col" style="text-align: end" href="{{ route('option',['matieres', $specialite->id, $niveau->id]) }}">Détails <i class="bi bi-arrow-right" style="position: relative;top: 2px;"></i></a>
                                &nbsp;&nbsp;
                            </p>
                        </div><br>
                    @endforeach
                </div> 
            @break

            @case('licence')
                {{-- Etudiants --}}
                <div class="col-5">
                    <div class="card">
                        <span class="block" style="font-size: 2em">{{ $specialite->inscriptions($niveau->id)->count() }}</span>
                        <p class='row' style="padding-left: 25px">
                            <span class="col">Étudiants au Niveau 3</span>
                            <a class="col" style="text-align: end" href="{{ route('option',['etudiants', $specialite->id, $niveaux->where('intitule', 3)[2]->id]) }}">Détails <i class="bi bi-arrow-right" style="position: relative;top: 2px;"></i></a>
                            &nbsp;&nbsp;
                        </p>
                    </div>
                </div>

                {{-- Matieres --}}
                <div class="col-5">
                    <div class="card">
                        <span class="block" style="font-size: 2em">{{ $specialite->matieres($niveau->id)->count() }}</span>
                        <p class='row' style="padding-left: 25px">
                            <span class="col">Matières au Niveau 3</span>
                            <a class="col" style="text-align: end" href="{{ route('option',['matieres', $specialite->id, $niveaux->where('intitule', 3)[2]->id]) }}">Détails <i class="bi bi-arrow-right" style="position: relative;top: 2px;"></i></a>
                            &nbsp;&nbsp;
                        </p>
                    </div>
                </div> 
            @break

            @case('master')
                {{-- Etudiants --}}
                <div class="col-5">
                    @foreach ($niveaux->where('intitule', '<', 6)->where('intitule', '>', 3) as $niveau)
                        <div class="card">
                            <span class="block" style="font-size: 2em">{{ $specialite->inscriptions($niveau->id)->count() }}</span>
                            <p class='row' style="padding-left: 25px">
                                <span class="col">Étudiants au Niveau {{ $niveau->intitule }}</span>
                                <a class="col" style="text-align: end" href="{{ route('option',['etudiants', $specialite->id, $niveau->id]) }}">Détails <i class="bi bi-arrow-right" style="position: relative;top: 2px;"></i></a>
                                &nbsp;&nbsp;
                            </p>
                        </div><br>
                    @endforeach
                </div>

                {{-- Matieres --}}
                <div class="col-5">
                    @foreach ($niveaux->where('intitule', '<', 6)->where('intitule', '>', 3) as $niveau)
                        <div class="card">
                            <span class="block" style="font-size: 2em">{{ $specialite->matieres($niveau->id)->count() }}</span>
                            <p class='row' style="padding-left: 25px">
                                <span class="col">Matières au Niveau {{ $niveau->intitule }}</span>
                                <a class="col" style="text-align: end" href="{{ route('option',['matieres', $specialite->id, $niveau->id]) }}">Détails <i class="bi bi-arrow-right" style="position: relative;top: 2px;"></i></a>
                                &nbsp;&nbsp;
                            </p>
                        </div><br>
                    @endforeach
                </div> 
            @break

            @case('doctorat')
                {{-- Etudiants --}}
                <div class="col-5">
                    <div class="card">
                        <span class="block" style="font-size: 2em">{{ $specialite->inscriptions($niveau->id)->count() }}</span>
                        <p class='row' style="padding-left: 25px">
                            <span class="col">Étudiants au Niveau 6</span>
                            &nbsp;&nbsp;
                            <a class="col" style="text-align: end" href="{{ route('option',['etudiants', $specialite->id, $niveaux->where('intitule', 6)[0]->id]) }}">Détails <i class="bi bi-arrow-right" style="position: relative;top: 2px;"></i></a>
                        </p>
                    </div>
                </div>

                {{-- Matieres --}}
                <div class="col-5">
                    <div class="card">
                        <span class="block" style="font-size: 2em">{{ $specialite->matieres($niveau->id)->count() }}</span>
                        <p class='row' style="padding-left: 25px">
                            <span class="col">Matières au Niveau 6</span>
                            &nbsp;&nbsp;
                            <a class="col" style="text-align: end" href="{{ route('option',['matieres', $specialite->id, $niveaux->where('intitule', 6)[0]->id]) }}">Détails <i class="bi bi-arrow-right" style="position: relative;top: 2px;"></i></a>
                        </p>
                    </div>
                </div> 
            @break
            @default
        @endswitch       
    </section>
@endsection