@extends('Dashboard')
@section('content')
    <section>
        <div class="page-header">
            <h3 class="page-title">Modification des informations d'une matière</h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div style="text-align: end"><a href="{{ route('option',['matieres', $specialite->id, $niveau->id]) }}" class="btn btn-primary mr-2">Liste des matières</a></div>
                        <form class="forms-sample" action="{{ route('matieres.update',$matiere->id) }}" method="POST">
                            @csrf @method('put')
                            <input type="text" value='{{ $specialite->id }}' name='specialite_id' hidden>
                            <input type="text" value='{{ $niveau->id }}' name='niveau_id' hidden>
                            
                            <div class="form-group">
                                <label for="module" class="form-label">Module: <span style='color:red'>*</span></label>
                                <select class="form-control" name="module_id" id="module">
                                    @if (!$modules->isEmpty())
                                        <option selected value="{{ $matiere->module_id }}">{{ strtoupper($matiere->module->code) .' - '.ucfirst($matiere->module->intitule) }}</option>
                                        <option value="">-- Sélectionnez le module --</option>
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}">{{ strtoupper($module->code) .' - '.strtoupper($module->intitule) }}</option>
                                        @endforeach
                                    @else
                                        <option value="" selected disabled>Aucun module en base de donnée</option>
                                    @endif
                                </select>
                            </div>
            
                            <div class="row form-group">
                                <div class="col">
                                    <label for="code" class="form-label">Code: <span style='color:red'>*</span></label>
                                    <input type="text" value="{{ $matiere->code }}" class="form-control" name="code" id="code">
                                </div>
            
                                <div class="col">
                                    <label for="intitule" class="form-label">Intitulé: <span style='color:red'>*</span></label>
                                    <input type="text" value="{{ $matiere->intitule }}" class="form-control" name="intitule" id="intitule">
                                </div>
                            </div>
            
                            <div class="row form-group">
                                <div class="col">
                                    <label for="credit" class="form-label">Credit: <span style='color:red'>*</span></label>
                                    <input type="text" value="{{ $matiere->credit }}" class="form-control" name="credit" id="credit" numeric>
                                </div>
            
                                <div class="col">
                                    <label for="heure" class="form-label">Heure: <span style='color:red'>*</span></label>
                                    <input type="text" value="{{ $matiere->heure }}" class="form-control" name="heure" id="heure" numeric>
                                </div>
            
                                <div class="col">
                                    <label for="semestre" class="form-label">Semestre: <span style='color:red'>*</span></label>
                                    <select class="form-control" name="semestre" id="semestre">
                                        <option selected value="{{ $matiere->semestre }}">{{ $matiere->semestre }}</option>
                                        <option value="" disabled>-- Sélectionnez le semestre --</option>
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
    </section>
    <script>
        $(function(){
            $('#module').chosen({
                no_results_text: "Aucun module en base de donnée",
                max_selected_options: 1
            });
        }) 
    </script>
@endsection