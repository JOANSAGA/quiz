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
            <h5 class="modal-title" id="preguntaModalLabel">pregunta</h5>
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
                <label for="pregunta" class="col-sm-2 col-form-label"
                  >Pregunta</label
                >
                <div class="w-75">
                  <input
                    type="text"
                    class="form-control"
                    id="pregunta"
                    v-model="formData.pregunta"
                  />
                </div>
              </div>
              <div class="form-group">
                <label for="litA">Respuesta A:</label>
                <input
                  type="email"
                  class="form-control"
                  id="litA"
                  v-model="formData.litA"
                />
              </div>
              <div class="form-group">
                <label for="litA">Respuesta B:</label>
                <input
                  type="email"
                  class="form-control"
                  id="litB"
                  v-model="formData.litB"
                />
              </div>
              <div class="form-group">
                <label for="litA">Respuesta C:</label>
                <input
                  type="email"
                  class="form-control"
                  id="litC"
                  v-model="formData.litC"
                />
              </div>
              <div class="form-group">
                <label for="litA">Respuesta D:</label>
                <input
                  type="email"
                  class="form-control"
                  id="litD-input"
                  v-model="formData.litD"
                />
                <textarea
                  class="form-control"
                  id="litD-textarea"
                  rows="3"
                  v-model="formData.litD"
                  hidden
                ></textarea>
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
export default {
  data() {
    return {
      data: {},
      status: "A",
      formData: {
        pregunta: "",
        litA: "",
        litB: "",
        litC: "",
        litD: "",
      },
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
      },
    };
  },
};
</script>

<style>
</style>