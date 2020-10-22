<template>
  <div class="container">
    <div class="row justify-content-between pb-2">
      <div class="col-5 align-middle">
        <h4>Listado de preguntas:</h4>
      </div>
      <div class="col-2">
        <button
          type="button"
          class="btn btn-primary btn-block"
          data-toggle="modal"
          data-target="#preguntaModal"
          v-on:click="cls()"
        >
          Nueva Pregunta
        </button>
      </div>
    </div>
    <div class="row pb-3">
      <div class="col-auto">
        <div class="custom-control custom-radio">
          <input
            id="pregStatusA"
            value="A"
            type="radio"
            class="custom-control-input"
            v-model.trim="status"
            @change="getPreguntas($event)"
          />
          <label class="custom-control-label" for="pregStatusA">Activos</label>
        </div>
      </div>
      <div class="col-auto">
        <div class="custom-control custom-radio">
          <input
            id="pregStatusI"
            value="I"
            type="radio"
            class="custom-control-input"
            v-model.trim="status"
            @change="getPreguntas($event)"
          />
          <label class="custom-control-label" for="pregStatusI"
            >Inactivos</label
          >
        </div>
      </div>
    </div>
    <div class="row pb-3">
      <div class="col-auto">
        <div class="custom-control custom-radio">
          <input
            id="fullPreguntas"
            value="todas"
            v-model.trim="materiaSelected"
            type="radio"
            class="custom-control-input"
            @change="getPreguntas($event)"
          />
          <label class="custom-control-label" for="fullPreguntas">todas</label>
        </div>
      </div>
      <div class="col-auto" v-for="att in materia" v-bind:key="att.id">
        <div class="custom-control custom-radio">
          <input
            :id="att.nombreMateria"
            :value="att.nombreMateria"
            v-model.trim="materiaSelected"
            type="radio"
            class="custom-control-input"
            @change="getPreguntas($event)"
          />
          <label class="custom-control-label" :for="att.nombreMateria">{{
            att.nombreMateria
          }}</label>
        </div>
      </div>
    </div>
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
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="preguntaModalLabel">Pregunta</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="addPregunta">
            <div class="modal-body">
              <div class="form-group row pt-3">
                <div class="col-4">
                  <label for="pregunta">Pregunta</label>
                  <div class="">
                    <input
                      type="text"
                      class="form-control"
                      id="pregunta"
                      v-model="formData.pregunta"
                    />
                  </div>
                </div>
                <div class="col-4">
                  <label for="materia">Materia</label>
                  <select
                    class="form-control"
                    id="materia"
                    v-model="formData.materia"
                  >
                    <option v-for="att in materia" v-bind:key="att.id">
                      {{ att.nombreMateria }}
                    </option>
                  </select>
                </div>
                <div class="col-4">
                  <label for="litCorrecto">Respuesta correcta</label>
                  <select
                    class="form-control"
                    id="litCorrecto"
                    v-model="formData.litCorrecto"
                  >
                    <option value="" selected>Seleccionar...</option>
                    <option value="litA">Literal A</option>
                    <option value="litB">Literal B</option>
                    <option value="litC">Literal C</option>
                    <option value="litD">Literal D</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="litA">Respuesta A:</label>
                <input
                  type="text"
                  class="form-control"
                  id="litA"
                  v-model="formData.litA"
                />
              </div>
              <div class="form-group">
                <label for="litA">Respuesta B:</label>
                <input
                  type="text"
                  class="form-control"
                  id="litB"
                  v-model="formData.litB"
                />
              </div>
              <div class="form-group">
                <label for="litA">Respuesta C:</label>
                <input
                  type="text"
                  class="form-control"
                  id="litC"
                  v-model="formData.litC"
                />
              </div>
              <div class="form-group">
                <label for="litA">Respuesta D:</label>
                <input
                  type="text"
                  class="form-control"
                  id="litD"
                  v-model="formData.litD"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">pregunta</th>
            <th scope="col">litA</th>
            <th scope="col">litB</th>
            <th scope="col">litC</th>
            <th scope="col">litD</th>
            <th scope="col">Respuesta</th>
            <th scope="col">Estado</th>
            <th scope="col" class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="att in data" v-bind:key="att.id">
            <th>{{ att.pregunta }}</th>
            <td>{{ att.litA }}</td>
            <td>{{ att.litB }}</td>
            <td>{{ att.litC }}</td>
            <td>{{ att.litD }}</td>
            <td>
              <strong>{{ att.litCorrecto }}</strong>
            </td>
            <td>{{ att.estado }}</td>
            <td class="d-flex justify-content-end">
              <button
                v-if="status === 'A'"
                class="btn-success btn btn-sm mr-2"
                v-on:click="editPregunta(att)"
              >
                Editar
              </button>
              <button
                v-if="status === 'A'"
                class="btn-danger btn btn-sm mr-2"
                v-on:click="inactivaPregunta(att._id)"
              >
                Inactivar
              </button>
              <button
                v-if="status === 'I'"
                class="btn-success btn btn-sm mr-2"
                v-on:click="activaPregunta(att._id)"
              >
                Activar
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <nav>
      <ul class="pagination justify-content-center pt-3">
        <li class="page-item" v-if="pagination.current_page > 1">
          <a
            href="#"
            @click.prevent="changePage(pagination.current_page - 1)"
            rel="prev"
            aria-label="« Previous"
            class="page-link"
          >
            ‹
          </a>
        </li>
        <li
          class="page-item"
          v-for="page in pagination.last_page"
          v-bind:class="[page == isActived ? 'active' : '']"
          v-bind:key="page.id"
        >
          <a class="page-link" href="#" @click.prevent="changePage(page)">
            {{ page }}
          </a>
        </li>
        <li
          class="page-item"
          v-if="pagination.current_page < pagination.last_page"
        >
          <a
            href="#"
            @click.prevent="changePage(pagination.current_page + 1)"
            rel="next"
            aria-label="Next »"
            class="page-link"
          >
            ›
          </a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: {},
      materia: {},
      status: "A",
      materiaSelected: "todas",
      formData: {
        _id: "",
        pregunta: "",
        materia: "",
        litA: "",
        litB: "",
        litC: "",
        litD: "",
        litCorrecto: "",
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
  computed: {
    isActived: function () {
      return this.pagination.current_page;
    },
    pagesNumber: function () {
      if (!this.pagination.to) {
        return [];
      }

      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }

      var to = from + this.offset * 2;
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    },
  },
  methods: {
    getKeeps: function (page) {
      var urlKeeps =
        "/getPregunta/" +
        this.status +
        "/" +
        this.materiaSelected +
        "?page=" +
        page;

      fetch(urlKeeps)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.preguntas.data;
        });
    },
    changePage: function (page) {
      this.pagination.current_page = page;
      this.getKeeps(page);
    },
    activaPregunta: function (id) {
      var url = "/activarPregunta" + id;
      this.changeEstado(url);
      toastr.success("Pregunta activada");
    },
    inactivaPregunta: function (id) {
      var url = "/inactivarPregunta" + id;
      this.changeEstado(url);
      toastr.success("Pregunta inactivada");
    },
    changeEstado: function (url) {
      axios
        .post(url)
        .then((response) => {
          //console.log(response);
          this.getPreguntas();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    editPregunta: function (item) {
      $("#preguntaModal").modal("show");
      console.log(item);
      this.formData._id = item._id;
      this.formData.pregunta = item.pregunta;
      this.formData.litA = item.litA;
      this.formData.litB = item.litB;
      this.formData.litC = item.litC;
      this.formData.litD = item.litD;
      this.formData.materia = item.materia;
      this.formData.litCorrecto = item.litCorrecto;
    },
    cls: function () {
      this.formData._id = "";
      this.formData.pregunta = "";
      this.formData.materia = "";
      this.formData.litA = "";
      this.formData.litB = "";
      this.formData.litC = "";
      this.formData.litD = "";
      this.formData.litCorrecto = "";
      this.getMaterias();
    },
    addPregunta: function () {
      var elementoNulo = false;
      if (this.formData.pregunta == "") {
        toastr.warning("Pregunta no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.materia == "") {
        toastr.warning("Materia no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.litA == "") {
        toastr.warning("Literal A no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.litB == "") {
        toastr.warning("Literal B no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.litC == "") {
        toastr.warning("Literal C no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.litD == "") {
        toastr.warning("Literal D no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.litCorrecto == "") {
        toastr.warning("Respuesta Correcta no debe estar vacio");
        elementoNulo = true;
      }

      if (!elementoNulo && this.formData._id == "") {
        var url = "/newPregunta";
        console.log(this.formData.litCorrecto);
        this.saveChanges(url);
      }
      if (!elementoNulo && this.formData._id != "") {
        var url = "/editPregunta";
        this.saveChanges(url);
      }
    },
    saveChanges: function (url) {
      console.log(url);
      axios
        .post(url, this.formData)
        .then((response) => {
          this.getPreguntas();
          this.formData.pregunta = "";
          this.formData.materia = "";
          this.formData.litA = "";
          this.formData.litB = "";
          this.formData.litC = "";
          this.formData.litD = "";
          //console.log(response);
          toastr.success("Elemento guardado");
          $("#preguntaModal").modal("hide");
        })
        .catch((error) => {
          console.log("error: " + error);
          toastr.error(error);
        });
    },
    getPreguntas: function () {
      var url = "/getPregunta/" + this.status + "/" + this.materiaSelected;
      this.data = {};
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.preguntas.data;
          this.pagination = response.pagination;
        });
    },
    getMaterias: function () {
      var url = "/getMateriaA";
      this.materia = {};
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.materia = response.materias.data;
        });
    },
  },
  created() {
    this.getPreguntas();
    this.getMaterias();
  },
};
</script>
