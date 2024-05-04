@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Modification des informations d'un filiere</h3>

</div>
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('filieres.index') }}" class="btn btn-primary mr-2">Liste des écoles</a></div>
                <form class="forms-sample" method="post" action="{{ route('filieres.update', $filiere->id) }}">
                    @csrf @method('put')
                    <div class="form-group">
                        <label for="cycle" class="form-label">Cycle: <span style="color: red">*</span></label>
                        <select name="cycle_id" id="cycle" class="form-control" verify>
                            @if ($cycles->count() > 0)
                                <option selected value="{{ $filiere->cycle_id }}">{{ ucfirst($filiere->cycle->intitule) }}</option>
                                <option value="" disabled>-- Selectionnez l'école --</option>
                                @foreach ($cycles as $cycle)
                                    <option value="{{ $cycle->id }}">{{ ucfirst($cycle->intitule) }}</option>
                                @endforeach
                            @else
                                <option value="">-- Aucun cycle en base de donnée --</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Code <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="code" value="{{ $filiere->code }}" placeholder="Code" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Intitule <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="intitule" value="{{ $filiere->intitule }}" placeholder="Intitule" />
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <input type="reset" value="cancel" class="btn btn-light">
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
