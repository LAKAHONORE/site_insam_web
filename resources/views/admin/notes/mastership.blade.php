

@extends('Dashboard')
@section('content')

<div id="pageHeader" class="page-header">
    <h3 class="page-title">Mastership</h3>
</div>

<div style="text-align: end"><a id="print" class="btn btn-primary mr-2">Imprimer</a></div>
<br>
<style>
    @media print {
        @page {
            size: A4 landscape;
        }
    }
    .tab {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        border-collapse: collapse;
        background-color: transparent;
        font-size: 13px;
        border: 2px solid black
    }
    .tab th,
    .tab td {
        text-align: left;
        border: 0.18rem solid black;
        min-width: 105px;
        font-weight: 600
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

    .line {
        display:flex; 
        justify-content:space-between;
    }

    html, body, .container-scroller, .content-wrapper {
        overflow: auto;
        background: white;
    }

</style>

<table class="tab">
    <thead>
        <tr>
            <th style="width: 65px;">MATRICULE</th>
            <th style="width: 85px;">NOMS & PRENOMS</th>
            @if ($semestre == 0)
                @forelse ($specialite->matieres($niveau->id) as $matiere)
                    <th style="padding: 0">
                        <div style="border-bottom: 0.18rem solid black;height: 57px;">{{ strtoupper($matiere->intitule) }}</div>
                        <div class="line" style="height: 43px;">
                            <div style="width:49px;border-right: 0.18rem solid black;">CC 30%</div>
                            <div style="width:70px;border-right: 0.18rem solid black;">EXAM 70%</div>
                            <div style="width:52px;">MOY UE</div>
                        </div>
                    </th>
                @empty
                @endforelse
            @else
                @forelse ($specialite->matieres($niveau->id)->where('semestre', $semestre) as $matiere)
                    <th style="padding: 0">
                        <div style="border-bottom: 0.18rem solid black;height: 57px;">{{ strtoupper($matiere->intitule) }}</div>
                        <div class="line" style="height: 43px;">
                            <div style="width:49px;border-right: 0.18rem solid black;">CC 30%</div>
                            <div style="width:70px;border-right: 0.18rem solid black;">EXAM 70%</div>
                            <div style="width:52px;">MOY UE</div>
                        </div>
                    </th>
                @empty
                @endforelse
            @endif
            <td class="text-center">CREDIT</td>
            <td class="text-center">MOYENNE</td>
            <td>POURCENTAGE DE VALIDATION</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($specialite->inscriptions($niveau->id) as $etudiant)
            @php $moy = $credit = 0; @endphp
            <tr>
                <td>{{ strtoupper($etudiant->matricule) }}</td>
                <td>{{ ucfirst($etudiant->nom) .' '. ucfirst($etudiant->prenom) }}</td>
                @if ($semestre == 0)
                    @forelse ($specialite->matieres($niveau->id) as $matiere)
                        @php
                            $note = [];
                            $note = [ 
                                'cc' => $matiere->notes->where('inscription_id', $etudiant->id)->where('examen_id', 1)->first()->note ?? null,
                                'sn' => $matiere->notes->where('inscription_id', $etudiant->id)->where('examen_id', 2)->first()->note ?? null,
                                'sr' => $matiere->notes->where('inscription_id', $etudiant->id)->where('examen_id', 3)->first()->note ?? null,
                            ];
                            if ($note['sr'] !== null) {
                                $note['moy'] = substr((doubleval($note['cc']) * 0.3) + doubleval($note['sr']) * 0.7, 0, 5);
                            } else {
                                $note['moy'] = substr((doubleval($note['cc']) * 0.3) + doubleval($note['sn']) * 0.7, 0, 5);
                            }

                            $note['moy'] >= 10 ? $credit += $matiere->credit : $credit += 0;
                            $moy += $note['moy'] * $matiere->credit;
                        @endphp
                        <td style="padding: 0">
                            <div class="line" style="height: 43px;">
                                <div class="text-center" style="width:49px;border-right: 0.18rem solid black;">{{ $note['cc'] }}</div>
                                <div class="text-center" style="width:70px;border-right: 0.18rem solid black;">{{ $note['sr'] !== null ? $note['sr'] : $note['sn'] }}</div>
                                <div class="text-center" style="width:52px;">{{ $note['moy'] }}</div>
                            </div>
                        </td>
                    @empty
                    @endforelse
                @else
                    @forelse ($specialite->matieres($niveau->id)->where('semestre', $semestre) as $matiere)
                        @php
                            $note = [];
                            $note = [ 
                                'cc' => $matiere->notes->where('inscription_id', $etudiant->id)->where('examen_id', 1)->first()->note ?? null,
                                'sn' => $matiere->notes->where('inscription_id', $etudiant->id)->where('examen_id', 2)->first()->note ?? null,
                                'sr' => $matiere->notes->where('inscription_id', $etudiant->id)->where('examen_id', 3)->first()->note ?? null,
                            ];
                            if ($note['sr'] !== null) {
                                $note['moy'] = substr((doubleval($note['cc']) * 0.3) + doubleval($note['sr']) * 0.7, 0, 5);
                            } else {
                                $note['moy'] = substr((doubleval($note['cc']) * 0.3) + doubleval($note['sn']) * 0.7, 0, 5);
                            }

                            $note['moy'] >= 10 ? $credit += $matiere->credit : $credit += 0;
                            $moy += $note['moy'] * $matiere->credit;
                        @endphp
                        <td style="padding: 0">
                            <div class="line" style="height: 43px;">
                                <div class="text-center" style="width:49px;border-right: 0.18rem solid black;">{{ $note['cc'] }}</div>
                                <div class="text-center" style="width:70px;border-right: 0.18rem solid black;">{{ $note['sr'] !== null ? $note['sr'] : $note['sn'] }}</div>
                                <div class="text-center" style="width:52px;">{{ $note['moy'] }}</div>
                            </div>
                        </td>
                    @empty
                    @endforelse
                @endif
                <td class="text-center">{{ $credit }}</td>
                @if ($semestre == 0)
                    <td class="text-center">{{ substr($moy / 60, 0, 5) }}</td>
                    <td class="text-center">{{ substr($credit / 60, 0, 5) * 100}} %</td>
                @else
                    <td class="text-center">{{ substr($moy / 30, 0, 5) }}</td>
                    <td class="text-center">{{ substr($credit / 30, 0, 5) * 100}} %</td>
                @endif
                
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>

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

        $('.tab').css({
            'marginLeft' : '-25px'
        });
        
        $(this).hide();
        
        window.print();
        location.reload();
    })
</script>

@endsection
