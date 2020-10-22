<template>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div
        class="col-auto pt-3"
        v-for="materia in materias"
        v-bind:key="materia.id"
      >
        <div class="card" style="width: 15rem">
          <div class="card-body">
            <h5 class="card-title text-capitalize text-center">
              {{ materia.nombreMateria }}
            </h5>
            <div class="list-group">
              <a
                href="#"
                class="list-group-item list-group-item-action"
                v-for="examen in examenes"
                v-bind:key="examen.id"
              >
                {{ examen.materia }}
              </a>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <a href="#" class="btn btn-primary">ver tareas</a>
          </div>
        </div>
      </div>
      <div class="col-auto pt-3">
        <div class="card" style="width: 15rem; height: 15rem">
          <div class="card-body">
            <h5 class="card-title text-capitalize text-center">
              Agregar materia
            </h5>
            <a href="#">
              <img
                src="/img/mas.png"
                class="card-img-top rounded mx-auto d-block"
                alt=""
                srcset=""
                style="width: 7em; height: 7em"
                v-on:click="nuevaMateria()"
              />
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-auto">
        <ul v-for="examen in examenes" v-bind:key="examen.id">
          <li>
            {{ examen }}
          </li>
        </ul>
      </div>
    </div>
    <div
      class="modal fade"
      id="estMateriasModal"
      tabindex="-1"
      data-backdrop="static"
      data-keyboard="false"
      aria-labelledby="estMateriasModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="estMateriasModalLabel">Examen</h5>
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
              <ul
                class="list-group"
                v-for="att in addMateria"
                v-bind:key="att.id"
              >
                <li class="list-group-item d-flex justify-content-between">
                  <span> {{ att.nombreMateria }}</span>
                  <span>{{ att.nivel }}</span>
                  <span>{{ att.descripcion }}</span>
                  <button
                    type="button"
                    class="rounded-pill btn btn-primary button-small"
                    v-on:click="addMateriaEst(att)"
                  >
                    Agregar
                  </button>
                </li>
              </ul>
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
      materias: {},
      data: {},
      formData: {
        _id: "",
        materia: {
          _id: "",
          nombreMateria: "",
        },
      },
      addMateria: {},
      examenes: [],
    };
  },
  methods: {
    userData: function () {
      this.materias = {};
      var url = "/userData";
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.userData;
          this.materias = this.data[0].materias;
          this.listarExamen();
        });
      //toastr.success("Hola");
    },
    nuevaMateria: function () {
      $("#estMateriasModal").modal("show");
      //console.log(this.data);
      this.getMaterias();
      //toastr.success("nueva materia al id: " + this.data[0]._id);
    },
    getMaterias: function () {
      var url = "/getMateriaA";
      this.addMateria = {};
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.addMateria = response.materias.data;
          this.pagination = response.pagination;
        });
    },
    listarExamen: function () {
      this.materias.forEach((element) => {
        this.getExamen(element.nombreMateria);
      });
    },
    getExamen: function (nombreMateria) {
      var url = "/getExamen/A/" + nombreMateria;
      this.examenes = [];
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          response.examenes.data.forEach((element) => {
            this.examenes.push(element);
          });
        });
    },
    addMateriaEst: function (att) {
      this.formData._id = this.data[0]._id;
      this.formData.materia._id = att._id;
      this.formData.materia.nombreMateria = att.nombreMateria;

      let url = "/addMateriaEst";

      axios
        .post(url, this.formData)
        .then((response) => {
          //this.formData = {};
          //this.materiaSelected = "todas";
          //this.getExamen();
          toastr.success("Elemento guardado");
          //$("#estMateriasModal").modal("hide");
          this.userData();
        })
        .catch((error) => {
          console.log("error: " + error);
          toastr.error(error);
        });
      console.log(this.formData);
    },
  },
  created() {
    this.userData();
  },
};
</script>
