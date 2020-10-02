<div class="continer py-3 px-4">
    <div class="row justify-content-between pb-2">
        <div class="col-3 align-middle">
            <h4>Listado de materias:</h4>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#materiaModal">
                Nueva Materia
            </button>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-12" id="listMaterias">
            <example-component></example-component>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="materiaModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="materiaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="materiaModalLabel">Crear Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('newMateria') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <div class="d-flex">
                            <label for="nombreMateria" class="mr-4">Nombre:</label>
                            <input type="text" class="form-control w-25" id="nombreMateria" name="nombreMateria">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nivel">Nivel</label>
                                <select class="form-control" id="nivel" name="nivel">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
