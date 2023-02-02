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
            Nuevo Proveedor
          </div>

          <div class="full-width panel-content" id="GuardarProveedor">
            
            <form v-on:submit="guardarProveedor">

              <h5 class="text-condensedLight">Datos del proveedor</h5>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                  id="NameCategory" v-model="proveedor.codproveedor">
                <label class="mdl-textfield__label" for="NameCategory">Código del proveedor</label>
                <span class="mdl-textfield__error">Código inválido</span>
              </div>

              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-30]+)?"
                  id="descriptionCategory" v-model="proveedor.nombre_ape">
                <label class="mdl-textfield__label" for="descriptionCategory">Nombre y Apellido</label>
                <span class="mdl-textfield__error">Descripción inválida</span>
              </div>

              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-30]+)?"
                  id="descriptionCategory" v-model="proveedor.direccion">
                <label class="mdl-textfield__label" for="descriptionCategory">Direccion</label>
                <span class="mdl-textfield__error">Direccion inválida</span>
              </div>

              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" 
                    id="CorreoAdmin" v-model="proveedor.email">
                <label class="mdl-textfield__label" for="CorreoAdmin">Email</label>
                <span class="mdl-textfield__error">Email inválido</span>
              </div>

              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?"
                  id="phoneAdmin" v-model="proveedor.telefono">
                <label class="mdl-textfield__label" for="phoneAdmin">Teléfono</label>
                <span class="mdl-textfield__error">Teléfono inválida</span>
              </div>

              <p class="text-center">
                <button
                  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                  id="btn-addCategory" type="submit">
                  <i class="zmdi zmdi-plus"></i>
                  <div class="mdl-tooltip" for="btn-addCategory">
                    Añadir Proveedor
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
  data() {
    return {
      proveedor: {}
    }
  },
  methods: {
    guardarProveedor() {
      console.log(this.proveedor);
      var datosproveedor = { codproveedor: this.proveedor.codproveedor, nombre_ape: this.proveedor.nombre_ape,
        direccion: this.proveedor.direccion, email: this.proveedor.email, telefono: this.proveedor.telefono }
      fetch('http://127.0.0.1:8000/api/v1/proveedor/', {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datosproveedor)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/proveedor'
        }));
    }
  }
}
</script>