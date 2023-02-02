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
          Editar Usuario de Gerente
        </div>
        <div class="full-width panel-content">
          <form v-on:submit="editarUser">
            <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                <h5 class="text-condensedLight">Datos Gerente</h5>
              </div>

              <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                <h5 class="text-condensedLight">Detalles de la Cuenta</h5>

                <h5 class="text-condensedLight">Nombre de usuario : {{ userusername }}</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ]*(\.[0-9]+)?"
                    id="UserNameAdmin" v-model="user.username">
                  <label class="mdl-textfield__label" for="UserNameAdmin">Nombre de usuario</label>
                  <span class="mdl-textfield__error">Nombre de usuario no válido</span>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="password" id="passwordAdmin" v-model="user.password">
                  <label class="mdl-textfield__label" for="passwordAdmin">Contraseña</label>
                  <span class="mdl-textfield__error">Contraseña invalida</span>
                </div>

                <h5 class="text-condensedLight">Cédula : {{ userced }}</h5> 
                <h5 class="text-condensedLight">Dueño de la cuenta</h5>
                <div class="mdl-textfield mdl-js-textfield" >
                  <select class="mdl-textfield__input"  v-model="user.id_persona">
                    <option disabled="" >Selecciona la cédula del dueño de la nueva cuenta </option>
                    <option  v-for="persona in personas" :key="persona.id" :value="persona.id" >{{persona.cedula}}</option>
                  </select>
                </div>

                <p class="text-center">
                  <button
                    class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                    id="btn-addCategory" type="submit">
                    <i class="zmdi zmdi-plus"></i>
                    <div class="mdl-tooltip" for="btn-addCategory" v-on:click="editarUser()">
                      Editar cuenta de ingreso de gerente
                    </div>
                  </button>
                </p>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import * as under from '../../js_views/underscore-esm'
export default {
    props: {
    userc:[],
    userusername: String,
    userced: String,
  },
  data() {
    return {
      personas: {},
      user: {},
      bool: false
    }
  },created: function () {
    this.listarPersona();
	},
  methods: {
    listarPersona(){
      fetch('http://127.0.0.1:8000/api/v1/persona/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.personas = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.personas = datosrespuesta
					}
				})
    },
    async editarUser() {

      
      var datosuser = {
        username: this.user.username, password: this.user.password, id_persona: this.user.id_persona, id_rol: 2
      }
      console.log(datosuser);
      console.log(this.userc.id);


        fetch('http://127.0.0.1:8000/api/v1/user/' + this.userc.id, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datosuser)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/gerente'
        }))
      //window.location.href = '/gerente'
    }
  }
}
</script>