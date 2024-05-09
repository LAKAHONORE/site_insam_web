@extends('Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Import des notes</h3>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="post" action="{{ route('notes.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Fichier Excel</label>
                        <input type="file" class="form-control" name="file" placeholder="Fichier" />
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <input type="reset" value="cancel" class="btn btn-light">
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
