

@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Veuillez choisir la spécialitée en question !</h3>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="get" action="{{ route('notes.create') }}">
                    @csrf
                    <div class="row form-group">
                        <div class='col'>
                            <label for="cycle" class="form-label">Cycle: <span style="color: red">*</span></label>
                            <select id="cycle" class="form-control">
                            @if ($cycles->count() > 0)
                                    <option value="" selected disabled>-- Selectionnez l'école --</option>
                                    @foreach ($cycles as $cycle)
                                        <option value="{{ $cycle->id }}">{{ strtoupper($cycle->code) }}</option>
                                    @endforeach
                                @else
                                    <option value="">-- Aucun cycle en base de donnée --</option>
                                @endif
                            </select>
                        </div>
                        <div class='col'>
                            <label for="filiere" class="form-label">Filière: <span style="color: red">*</span></label>
                            <select id="filiere" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="periode" class="form-label">Période: <span style="color: red">*</span></label>
                            <select id="periode" class="form-control">
                                <option value="" selected disabled>-- Selectionnez la période --</option>
                                <option value="jour">Jour</option>
                                <option value="soir">Soir</option>
                            </select>
                        </div>
                        
                        <div class='col'>
                            <label for="niveau" class="form-label">Niveau: <span style="color: red">*</span></label>
                            <select id="niveau" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class='col'>
                            <label for="specialite" class="form-label">Spécialitées: <span style="color: red">*</span></label>
                            <select id="specialite" name="specialite_id" class="form-control">
                                
                            </select>
                        </div>
                        <div class='col'>
                            <label for="matiere" class="form-label">Matières: <span style="color: red">*</span></label>
                            <select id="matiere" name="matiere_id" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="examen" class="form-label">Examen: <span style="color: red">*</span></label>
                            <select name="examen_id" id="examen" class="form-control">
                                @if ($examens->count() > 0)
                                    <option value="" selected disabled>-- Selectionnez l'examen --</option>
                                    @foreach ($examens as $examen)
                                        <option value="{{ $examen->id }}">{{ ucfirst($examen->intitule) }}</option>
                                    @endforeach
                                @else
                                    <option value="">-- Aucun examen en base de donnée --</option>
                                @endif
                            </select>
                        </div>
                        <div class='col'>
                            <label for="semestre" class="form-label">Semestre: <span style="color: red">*</span></label>
                            <select id="semestre" name="semestre" class="form-control">
                                <option value="" selected disabled>-- Veuillez sélectionnez le semestre --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <input type="reset" value="cancel" class="btn btn-light">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#cycle').change(function () {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': '<?= csrf_token(); ?>' },
                type: 'POST',
                url: '{{ url("filtre") }}',
                data: { cycle_id: $(this).val() },
                success: function(datas) {
                    if (datas.filieres.length > 0) {
                        $('#filiere').html('').append(
                            $('<option>').html('-- Sélectionnez la filière --')
                            .attr('selected', '').attr('disabled', '').val('')
                        )
                        $('#niveau').html('').append(
                            $('<option>').html('-- Sélectionnez le niveau --')
                            .attr('selected', '').attr('disabled', '').val('')
                        )
                        $.each(datas.filieres, function(i, filiere){
                            $('#filiere').append(
                                $('<option>').html(`${filiere.intitule}`).val(`${filiere.id}`)
                            )
                        })
                        $.each(datas.niveaux, function(i, niveau){
                            $('#niveau').append(
                                $('<option>').html(`${niveau.intitule}`).val(`${niveau.id}`)
                            )
                        })
                    } else {
                        $('#filiere').html('').append(
                            $('<option>').html('-- Aucune filière ---')
                            .attr('selected', '').attr('disabled', '').val('')
                        )
                    }
                    $('#filiere').chosen({
                        no_results_text: "Aucune filière en base de donnée",
                        max_selected_options: 1
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#niveau').change(function () {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': '<?= csrf_token(); ?>' },
                type: 'POST',
                url: '{{ url("filtre") }}',
                data: { 
                    filiere_id: $('#filiere').val(),
                    periode: $('#periode').val(),
                },
                success: function(specialites) {
                    if (specialites.length > 0) {
                        $('#specialite').html('').append(
                            $('<option>').html('-- Sélectionnez la spécialitée --')
                            .attr('selected', '').attr('disabled', '').val('')
                        )
                        $.each(specialites, function(i, specialite){
                            $('#specialite').append(
                                $('<option>').html(`${specialite.intitule}`).val(`${specialite.id}`)
                            )
                        })
                    } else {
                        $('#specialite').html('').append(
                            $('<option>').html('-- Aucune spécialitée ---')
                            .attr('selected', '').attr('disabled', '').val('')
                        )
                    }
                    $('#specialite').chosen({
                        no_results_text: "Aucune spécialite en base de donnée",
                        max_selected_options: 1
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#specialite').change(function () {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': '<?= csrf_token(); ?>' },
                type: 'POST',
                url: '{{ url("filtre") }}',
                data: { 
                    specialite_id: $('#specialite').val(),
                    niveau_id: $('#niveau').val(),
                },
                success: function(matieres) {
                    if (matieres.length > 0) {
                        $('#matiere').html('').append(
                            $('<option>').html('-- Sélectionnez la matiere --')
                            .attr('selected', '').attr('disabled', '').val('')
                        )
                        $.each(matieres, function(i, matiere){
                            $('#matiere').append(
                                $('<option>').html(`${matiere.intitule}`).val(`${matiere.id}`)
                            )
                        })
                    } else {
                        $('#matiere').html('').append(
                            $('<option>').html('-- Aucune matiere ---')
                            .attr('selected', '').attr('disabled', '').val('')
                        )
                    }
                    $('#matiere').chosen({
                        no_results_text: "Aucune matiere en base de donnée",
                        max_selected_options: 1
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    })
</script>
@endsection
