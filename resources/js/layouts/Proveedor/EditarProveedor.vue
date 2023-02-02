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
            Editar Proveedor
          </div>
          <div class="full-width panel-content" id="EditarProveedor">
            <form v-on:submit="editarproveedor">
              <h5 class="text-condensedLight">Datos del Proveedor</h5>
              <p>

              </p>
              <h7 class="text-condensedLight">Código del proveedor : {{ proveedorcod }}</h7>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                  id="NameCategory" v-model="proveedor.proveedorcod">
                <label class="mdl-textfield__label" for="NameCategory"></label>
                <span class="mdl-textfield__error">Código inválido</span>
              </div>
              <p>

              </p>
              <h7 class="text-condensedLight">Nombre y Apellido : {{ proveedornombre_ape }}</h7>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-30]+)?"
                  id="descriptionCategory" v-model="proveedor.proveedornombre_ape">
                <label class="mdl-textfield__label" for="descriptionCategory"></label>
                <span class="mdl-textfield__error">Nombre y Apellido inválida</span>
              </div>

              <p>

              </p>
              <h7 class="text-condensedLight">Direccion : {{ proveedordir }}</h7>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="tel" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-30]+)?"
                  id="addressAdmin" v-model="proveedor.proveedordir">
                <label class="mdl-textfield__label" for="addressAdmin"></label>
                <span class="mdl-textfield__error">Dirección inválida</span>
              </div>

              <p>

              </p>
              <h7 class="text-condensedLight">Email : {{ proveedoremail }}</h7>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" 
                id="CorreoAdmin" v-model="proveedor.proveedoremail">
                <label class="mdl-textfield__label" for="CorreoAdmin"></label>
                <span class="mdl-textfield__error">Correo inválida</span>
              </div>

              <p>

              </p>
              <h7 class="text-condensedLight">Teléfono : {{ proveedortele }}</h7>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?"
                  id="phoneAdmin" v-model="proveedor.proveedortele">
                <label class="mdl-textfield__label" for="phoneAdmin"></label>
                <span class="mdl-textfield__error">Número de teléfono inválida</span>
              </div>

              <p class="text-center">
                <button
                  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                  id="btn-addCategory" type="submit">
                  <i class="zmdi zmdi-plus"></i>
                  <div class="mdl-tooltip" for="btn-addCategory">
                    Editar Proveedor
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
    proveedoridd: Number,
    proveedorcod: String,
    proveedornombre_ape: String,
    proveedordir: String,
    proveedoremail: String,
    proveedortele: String,
  },
  data() {
    return {
      proveedor: {}
    }
  },
  methods: {
    editarproveedor() {
      console.log(this.proveedor);
      var datosproveedor = { codproveedor: this.proveedor.proveedorcod, nombre_ape: this.proveedor.proveedornombre_ape,
        direccion: this.proveedor.proveedordir, email: this.proveedor.proveedoremail, telefono: this.proveedor.proveedortele }
      fetch('http://127.0.0.1:8000/api/v1/proveedor/' + this.proveedoridd, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datosproveedor)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/proveedor'
        }))
    }
  }
}
</script>