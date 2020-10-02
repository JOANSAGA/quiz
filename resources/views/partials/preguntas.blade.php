<div class="continer py-3 px-4">
    <div class="row justify-content-between pb-2">
        <div class="col-3 align-middle">
            <h4>Listado de preguntas:</h4>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#preguntaModal">
                Nueva pregunta
            </button>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-12">
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="preguntaModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="preguntaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="preguntaModalLabel">Crear pregunta</h5>
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
                    <div class="form-group row pt-3">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Pregunta</label>
                        <div class="">
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre:</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Example multiple select</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
