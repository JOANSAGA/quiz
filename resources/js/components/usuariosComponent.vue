<template>
  <div class="container">
    <div class="row justify-content-between pb-2">
      <div class="col-5 align-middle">
        <h4>Listado de Usuarios:</h4>
      </div>
      <div class="col-2"></div>
    </div>
    <div class="row">
      <div class="col-auto">
        <div class="table-responsive">
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col" class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="att in data" v-bind:key="att.id">
                <th>{{ att.name }}</th>
                <td>{{ att.email }}</td>
                <td>{{ att.rol }}</td>
                <td class="d-flex justify-content-end">
                  <button
                    class="btn-success btn btn-sm mr-2"
                    v-on:click="editarRol(att)"
                  >
                    Editar
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- MODAL -->
    <div
      class="modal fade"
      id="usuarioModal"
      tabindex="-1"
      data-backdrop="static"
      data-keyboard="false"
      aria-labelledby="usuarioModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="usuarioModalLabel">Usuario</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="saveChanges">
            <div class="modal-body">
              <div class="form-group row pt-3">
                <div class="col-4">
                  <label for="nombre">Nombre</label>
                  <input
                    class="form-control"
                    id="nombre"
                    v-model="formData.name"
                    type="text"
                  />
                </div>
                <div class="col-4">
                  <label for="userEmail">Email</label>
                  <input
                    class="form-control"
                    id="userEmail"
                    v-model="formData.email"
                    type="text"
                    disabled
                  />
                </div>
                <div class="col-4">
                  <label for="rol">Rol</label>
                  <select
                    class="form-control"
                    id="rol"
                    v-model.trim="formData.rol"
                  >
                    <option value="" selected>Seleccionar...</option>
                    <option value="Administrador">Administrador</option>
                    <option>Docente</option>
                    <option>Estudiante</option>
                  </select>
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      data: {},
      formData: {
        _id: "",
        email: "",
        name: "",
        rol: "",
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
      var urlKeeps = "/getUsuario/" + this.status + "?page=" + page;

      fetch(urlKeeps)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.User.data;
        });
    },
    changePage: function (page) {
      this.pagination.current_page = page;
      this.getKeeps(page);
    },
    getUsuarios: function () {
      var url = "/getUsuario";
      //+ this.status
      this.data = {};
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.User.data;
          this.pagination = response.pagination;
        });
    },
    editarRol: function (item) {
      this.formData._id = item._id;
      this.formData.name = item.name;
      this.formData.email = item.email;
      this.formData.rol = item.rol;
      console.log(this.rol);
      $("#usuarioModal").modal("show");
    },
    saveChanges: function () {
      let url = "/editUsuario"
      console.log(url);
      axios
        .post(url, this.formData)
        .then((response) => {
          //this.formData = {};
          this.getUsuarios();
          toastr.success("Elemento guardado");
          $("#usuarioModal").modal("hide");
        })
        .catch((error) => {
          console.log("error: " + error);
          toastr.error(error);
        });
    },
  },
  created() {
    this.getUsuarios();
  },
};
</script>
