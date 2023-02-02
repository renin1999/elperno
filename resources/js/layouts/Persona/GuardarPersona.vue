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
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
      <div class="full-width panel mdl-shadow--2dp">
        <div class="full-width panel-tittle bg-primary text-center tittles">
          Añadir Nuevo Gerente
        </div>
        <div class="full-width panel-content">
          <form v-on:submit="guardarGerente">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="DNIAdmin"
                v-model="persona.cedula">
              <label class="mdl-textfield__label" for="DNIAdmin">Cédula</label>
              <span class="mdl-textfield__error">Cédula inválido</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameAdmin"
                v-model="persona.nombre">
              <label class="mdl-textfield__label" for="NameAdmin">Nombre</label>
              <span class="mdl-textfield__error">Nombre inválido</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                id="LastNameAdmin" v-model="persona.apellido">
              <label class="mdl-textfield__label" for="LastNameAdmin">Apellido</label>
              <span class="mdl-textfield__error">Apellido inválido</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="EdadAdmin"
                v-model="persona.edad">
              <label class="mdl-textfield__label" for="EdadAdmin">Edad</label>
              <span class="mdl-textfield__error">Edad inválido</span>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="tel" pattern="^\d{10}$" id="phoneAdmin"
                v-model="persona.telefono">
              <label class="mdl-textfield__label" for="phoneAdmin">Teléfono</label>
              <span class="mdl-textfield__error">Número de teléfono invalido</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                id="CorreoAdmin" v-model="persona.email">
              <label class="mdl-textfield__label" for="CorreoAdmin">Correo</label>
              <span class="mdl-textfield__error">Correo inválido</span>
            </div>
            <h5 class="text-condensedLight">Sexo</h5>
            <div class="mdl-textfield mdl-js-textfield">
              <select class="mdl-textfield__input" v-model="persona.sexo">
                <option disabled="">Selecciona </option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
              </select>
            </div>
            <p class="text-center">
                  <button
                    class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                    id="btn-addCategory" type="submit">
                    <i class="zmdi zmdi-plus"></i>
                    <div class="mdl-tooltip" for="btn-addCategory" v-on:click="guardarGerente()">
                      Añadir Persona
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
      persona: {}
    }
  },
  methods: {

    async guardarGerente() {

      var datospersona = {
        cedula: this.persona.cedula, nombre: this.persona.nombre, apellido: this.persona.apellido
        , edad: this.persona.edad, sexo: this.persona.sexo, email: this.persona.email, telefono: this.persona.telefono
      }

      const response = await fetch('http://127.0.0.1:8000/api/v1/persona/', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datospersona)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
        }));;
      var datap = response.json();
      //use the data...
      window.location.href = '/datosgerente';
    }
  }
}
</script>