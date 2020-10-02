<template>
  <div class="container">
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
                class="btn-success btn btn-sm mr-2"
                v-on:click="inactivaMateria(att._id)"
              >
                Editar
              </button>
              <button
                class="btn-danger btn btn-sm mr-2"
                v-on:click="inactivaMateria(att._id)"
              >
                Inactivar
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
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    getKeeps: function (page) {
      var urlKeeps = "/getMateria?page=" + page;

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
    inactivaMateria(id) {
      var url = "/inactivarMateria";

      return axios
        .post(
          url,
          { _id: id },
          {
            headers: {
              "Content-type": "application/json",
            },
          }
        )
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log("error: " + error);
        });
    },
  },
  created() {
    this.data = {};
    fetch("/getMateria")
      .then(function (response) {
        return response.json();
      })
      .then((response) => {
        this.data = response.materias.data;
        this.pagination = response.pagination;
      });
  },
};
</script>
