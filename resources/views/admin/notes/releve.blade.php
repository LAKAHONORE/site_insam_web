

@extends('Dashboard')
@section('content')

<div id="pageHeader" class="page-header">
    <h3 class="page-title">Rélevé de notes</h3>
</div>
<div style="text-align: end"><a id="print" class="btn btn-primary mr-2">Imprimer</a></div>

<style>
    .mx-bt-6 {
        margin-bottom: 12px;
    }
    .tab {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        border-collapse: collapse;
        background-color: transparent;
        font-size: 14px;
        border: 2px solid black
    }
    .tab th,
    .tab td {
        padding: 0.75rem;
        text-align: left;
        border: 0.18rem solid black;
    }
    .tab tr {
        border: 0.18rem solid black;
    }

    .b-600{
        font-weight: 600;
    }

    .text-center {
        text-align: center;
    }

    .px-10{
        padding: 10px
    }
    .line {
        display:flex; 
        justify-content:space-between;
    }
    .wx-235 {
        width:235px;
    }
    .ecole * {
        margin: auto;
    }

    .ecole div:nth-child(4) {
        font-size: 17px;
        padding-bottom: 3px;
        border-bottom: 4px solid;
        color: black;
        width: 280px;
        margin-bottom: 3px;
        font-weight: 600;
        text-align: center;
    }

    .ecole div:nth-child(3) {
        font-size: 16px;
        padding-bottom: 3px;
        border-bottom: 4px solid;
        color: rgb(10, 49, 192);
        width: 533px;
        margin-bottom: 3px;
        text-align: center;
    }

    .ecole div:nth-child(2) {
        font-size: 31px;
        padding-bottom: 0px;
        border-bottom: 4px solid;
        color: rgba(255, 0, 0, 0.450);
        width: 877px;
        margin-bottom: 3px;
        font-family: 'cooper black';
        text-align: center;
    }

    .ecole div:nth-child(1) {
        font-weight: bolder;
        font-size: 37px;
        padding-bottom: 0px;
        border-bottom: 4px solid;
        ;
        color: rgb(10, 49, 192);
        width: 1195px;
        font-family: 'cooper black';
        text-align: center;
    }
</style>


<div id="entete">
    <div style="width:70px;height: 70%;top:132px;left:0px;position:relative;">
        <img src="{{asset('site/img/logo-insam.png')}}" style="width:90px;height: 60%;">
    </div>
    <div class="ecole" id="ecole" style="text-align: end">
        <div>INSTITUT UNIVERSITAIRE ET STRATEGIQUE DE L'ESTUAIRE</div>
        <div>Estuary Academic and Strategic Institute <span class="sigle">(IUEs/Insam)</span></div>
        <div>Sous la tutelle académique des Universités de Buea, Douala et Dschang</div>
        <div>CAMPUS ANNEXE DE BAFOUSSAM</div>
    </div>
</div>
<br><br>
<div class='text-center' style='border: 0.18rem solid black; padding: 1px'>
    <div style='font-size: 1.25em; border: 0.18rem solid black; padding: 5px; font-weight: 1000'>RÉLEVÉ DE NOTES (TRANSCRIPT)</div>
</div>
<br>
<div class='line'>
    <div class='line col-6'>
        <div class='col-5'>
            <div class="b-600 mx-bt-6">Nom et Prénom :</div>
            <div class='mx-bt-6'>Né (e) le :</div>
            <div class='mx-bt-6'>Cycle :</div>
            <div class='mx-bt-6'>Année académique :</div>
            <div class='mx-bt-6'>Matricule :</div>
        </div>
        <div class='col-7'>
            <div class="b-600 mx-bt-6">{{ strtoupper($etudiant->nom) .' '. strtoupper($etudiant->prenom) }}</div>
            <div class="b-600 mx-bt-6">{{ $etudiant->date_naissance .' à '. strtoupper($etudiant->lieu)  }}</div>
            <div class="b-600 mx-bt-6">{{ strtoupper($etudiant->inscription->specialite->filiere->cycle->code) }}</div>
            <div class="b-600 mx-bt-6">{{ $etudiant->inscription->annee->intitule }}</div>
            <div class="b-600 mx-bt-6">{{ strtoupper($etudiant->matricule) }}</div>
        </div>
    </div>
    <div class='line col-6'>
        <div class='col-5'>
            <div class='mx-bt-6' style="height: 21px"></div>
            <div class='mx-bt-6'>Filière :</div>
            <div class='mx-bt-6'>Spécialité :</div>
            <div class='mx-bt-6'>Niveau :</div>
        </div>
        <div class='col-7'>
            <div class='mx-bt-6' style="height: 21px"></div>
            <div class='mx-bt-6'>{{ strtoupper($etudiant->inscription->specialite->filiere->intitule) }}</div>
            <div class='mx-bt-6'>{{ strtoupper($etudiant->inscription->specialite->intitule) }}</div>
            <div class='mx-bt-6'>{{ strtoupper($etudiant->inscription->niveau->intitule) }}</div>
        </div>
    </div>
</div>

<table class="tab">
    <thead>
        <tr>
            <th style="width: 87px;">CODE UE</th>
            <th>UNITÉ D'ENSEIGNEMENT</th>
            <th>ÉLÉMENTS CONSTITUTIFS</th>
            <th style="width: 87px;">CRÉDIT ALLOUÉS</th>
            <th style="width: 85px;">NOTE/20</th>
            <th style="width: 78px;">CRÉDIT ACQUIS</th>
            <th style="width: 81px;">MOY/20</th>
            <th style="width: 65px;">OBS</th>
        </tr>
    </thead>
    <tbody>
        @if ($semestre == 0)
            <style>
                @media print {
                    html,body {
                        zoom: 80%;
                    }
                }
            </style>
            @php
                $credit_fon_1 = $credit_pro_1 = $credit_tra_1 = $moy_s1 = 0;
                $credit_fon_2 = $credit_pro_2 = $credit_tra_2 = $moy_s2 = 0;
            @endphp
            <tr><td colspan="8"></td></tr>
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS FONDAMENTALES 30% (2 UE) 9 CRÉDITS 135 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','fondamentales')->where('semestre', 1) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];

                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_fon_1 += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s1 += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS PROFESSIONNELLES 60% (4 UE) 18 CRÉDITS 270 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','professionnelles')->where('semestre', 1) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];

                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_pro_1 += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s1 += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS TRANSVERSALES 10% (1 UE) 3 CRÉDITS 45 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','transversales')->where('semestre', 1) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];

                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_tra_1 += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s1 += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="2" class='text-center'>NOMBRE DE CRÉDIT ACQUIS AU SEMESTRE 1</td>
                <td style="padding: 0">
                    <div class="line" style="margin: -22px 0px; padding: 0">
                        <div class='col b-600 text-center' style='border-right: 0.18rem solid black;padding: 14px;'>{{ $credit_fon_1 + $credit_pro_1 + $credit_tra_1 }}</div>
                        <div class='col'></div>
                    </div>
                </td>
                <td class='b-600 text-center'>MOY/20</td>
                <td class='b-600 text-center'>{{ substr($moy_s1 / 30, 0, 5) }}</td>
            </tr>
            <tr><td colspan="8"></td></tr> 
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS FONDAMENTALES 30% (2 UE) 9 CRÉDITS 135 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','fondamentales')->where('semestre', 2) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];
            
                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_fon_2 += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s2 += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS PROFESSIONNELLES 60% (4 UE) 18 CRÉDITS 270 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','professionnelles')->where('semestre', 2) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];
            
                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_pro_2 += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s2 += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS TRANSVERSALES 10% (1 UE) 3 CRÉDITS 45 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','transversales')->where('semestre', 2) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];
            
                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_tra_2 += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s2 += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="2" class='text-center'>NOMBRE DE CRÉDIT ACQUIS AU SEMESTRE 2</td>
                <td style="padding: 0">
                    <div class="line" style="margin: -22px 0px; padding: 0">
                        <div class='col b-600 text-center' style='border-right: 0.18rem solid black;padding: 14px;'>{{ $credit_fon_2 + $credit_pro_2 + $credit_tra_2 }}</div>
                        <div class='col'></div>
                    </div>
                </td>
                <td class='b-600 text-center'>MOY/20</td>
                <td class='b-600 text-center'>{{ substr($moy_s2 / 30, 0, 5) }}</td>
            </tr>
            @php $moy = ($moy_s1/30 + $moy_s2/30)/2; @endphp
        @else
            @php
                $credit_fon = $credit_pro = $credit_tra = $moy_s = 0;
            @endphp
            <tr><td colspan="8"></td></tr>
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS FONDAMENTALES 30% (2 UE) 9 CRÉDITS 135 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','fondamentales')->where('semestre', $semestre) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];
            
                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_fon += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS PROFESSIONNELLES 60% (4 UE) 18 CRÉDITS 270 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','professionnelles')->where('semestre', $semestre) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];
            
                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_pro += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS TRANSVERSALES 10% (1 UE) 3 CRÉDITS 45 HEURES</td>
            </tr>
            @forelse ($modules->where('categorie','transversales')->where('semestre', $semestre) as $module)
                <tr>
                    <td>{{ strtoupper($module->code) }}</td>
                    <td>{{ strtoupper($module->intitule) }}</td>
                    <td>
                        @php $notes = $credits_alloues = [];@endphp
                        @forelse ($module->matieres as $matiere)
                            @php
                                $notes[] = [
                                    'cc' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 1)->first()->note ?? null,
                                    'sn' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 2)->first()->note ?? null,
                                    'sr' => $matiere->notes->where('inscription_id', $etudiant->inscription->id)->where('examen_id', 3)->first()->note ?? null,
                                ];
            
                                $credits_alloues[] = $matiere->credit;
                            @endphp
                            <div>{{ strtoupper($matiere->intitule) }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @forelse ($credits_alloues as $credit)
                            <div>{{ $credit ?? '' }}</div>
                        @empty
                            <div></div>
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $note = []; $session = ''; @endphp
                        @forelse ($notes as $count => $n)
                            @if ($n['sr'] !== null)
                                @if ($n['cc'] !== null)
                                    @php
                                        $session = 'sr';
                                        $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sr']) * 0.7);
                                    @endphp
                                    <div>{{ substr($note[$count], 0, 5) }}</div>
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @else
                                @if ($n['cc'] !== null)
                                    @if ($n['sn'] !== null)
                                        @php
                                            $session = 'sn';
                                            $note[] = (doubleval($n['cc']) * 0.3) + (doubleval($n['sn']) * 0.7);
                                        @endphp
                                        <div>{{ substr($note[$count], 0, 5) }}</div>
                                    @else
                                        @php $note[] = 0; @endphp
                                        {{ 'SN NE' }}
                                    @endif
                                @else
                                    @php $note[] = 0; @endphp
                                    {{ 'CC NE' }}
                                @endif
                            @endif
                        @empty
                            
                        @endforelse
                    </td>
                    <td class="b-600 text-center">
                        @php $credits_acquis = [];@endphp
                        @forelse ($note as $count => $n)
                            @if ($n >= 10)
                                @php $credits_acquis[] = $credits_alloues[$count];@endphp
                                <div>{{ $credits_alloues[$count] }}</div>
                            @else
                                @php $credits_acquis[] = 0;@endphp
                                <div>{{ 0 }}</div>
                            @endif
                        @empty
                            
                        @endforelse
                        @php $credit_tra += array_sum($credits_acquis); @endphp
                    </td>
                    <td class="b-600 text-center">
                        @php $moy = 0; @endphp
                        @foreach ($note as $count => $n)
                            @php
                                $moy += $credits_alloues[$count] * $n;
                            @endphp
                        @endforeach
                        {{ substr($moy / array_sum($credits_alloues), 0, 5) }}
                        @php $moy_s += $moy; @endphp
                    </td>
                    <td class="text-center">
                        @if (array_product($credits_acquis) == 0)
                            {{ 'Na' }}
                        @else
                            @if ($session == 'sr')
                                {{ 'Ac SR' }}
                            @else
                                {{ 'Ac SN' }}
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <tr>
                <td colspan="2" class='text-center'>NOMBRE DE CRÉDIT ACQUIS AU SEMESTRE {{ $semestre }}</td>
                <td style="padding: 0">
                    <div class="line" style="margin: -22px 0px; padding: 0">
                        <div class='col b-600 text-center' style='border-right: 0.18rem solid black;padding: 14px;'>{{ $credit_fon + $credit_pro + $credit_tra }}</div>
                        <div class='col'></div>
                    </div>
                </td>
                <td class='b-600 text-center'>MOY/20</td>
                <td class='b-600 text-center'>{{ substr($moy_s / 30, 0, 5) }}</td>
            </tr>
            @php $moy = $moy_s/30; @endphp
        @endif
    </tbody>
</table>
<br>
<div class='b-600 line' style='font-size: 13px;'>
    <div style="margin: 0;padding: 0;">
        <div class='line'>
            <div style='width: 233px'></div>
            <div class='text-center' style="width: 237px; border: 0.18rem solid black; border-bottom: none">RÉCAPITULATIF ANNUEL</div>
            <div style='width: 132px;'></div>
            <div style='width: 90px;'></div>
        </div>
        <div class='line'>
            <div class='wx-235 px-10' style="border: 0.18rem solid black; border-bottom: none">NOMBRE DE CRÉDIT TOTAL</div>
            <div class='wx-235 px-10 text-center' style="border: 0.18rem solid black; border-bottom: none; border-left: none">
                @if ($semestre == 0) 60 @else 30 @endif
            </div>
            <div class='px-10 text-center' style="width: 132px; border: 0.18rem solid black; border-bottom: none; border-left: none">MOY ANNUELLE</div>
            <div class='wx-235 px-10 text-center' style="width: 90px; border: 0.18rem solid black; border-bottom: none; border-left: none">
                {{ substr($moy, 0, 5) }}
            </div>
        </div>
        <div class='line'>
            <div class='wx-235 px-10' style="border: 0.18rem solid black; border-bottom: none">NOMBRE DE CRÉDIT ACQUIS</div>
            <div class='wx-235 px-10 text-center' style="border: 0.18rem solid black; border-bottom: none; border-left: none">
                @if ($semestre == 0) 
                    {{ $credit_fon_1 + $credit_pro_1 + $credit_tra_1 + $credit_fon_2 + $credit_pro_2 + $credit_tra_2 }}
                @else 
                    {{ $credit_fon + $credit_pro + $credit_tra }}
                @endif
            </div>
            <div class='px-10 text-center' style="width: 132px; border: 0.18rem solid black; border-bottom: none; border-left: none">MENTION</div>
            <div class='px-10 text-center' style="width: 90px; border: 0.18rem solid black; border-bottom: none; border-left: none">
                @switch(true)
                    @case($moy < 4) {{ 'Nulle' }} @break
                    @case($moy >= 4 && $moy < 8) {{ 'Faible' }} @break
                    @case($moy >= 8 && $moy < 9) {{ 'Insuffisant' }} @break
                    @case($moy >= 9 && $moy < 10) {{ 'Mediocre' }} @break
                    @case($moy >= 10 && $moy < 12) {{ 'Passable' }} @break
                    @case($moy >= 12 && $moy < 14) {{ 'Assez-bien' }} @break
                    @case($moy >= 14 && $moy < 16) {{ 'Bien' }} @break
                    @case($moy >= 16 && $moy < 18) {{ 'Très-bien' }} @break
                    @default {{ 'Excellent' }}
                @endswitch
            </div>
        </div>
        <div class='line'>
            <div class='wx-235 px-10' style="border: 0.18rem solid black">POURCENTAGE D'ACQUISITION</div>
            <div class='wx-235 px-10 text-center' style="border: 0.18rem solid black; border-left: none">
                @if ($semestre == 0) 
                    {{ substr(($credit_fon_1 + $credit_pro_1 + $credit_tra_1 + $credit_fon_2 + $credit_pro_2 + $credit_tra_2)*100/60, 0, 5) }} %
                @else 
                    {{ substr(($credit_fon + $credit_pro + $credit_tra)*100/30, 0, 5) }} %
                @endif
            </div>
            <div class='px-10 text-center' style="width: 132px; border: 0.18rem solid black; border-left: none">DÉCISION</div>
            <div class='wx-235 px-10 text-center' style="width: 90px; border: 0.18rem solid black; border-left: none">
                @if ($moy >= 10) {{ 'ADMIS' }} @else {{ 'RÉFUSÉE' }} @endif
            </div>
        </div>
    </div>
    <div style="margin: 0;padding: 0; width:35%">
        <div class='line'>
            <div></div>
            <div>Legende</div>
            <div></div>
        </div>
        <div class='line'>
            <div class='px-10' style='width:50%'>Ac SN = Acquis à la session Normale</div>
            <div class='px-10' style='width:50%'>Ac SR = Acquis à la session de Rattrapage</div>
        </div>
        <div class='line'>
            <div class='px-10' style='width:50%'>Ac = Acquis</div>
            <div class='px-10' style='width:50%;text-align:left'>Na = Non Acquis</div>
        </div>
        <div class='line'>
            <div class='px-10' style='width:50%'>CC NE = Controle Continu non évalué</div>
            <div class='px-10' style='width:50%'>SN NE = Session Normale non évalué</div>
        </div>
        <div></div>
        <div class='line'>
            <div class='px-10'>Fait à Bafoussam, 02 Mai 2024</div>
        </div>
        <div class='line'>
            <div class='px-10'>POUR LE PROMOTTEUR</div>
        </div>
        <div class='line'>
            <div class='px-10'>L'ADMINISTRATION</div>
        </div>
        
    </div>
</div>

<div id="minsup">
    <div style="border-top-style: dotted;border-top:3px stripped black;padding-top:10px;margin: auto;text-align:center;margin-top: 10px;" id="minsup">
        <div style="font-size: 11px;margin: auto;margin-bottom: 3px;width:600px;text-align:center;">Arrété
            d'autorisation numéro
            05/0028/MINESUP du 12/01/2005 de Monsieur le Ministre de l'Enseignement Supérieur
        </div>
        <div style="font-size: 11px;width:520px;margin: auto;margin-bottom: 3px;text-align:center;">Agrément n°
            08/0135/%INESUP du
            06 mai 2008 de
            Monsieur le Ministre
            de
            l'Enseignement Supérieur
        </div>
        <div
            style="font-size: 11px;width:500px;margin: auto;text-align:center;margin-bottom: 5px;">
            Arrêté de
            transformation de
            l'INSAM en IUEs
            n° 12/0365/MINESUP du
            12/08/2012.</div>
        <div style="font-size: 11px;width: 645px;margin: auto;text-align:center;">
            <span style="margin-right: 4px;">BP : 4100 Douala</span>
            <span style="margin-right: 4px;">Tél/Fax : 33 40 68 03</span>
            <span style="margin-right: 4px;">Cell : 96 16 20 16 / 70 86 19 65.</span>
            <span style="margin-right: 4px;">E-mail : insam@insam-univ.net</span>
            <span style="margin-right: 4px;">Site : insam-univ.net</span>
        </div>
    </div>
</div>

<script>
    $('#print').click(function(e){
        e.preventDefault();

        $('#sidebar').hide();
        $('.navbar-brand').hide();
        $('.navbar-toggler').hide();
        $('.navbar-nav').hide(); 
        $('.navbar-menu-wrapper').css({
            'height' : '1px'
        }); 
        $('.footer').hide();
        $('#navbar').hide();

        $('#pageHeader').children().hide();
        $('#pageHeader').hide();
        $('#settings-trigger').hide();

        $('#minsup').css({
            'position': 'fixed',
            'top': '95.9%',
            'width': '100%'
        });

        $('#entete').css({
            'marginTop': '-175px',
        });

        $('#ecole div:nth-child(1)').css({
            'width': '1395px',
            'fontSize': '43px',
        });

        $('#ecole div:nth-child(1)').css({
            'width': '1395px',
            'fontSize': '43px',
        });
        $('#ecole div:nth-child(2)').css({
            'width': '1077px',
            'fontSize': '38px',
        });
        $('#ecole div:nth-child(3)').css({
            'width': '671px',
            'fontSize': '20px',
        });
        $('#ecole div:nth-child(4)').css({
            'width': '280px',
            'fontSize': '17',
        });
        
        $(this).hide();
        
        window.print();
        location.reload();
    })
</script>
@endsection
