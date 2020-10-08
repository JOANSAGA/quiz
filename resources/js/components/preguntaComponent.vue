<template>
  <div class="container">
    <div class="row justify-content-between pb-2">
      <div class="col-3 align-middle">
        <h4>Listado de preguntas:</h4>
      </div>
      <div class="col-2">
        <button
          type="button"
          class="btn btn-primary btn-block"
          data-toggle="modal"
          data-target="#preguntaModal"
        >
          Nueva pregunta
        </button>
      </div>
    </div>
    <div class="row pt-2">
      <div class="col-12"></div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="preguntaModal"
      tabindex="-1"
      data-backdrop="static"
      data-keyboard="false"
      aria-labelledby="preguntaModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="preguntaModalLabel">Crear pregunta</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group row pt-3">
                <label for="" class="col-sm-2 col-form-label">Pregunta</label>
                <div class="">
                  <input
                    type="text"
                    class="form-control"
                    id=""
                  />
                </div>
              </div>
              <div class="form-group">
                <label for="">Nombre:</label>
                <input
                  type="email"
                  class="form-control"
                  id=""
                  placeholder="name@example.com"
                />
              </div>
              <div class="form-group">
                <label for="">Example select</label>
                <select class="form-control" id="">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Example multiple select</label>
                <select multiple class="form-control" id="">
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
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>