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
<script>
export default {
  props: {
    tipoidd: Number,
    tipocod: String,
    tipodescrip: String
  },
  data() {
    return {
      tipo: {}
    }
  },created: function () {
		this.saluda()
	},
  methods: {
    editarTipo() {
      console.log(this.tipo);
      var datostipo = { codtipo: this.tipo.tipocod, detalle: this.tipo.tipodescrip }
      fetch('http://127.0.0.1:8000/api/v1/tipo/' + this.tipoidd, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datostipo)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/tipo'
        }))
    },
    saluda(){
      console.log("hola");
    }
  }
}
</script>
<template>
  
    <div class="mdl-grid">
      <div
        class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
        <div class="full-width panel mdl-shadow--2dp">
          <div class="full-width panel-tittle bg-primary text-center tittles">
            Editar Tipo
          </div>
          <div class="full-width panel-content" id="EditarTipo">
            <form v-on:submit="editarTipo">
              <h5 class="text-condensedLight">Datos de Tipo</h5>
              <p>

              </p>
              <h5 class="text-condensedLight">Código del tipo : {{ tipocod }}</h5>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                  id="NameCategory" v-model="tipo.tipocod">
                <label class="mdl-textfield__label" for="NameCategory"></label>
                <span class="mdl-textfield__error">Código inválido</span>
              </div>
              <p>

              </p>
              <h5 class="text-condensedLight">Descripción : {{ tipodescrip }}</h5>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-30]+)?"
                  id="descriptionCategory" v-model="tipo.tipodescrip">
                <label class="mdl-textfield__label" for="descriptionCategory"></label>
                <span class="mdl-textfield__error">Descripción inválida</span>
              </div>

              <p class="text-center">
                <button
                  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                  id="btn-addCategory" type="submit">
                  <i class="zmdi zmdi-plus"></i>
                  <div class="mdl-tooltip" for="btn-addCategory">
                    Editar Tipo
                  </div>
                </button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>

   

   

</template>
