<template>
  <div class="container">
    <div class="row justify-content-between pb-2">
      <div class="col-5 align-middle">
        <h4>Listado de examenes:</h4>
      </div>
      <div class="col-2">
        <button
          type="button"
          class="btn btn-primary btn-block"
          data-toggle="modal"
          data-target="#examenModal"
          v-on:click="cls()"
        >
          Nuevo Examen
        </button>
      </div>
    </div>
    <div class="row pb-3">
      <div class="col-auto">
        <div class="custom-control custom-radio">
          <input
            id="examStatusA"
            value="A"
            type="radio"
            class="custom-control-input"
            v-model.trim="status"
            @change="getExamen($event)"
          />
          <label class="custom-control-label" for="examStatusA">Activos</label>
        </div>
      </div>
      <div class="col-auto">
        <div class="custom-control custom-radio">
          <input
            id="examStatusI"
            value="I"
            type="radio"
            class="custom-control-input"
            v-model.trim="status"
            @change="getExamen($event)"
          />
          <label class="custom-control-label" for="examStatusI"
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
            @change="getExamen($event)"
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
            @change="getExamen($event)"
          />
          <label class="custom-control-label" :for="att.nombreMateria">{{
            att.nombreMateria
          }}</label>
        </div>
      </div>
    </div>
    <!-- modal -->
    <div
      class="modal fade"
      id="examenModal"
      tabindex="-1"
      data-backdrop="static"
      data-keyboard="false"
      aria-labelledby="examenModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="examenModalLabel">Examen</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="addExamen">
            <div class="modal-body">
              <div class="row pb-3">
                <div class="col-4">
                  <label for="user">Usuario</label>
                  <input
                    class="form-control"
                    type="text"
                    v-model="formData.user"
                    id="user"
                    disabled
                  />
                </div>
                <div class="col-4">
                  <label for="name">Nombre</label>
                  <input
                    class="form-control"
                    type="text"
                    v-model="formData.name"
                    id="name"
                    disabled
                  />
                </div>
                <div class="col-4">
                  <label for="PreguntaMateria">Materia</label>
                  <select
                    class="form-control"
                    id="PreguntaMateria"
                    v-model.trim="materiaSelected"
                    @change="changemateria($event)"
                  >
                    <option value="todas">Seleccionar</option>
                    <option v-for="att in materia" v-bind:key="att.id">
                      {{ att.nombreMateria }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="row pb-3">
                <div class="col-4">
                  <label for="inicio">Agendar</label>
                  <input
                    type="datetime-local"
                    class="form-control"
                    v-model="formData.inicio"
                    id="inicio"
                  />
                </div>
                <div class="col-4">
                  <label for="tiempo"
                    >Duración <span class="small">(en minutos)</span></label
                  >
                  <input
                    type="number"
                    class="form-control"
                    v-model="formData.tiempo"
                    id="tiempo"
                    min="20"
                    max="300"
                  />
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
                      <th scope="col" class="d-flex justify-content-center">
                        Seleccionar
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="att in preguntas" v-bind:key="att.id">
                      <td>{{ att.pregunta }}</td>
                      <td>{{ att.litA }}</td>
                      <td>{{ att.litB }}</td>
                      <td>{{ att.litC }}</td>
                      <td>{{ att.litD }}</td>
                      <td>
                        <strong>{{ att.litCorrecto }}</strong>
                      </td>
                      <td class="d-flex justify-content-center">
                        <input
                          type="checkbox"
                          :value="{ _id: att._id, pregunta: att.pregunta }"
                          v-model="items"
                        />
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
                    <a
                      class="page-link"
                      href="#"
                      @click.prevent="changePage(page)"
                    >
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
              <div class="row pt-3 container">
                <div class="col-6">
                  <span v-if="items.length"> Preguntas seleccionadas: </span>

                  <br />
                  <ul class="list-group list-group-flush">
                    <li
                      class="list-group-item"
                      v-for="item in items"
                      v-bind:key="item.id"
                    >
                      {{ item.pregunta }}
                    </li>
                  </ul>
                </div>
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
            <th scope="col">Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Materia</th>
            <th scope="col">tiempo</th>
            <th scope="col">Num preguntas</th>
            <th scope="col">Estado</th>
            <th scope="col" class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="att in data" v-bind:key="att.id">
            <th>{{ att.user }}</th>
            <td>{{ att.name }}</td>
            <td>{{ att.inicio }}</td>
            <td>{{ att.materia }}</td>
            <td>{{ att.tiempo }}</td>
            <td>
              <strong>{{ att.items.length }}</strong>
            </td>
            <td>{{ att.estado }}</td>
            <td class="d-flex justify-content-end">
              <button
                v-if="status === 'A'"
                class="btn-success btn btn-sm mr-2"
                v-on:click="editExamen(att)"
              >
                Editar
              </button>
              <button
                v-if="status === 'A'"
                class="btn-danger btn btn-sm mr-2"
                v-on:click="inactivaExamen(att._id)"
              >
                Inactivar
              </button>
              <button
                v-if="status === 'I'"
                class="btn-success btn btn-sm mr-2"
                v-on:click="activaExamen(att._id)"
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
        <li class="page-item" v-if="pagination2.current_page > 1">
          <a
            href="#"
            @click.prevent="changePage2(pagination2.current_page - 1)"
            rel="prev"
            aria-label="« Previous"
            class="page-link"
          >
            ‹
          </a>
        </li>
        <li
          class="page-item"
          v-for="page in pagination2.last_page"
          v-bind:class="[page == isActived2 ? 'active' : '']"
          v-bind:key="page.id"
        >
          <a class="page-link" href="#" @click.prevent="changePage2(page)">
            {{ page }}
          </a>
        </li>
        <li
          class="page-item"
          v-if="pagination2.current_page < pagination2.last_page"
        >
          <a
            href="#"
            @click.prevent="changePage2(pagination2.current_page + 1)"
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
      status: "A",
      materia: {},
      data: {},
      materiaSelected: "todas",
      formData: {
        _id: "",
        user: "",
        name: "",
        inicio: "",
        tiempo: "",
        materia: "",
        items: "",
      },
      preguntas: {},
      items: [],
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
      },
      pagination2: {
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
    isActived2: function () {
      return this.pagination2.current_page;
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
    pagesNumber2: function () {
      if (!this.pagination2.to) {
        return [];
      }

      var from = this.pagination2.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }

      var to = from + this.offset * 2;
      if (to >= this.pagination2.last_page) {
        to = this.pagination2.last_page;
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
          this.preguntas = response.preguntas.data;
        });
    },
    getKeeps2: function (page) {
      var urlKeeps =
        "/getExamen/" +
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
          this.data = response.examenes.data;
        });
    },
    changePage: function (page) {
      this.pagination.current_page = page;
      this.getKeeps(page);
    },
    changePage2: function (page) {
      this.pagination2.current_page = page;
      this.getKeeps2(page);
    },
    changemateria: function () {
      this.items = [];
      this.getPreguntas();
    },
    cls: function () {
      this.formData._id = "";
      this.formData.user = "";
      this.formData.name = "";
      this.formData.inicio = "";
      this.formData.tiempo = "";
      this.formData.items = "";
      this.formData.materia = "";
      this.items = [];
      this.getMaterias();
      this.getPreguntas();
    },
    getPreguntas: function () {
      var url = "/getPregunta/" + this.status + "/" + this.materiaSelected;
      this.preguntas = {};
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.preguntas = response.preguntas.data;
          this.pagination = response.pagination;
          this.formData.user = response.user.email;
          this.formData.name = response.user.nombre;
          //console.log(this.preguntas);
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
    getExamen: function () {
      var url = "/getExamen/" + this.status + "/" + this.materiaSelected;
      this.data = {};
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.examenes.data;
          this.pagination2 = response.pagination;
        });
    },
    addExamen: function () {
      var elementoNulo = false;
      this.formData.materia = this.materiaSelected;
      this.formData.items = this.items;
      if (this.formData.user == "") {
        toastr.warning("user no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.name == "") {
        toastr.warning("Nombre no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.inicio == "") {
        toastr.warning("Agendar no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.tiempo == "") {
        toastr.warning("Duración no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.materia == "" || this.formData.materia == "todas") {
        toastr.warning("materia no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.items.length <= 0) {
        toastr.warning("items no debe estar vacio");
        elementoNulo = true;
      }
      let hoy = new Date();
      let fechaInicio = new Date(this.formData.inicio);

      if (hoy > fechaInicio) {
        toastr.warning("fecha ingresada debe ser mayor a la hora actual");
        elementoNulo = true;
      }
      if (!elementoNulo && this.formData._id == "") {
        var url = "/newExamen";
        this.saveChanges(url);
      }
      if (!elementoNulo && this.formData._id != "") {
        var url = "/editExamen";
        this.saveChanges(url);
      }
    },
    saveChanges: function (url) {
      console.log(url);
      axios
        .post(url, this.formData)
        .then((response) => {
          this.formData = {};
          this.materiaSelected = "todas";
          this.getExamen();
          toastr.success("Elemento guardado");
          $("#examenModal").modal("hide");
        })
        .catch((error) => {
          console.log("error: " + error);
          toastr.error(error);
        });
    },
    activaExamen: function (id) {
      var url = "/activarExamen" + id;
      this.changeEstado(url);
      toastr.success("Ecamen activado");
    },
    inactivaExamen: function (id) {
      var url = "/inactivarExamen" + id;
      this.changeEstado(url);
      toastr.success("Ecamen inactivado");
    },
    changeEstado: function (url) {
      axios
        .post(url)
        .then((response) => {
          //console.log(response);
          this.getExamen();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    editExamen: function (item) {
      $("#examenModal").modal("show");
      console.log(item);
      this.formData._id = item._id;
      this.formData.user = item.user;
      this.formData.name = item.name;
      this.formData.inicio = item.inicio;
      this.formData.tiempo = item.tiempo;
      this.items = item.items;
      this.materiaSelected = item.materia;

      this.getMaterias();
      this.getPreguntas();
      //this.formData.litCorrecto = item.litCorrecto;
    },
  },
  created() {
    this.getExamen();
    this.getMaterias();
  },
};
</script>
