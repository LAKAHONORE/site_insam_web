

@extends('Dashboard')
@section('content')

<div class="page-header">
    <h3 class="page-title">Rélevé de notes</h3>
</div>
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
</style>
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
            <div class="b-600 mx-bt-6">CHENDJOU DEFO RIOTELAIN</div>
            <div class="b-600 mx-bt-6">27 Septembre 1999 à BAMENDJOUN</div>
            <div class="b-600 mx-bt-6">BTS</div>
            <div class="b-600 mx-bt-6">2022/2023</div>
            <div class="b-600 mx-bt-6">22B301</div>
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
            <div class='mx-bt-6'>RÉSEAUX ET TÉLÉCOMMUNICATIONS</div>
            <div class='mx-bt-6'>RÉSEAU ET SÉCURITÉ</div>
            <div class='mx-bt-6'>1</div>
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
        <tr><td colspan="8"></td></tr>
        <tr>
            <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS FONDAMENTALES 30% (2 UE) 9 CRÉDITS 135 HEURES</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS PROFESSIONNELLES 60% (4 UE) 18 CRÉDITS 270 HEURES</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS TRANSVERSALES 10% (1 UE) 3 CRÉDITS 45 HEURES</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td colspan="2" class='text-center'>NOMBRE DE CRÉDIT ACQUIS AU SEMESTRE 1</td>
            <td style="padding: 0">
                <div class="line" style="margin: -22px 0px; padding: 0">
                    <div class='col b-600 text-center' style='border-right: 0.18rem solid black;padding: 14px;'>22</div>
                    <div class='col'></div>
                </div>
            </td>
            <td class='b-600 text-center'>MOY/20</td>
            <td class='b-600 text-center'>9.086</td>
        </tr>
        <tr><td colspan="8"></td></tr>
        <tr>
            <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS FONDAMENTALES 30% (2 UE) 9 CRÉDITS 135 HEURES</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS PROFESSIONNELLES 60% (4 UE) 18 CRÉDITS 270 HEURES</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td colspan="4" class="b-600 text-center">UNITÉES D'ENSEIGNEMENTS TRANSVERSALES 10% (1 UE) 3 CRÉDITS 45 HEURES</td>
        </tr>
        <tr>
            <td>RES 111</td>
            <td>OUTIS SCIENTIFIQUE DE BASE I</td>
            <td>
                <div>ANALYSE MATHEMATIQUES I</div>
                <div>ALGEBRE LINEAIRE I</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">
                <div>10.5</div>
                <div>14</div>
            </td>
            <td class="b-600 text-center">
                <div>3</div>
                <div>1</div>
            </td>
            <td class="b-600 text-center">12.25</td>
            <td>Ac SN</td>
        </tr>
        <tr>
            <td colspan="2" class='text-center'>NOMBRE DE CRÉDIT ACQUIS AU SEMESTRE 2</td>
            <td style="padding: 0">
                <div class='line' style="margin: -22px 0px; padding: 0">
                    <div class='col b-600 text-center' style='border-right: 0.18rem solid black;padding: 14px;'>22</div>
                    <div class='col'></div>
                </div>
            </td>
            <td class='b-600 text-center'>MOY/20</td>
            <td class='b-600 text-center'>9.086</td>
        </tr>
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
            <div class='wx-235 px-10 text-center' style="border: 0.18rem solid black; border-bottom: none; border-left: none">60</div>
            <div class='px-10 text-center' style="width: 132px; border: 0.18rem solid black; border-bottom: none; border-left: none">MOY ANNUELLE</div>
            <div class='wx-235 px-10 text-center' style="width: 90px; border: 0.18rem solid black; border-bottom: none; border-left: none">10.10</div>
        </div>
        <div class='line'>
            <div class='wx-235 px-10' style="border: 0.18rem solid black; border-bottom: none">NOMBRE DE CRÉDIT ACQUIS</div>
            <div class='wx-235 px-10 text-center' style="border: 0.18rem solid black; border-bottom: none; border-left: none">48</div>
            <div class='px-10 text-center' style="width: 132px; border: 0.18rem solid black; border-bottom: none; border-left: none">MENTION</div>
            <div class='px-10 text-center' style="width: 90px; border: 0.18rem solid black; border-bottom: none; border-left: none">PASSABLE</div>
        </div>
        <div class='line'>
            <div class='wx-235 px-10' style="border: 0.18rem solid black">POURCENTAGE D'ACQUISITION</div>
            <div class='wx-235 px-10 text-center' style="border: 0.18rem solid black; border-left: none">90%</div>
            <div class='px-10 text-center' style="width: 132px; border: 0.18rem solid black; border-left: none">DÉCISION</div>
            <div class='wx-235 px-10 text-center' style="width: 90px; border: 0.18rem solid black; border-left: none">ADMIS</div>
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
@endsection
