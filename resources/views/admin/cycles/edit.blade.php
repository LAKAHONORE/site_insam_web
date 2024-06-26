@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Modification des informations d'un cycle</h3>

</div>
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('cycles.index') }}" class="btn btn-primary mr-2">Liste des écoles</a></div>
                <form class="forms-sample" method="post" action="{{ route('cycles.update', $cycle->id) }}">
                    @csrf @method('put')
                    <div class="form-group">
                        <label for="ecole" class="form-label">École: <span style="color: red">*</span></label>
                        <select name="ecole_id" id="ecole" class="form-control" verify>
                            @if ($ecoles->count() > 0)
                                <option selected value="{{ $cycle->ecole_id }}">{{ ucfirst($cycle->ecole->intitule) }}</option>
                                <option value="" disabled>-- Selectionnez l'école --</option>
                                @foreach ($ecoles as $ecole)
                                    <option value="{{ $ecole->id }}">{{ ucfirst($ecole->intitule) }}</option>
                                @endforeach
                            @else
                                <option value="">-- Aucune école en base de donnée --</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Code <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="code" value="{{ $cycle->code }}" placeholder="Code" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Intitule <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="intitule" value="{{ $cycle->intitule }}" placeholder="Intitule" />
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <input type="reset" value="cancel" class="btn btn-light">
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
