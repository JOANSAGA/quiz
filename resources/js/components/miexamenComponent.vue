<template>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-between">
        <li class="breadcrumb-item" aria-current="page">
          Materia: {{ data.materia }}
        </li>
        <li class="breadcrumb-item" aria-current="page">
          Docente: {{ data.name }}
        </li>
        <li class="breadcrumb-item d-flex" aria-current="page">
          <span> Tiempo: {{ data.tiempo }} </span>
          <span v-if="tiempo" class="pl-3"> Termina: {{ tiempo }} </span>
        </li>
      </ol>
    </nav>
    <div class="row d-flex justify-content-end">
      <div class="col-2">
        <button
          type="button"
          class="btn btn-outline-info"
          v-on:click="iniciar()"
        >
          Iniciar
        </button>
      </div>
    </div>
    <div class="container row pt-3">
      <form class="w-100" @submit.prevent="enviarExamen">
        <ol>
          <div
            class="form-group row"
            v-for="pregunta in preguntas"
            v-bind:key="pregunta.id"
          >
            <div class="card w-100">
              <div class="card-body">
                <li class="ml-4 pb-3">
                  <span class="text-capitalize">{{ pregunta.pregunta }}</span>
                </li>
                <div class="row px-5">
                  <div class="col-12">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        :name="pregunta._id"
                        :id="pregunta._id"
                        type="radio"
                        :value="pregunta.litA"
                      />
                      <label class="form-check-label" :for="pregunta.litA">
                        {{ pregunta.litA }}
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row px-5">
                  <div class="col-12">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        :name="pregunta._id"
                        :id="pregunta._id"
                        type="radio"
                        :value="pregunta.litB"
                      />
                      <label class="form-check-label">
                        {{ pregunta.litB }}
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row px-5">
                  <div class="col-12">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        :name="pregunta._id"
                        :id="pregunta._id"
                        type="radio"
                        :value="pregunta.litD"
                      />
                      <label class="form-check-label">
                        {{ pregunta.litD }}
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row px-5">
                  <div class="col-12">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        :name="pregunta._id"
                        :id="pregunta._id"
                        type="radio"
                        :value="pregunta.litC"
                      />
                      <label class="form-check-label">
                        {{ pregunta.litC }}
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </ol>

        <div class="row d-flex justify-content-end">
          <div class="col-2">
            <button type="submit" class="btn btn-info" v-if="btn">
              Guardar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      tiempo: "",
      btn: false,
      data: {},
      preguntas: [],
      formData: {},
      respuestas: [],
    };
  },
  props: {
    _id: {
      type: String,
      default: "",
    },
  },
  created() {},
  mounted() {
    this.getExamen();
  },
  methods: {
    getExamen: function () {
      let url = "/getExamen/" + String(this._id);
      this.data = {};
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.data = response.data;
        });
    },
    iniciar: function () {
      var fecha = new Date();
      var sumarsesion = this.data.tiempo;
      var ingreso = fecha.getHours() + ":" + fecha.getMinutes();
      var minutes = fecha.getMinutes();
      fecha.setMinutes(minutes + sumarsesion);
      var fin = fecha.getHours() + ":" + fecha.getMinutes();
      this.tiempo = fin;
      this.cargarPreguntas();
    },
    cargarPreguntas: function () {
      let preguntas = [];
      this.data.items.forEach((element) => {
        preguntas.push(element._id);
      });
      let url = "/cargarPreguntas/" + preguntas;
      fetch(url)
        .then(function (response) {
          return response.json();
        })
        .then((response) => {
          this.preguntas = response.data;
          this.btn = true;
        });
    },
    enviarExamen: function () {
      this.preguntas.forEach((element) => {
        let respuesta = document.getElementById(element._id).value;
        this.respuestas.push({
          _id: element._id,
          respuesta: respuesta,
        });
      });
      console.log(this.respuestas);
      this.formData = {
        idexamen: this._id,
        respuestas: this.respuestas,
      };
      let url = "/saveExamen";
      axios
        .post(url, this.formData)
        .then((response) => {
          //this.formData = {};
          //this.materiaSelected = "todas";
          //this.getExamen();
          toastr.success("Elemento guardado");
          //$("#estMateriasModal").modal("hide");
        })
        .catch((error) => {
          console.log("error: " + error);
          toastr.error(error);
        });
        window.close();
    },
  },
};
</script>
