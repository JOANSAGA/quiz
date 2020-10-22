<template>
  <div class="container">
    <div class="row justify-content-between pb-2">
      <div class="col-5 align-middle">
        <h4>Listado de materias:</h4>
      </div>
      <div class="col-2">
        <button
          type="button"
          class="btn btn-primary btn-block"
          data-toggle="modal"
          data-target="#materiaModal"
          v-on:click="cls()"
        >
          Nueva Materia
        </button>
      </div>
    </div>
    <div class="row pb-3">
      <div class="col-auto">
        <div class="custom-control custom-radio">
          <input
            id="matStatusA"
            value="A"
            type="radio"
            class="custom-control-input"
            v-model.trim="status"
            @change="getMaterias($event)"
          />
          <label class="custom-control-label" for="matStatusA">Activos</label>
        </div>
      </div>
      <div class="col-auto">
        <div class="custom-control custom-radio">
          <input
            id="matStatusI"
            value="I"
            type="radio"
            class="custom-control-input"
            v-model.trim="status"
            @change="getMaterias($event)"
          />
          <label class="custom-control-label" for="matStatusI">Inactivos</label>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="materiaModal"
      tabindex="-1"
      data-backdrop="static"
      data-keyboard="false"
      aria-labelledby="materiaModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="materiaModalLabel">Materia</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="addMateria">
            <div class="modal-body">
              <div class="form-group">
                <div class="d-flex">
                  <label for="nombreMateria" class="mr-4">Nombre:</label>
                  <input
                    type="text"
                    class="form-control w-25"
                    id="nombreMateria"
                    v-model="formData.nombreMateria"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea
                      class="form-control"
                      id="descripcion"
                      v-model="formData.descripcion"
                      rows="3"
                    ></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="nivel">Nivel</label>
                    <select
                      class="form-control"
                      id="nivel"
                      v-model="formData.nivel"
                    >
                      <option value="">Selecciona nivel...</option>
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
            <th scope="col">Nombre</th>
            <th scope="col">Nivel</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col" class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="att in data" v-bind:key="att.id">
            <th>{{ att.nombreMateria }}</th>
            <td>{{ att.nivel }}</td>
            <td>{{ att.descripcion }}</td>
            <td>{{ att.estado }}</td>
            <td class="d-flex justify-content-end">
              <button
                v-if="status === 'A'"
                class="btn-success btn btn-sm mr-2"
                v-on:click="editMateria(att)"
              >
                Editar
              </button>
              <button
                v-if="status === 'A'"
                class="btn-danger btn btn-sm mr-2"
                v-on:click="inactivaMateria(att._id)"
              >
                Inactivar
              </button>
              <button
                v-if="status === 'I'"
                class="btn-success btn btn-sm mr-2"
                v-on:click="activaMateria(att._id)"
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
      status: "A",
      formData: {
        _id: "",
        nombreMateria: "",
        descripcion: "",
        nivel: "",
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
      var urlKeeps = "/getMateria" + this.status + "?page=" + page;

      fetch(urlKeeps)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.materias.data;
        });
    },
    changePage: function (page) {
      this.pagination.current_page = page;
      this.getKeeps(page);
    },
    activaMateria: function (id) {
      var url = "/activarMateria" + id;
      this.changeEstadoMateria(url);
      toastr.success("Materia activada");
    },
    inactivaMateria: function (id) {
      var url = "/inactivarMateria" + id;
      this.changeEstadoMateria(url);
      toastr.success("Materia inactivada");
    },
    changeEstadoMateria: function (url) {
      axios
        .post(url)
        .then((response) => {
          //console.log(response);
          this.getMaterias();
        })
        .catch((error) => {
          console.log("error: " + error);
        });
    },
    editMateria: function (item) {
      $("#materiaModal").modal("show");
      console.log(item);
      this.formData._id = item._id;
      this.formData.nombreMateria = item.nombreMateria;
      this.formData.descripcion = item.descripcion;
      this.formData.nivel = item.nivel;
    },
    validarElemento: function (variable) {
      if (variable == "") {
        toastr.warning(variable + "no debe estar vacio");
        return false;
      } else {
        return true;
      }
    },
    cls: function () {
      this.formData._id = "";
      this.formData.nombreMateria = "";
      this.formData.descripcion = "";
      this.formData.nivel = "";
    },
    addMateria: function () {
      var elementoNulo = false;
      if (this.formData.nombreMateria == "") {
        toastr.warning("Nombre no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.descripcion == "") {
        toastr.warning("descripcion no debe estar vacio");
        elementoNulo = true;
      }
      if (this.formData.nivel == "") {
        toastr.warning("nivel no debe estar vacio");
        elementoNulo = true;
      }

      if (!elementoNulo && this.formData._id == "") {
        var url = "/newMateria";
        this.saveChanges(url);
      }
      if (!elementoNulo && this.formData._id != "") {
        //aqui llama a otra funcion para editar la materia
        var url = "/editMateria";
        this.saveChanges(url);
      }
    },
    saveChanges: function (url) {
      axios
        .post(url, this.formData)
        .then((response) => {
          this.getMaterias();
          this.formData.nombreMateria = "";
          this.formData.descripcion = "";
          this.formData.nivel = "";
          //console.log(response);
          toastr.success("Elemento guardado");
          $("#materiaModal").modal("hide");
        })
        .catch((error) => {
          console.log("error: " + error);
          toastr.error("error: " + error);
        });
    },
    getMaterias: function () {
      var url = "/getMateria" + this.status;
      this.data = {};
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.materias.data;
          this.pagination = response.pagination;
        });
    },
  },
  created() {
    this.getMaterias();
  },
};
</script>
