@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Modification des information d'un module</h3>

</div>
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="text-align: end"><a href="{{ route('modules.index') }}" class="btn btn-primary mr-2">Liste des modules</a></div>
                <form class="forms-sample" method="post" action="{{ route('modules.update', $module->id) }}">
                    @csrf @method('put')
                    <div class="form-group">
                        <label for="exampleInputEmail3">Code</label>
                        <input type="text" class="form-control" value="{{ $module->code }}" name="code" placeholder="Code" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Intitule</label>
                        <input type="text" class="form-control" value="{{ $module->intitule }}" name="intitule" placeholder="Intitule" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Categorie</label>
                        <select class="form-control" name="categorie">
                            <option value="{{ $module->categorie }}"selected>{{ ucfirst($module->categorie) }}</option>
                            <option value="" disabled>-- Sélectionnez la categorie --</option>
                            <option value="fondamentales">Fondamentales</option>
                            <option value="professionnelles">Professionnelles</option>
                            <option value="transversales">Transversales</option>
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
