<style scoped src="../../../css/normalize.css">

</style>
<style scoped src="../../../css/sweetalert2.css">

</style>
<style scoped src="../../../css/material.min.css">

</style>
<style scoped src="../../../css/material-design-iconic-font.min.css">

</style>
<style scoped src="../../../css/jquery.mCustomScrollbar.css">

</style>
<style scoped src="../../../css/main.css">

</style>

<template>

  <div class="mdl-grid">
    <div
      class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
      <div class="full-width panel mdl-shadow--2dp">
        <div class="full-width panel-tittle bg-primary text-center tittles">
          Editar Marca
        </div>
        <div class="full-width panel-content" id="EditarMarca">
          <form v-on:submit="editarMarca">
            <h5 class="text-condensedLight">Datos de Marca</h5>
            <p>

            </p>
            <h5 class="text-condensedLight">Código de la marca : {{ marcacod }}</h5>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                id="NameCategory" v-model="marca.marcacod">
              <label class="mdl-textfield__label" for="NameCategory"></label>
              <span class="mdl-textfield__error">Código inválido</span>
            </div>
            <p>

            </p>
            <h5 class="text-condensedLight">Descripción : {{ marcadescrip }}</h5>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-30]+)?"
                id="descriptionCategory" v-model="marca.marcadescrip">
              <label class="mdl-textfield__label" for="descriptionCategory"></label>
              <span class="mdl-textfield__error">Descripción inválida</span>
            </div>

            <p class="text-center">
              <button
                class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                id="btn-addCategory" type="submit">
                <i class="zmdi zmdi-plus"></i>
                <div class="mdl-tooltip" for="btn-addCategory">
                  Editar Marca
                </div>
              </button>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>


  

</template>
<script>
export default {
  props: {
    marcaidd: Number,
    marcacod: String,
    marcadescrip: String
  },
  data() {
    return {
      marca: {}
    }
  },
  methods: {
    editarMarca() {
      console.log(this.marca);
      var datosmarca = { codmarca: this.marca.marcacod, detalle: this.marca.marcadescrip }
      fetch('http://127.0.0.1:8000/api/v1/marca/' + this.marcaidd, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datosmarca)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/marca'
        }))
    }
  }
}
</script>