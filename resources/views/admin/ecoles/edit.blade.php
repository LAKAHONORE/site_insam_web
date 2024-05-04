@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Modification des information d'une école</h3>

</div>
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('ecoles.index') }}" class="btn btn-primary mr-2">Liste des écoles</a></div>
                <form class="forms-sample" method="post" action="{{ route('ecoles.update', $ecole->id) }}">
                    @csrf @method('put')
                    <div class="form-group">
                        <label for="exampleInputEmail3">Code</label>
                        <input type="text" class="form-control" value="{{ $ecole->code }}" name="code" placeholder="Code" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Intitule</label>
                        <input type="text" class="form-control" value="{{ $ecole->intitule }}" name="intitule" placeholder="Intitule" />
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <input type="reset" value="cancel" class="btn btn-light">
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
