@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Modification des informations d'un specialite</h3>

</div>
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('specialites.index') }}" class="btn btn-primary mr-2">Liste des écoles</a></div>
                <form class="forms-sample" method="post" action="{{ route('specialites.update', $specialite->id) }}">
                    @csrf @method('put')
                    <div class="form-group">
                        <label for="filiere" class="form-label">filiere: <span style="color: red">*</span></label>
                        <select name="filiere_id" id="filiere" class="form-control" verify>
                            @if ($filieres->count() > 0)
                                <option selected value="{{ $specialite->filiere_id }}">{{ ucfirst($specialite->filiere->intitule) }}</option>
                                <option value="" disabled>-- Selectionnez l'école --</option>
                                @foreach ($filieres as $filiere)
                                    <option value="{{ $filiere->id }}">{{ ucfirst($filiere->intitule) }}</option>
                                @endforeach
                            @else
                                <option value="">-- Aucun filiere en base de donnée --</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Code <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="code" value="{{ $specialite->code }}" placeholder="Code" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Intitule <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="intitule" value="{{ $specialite->intitule }}" placeholder="Intitule" />
                    </div>
                    <div class="form-group">
                        <label for="periode" class="form-label">Période: <span style="color: red">*</span></label>
                        <select name="periode" id="periode" class="form-control">
                            <option selected value="{{ $specialite->periode }}">{{ ucfirst($specialite->periode) }}</option>
                            <option value="" disabled>-- Selectionnez la période --</option>
                            <option value="jour">Jour</option>
                            <option value="soir">Soir</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <input type="reset" value="cancel" class="btn btn-light">
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
