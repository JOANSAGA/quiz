<div class="continer py-3 px-4">
    <div class="row justify-content-between pb-2">
        <div class="col-3 align-middle">
            <h4>Listado de examenes:</h4>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#examenModal">
                Nuevo Examen
            </button>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-12">
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="examenModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="examenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examenModalLabel">Crear Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <strong>Datos importantes:</strong>
                            <br>
                            <strong>Nombre: </strong>{{ Auth::user()->name }}
                            <br>
                            <strong>email: </strong>{{ Auth::user()->email }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Preguntas</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="" placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="email" class="form-control" id="nombre" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="select1">Example select</label>
                        <select class="form-control" id="select1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selec">Example multiple select</label>
                        <select multiple class="form-control" id="selec">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Example textarea</label>
                        <textarea class="form-control" id="" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
