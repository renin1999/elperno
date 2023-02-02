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
        personac: []
    },
    data() {
        return {
            persona: {}
        }
    }, created: function () {
        this.saluda()
    },
    methods: {
        editarpersona() {
            console.log(this.persona);
            var datospersona = {
                cedula: this.persona.cedula, nombre: this.persona.nombre, apellido: this.persona.apellido
                , edad: this.persona.edad, sexo: this.persona.sexo, email: this.persona.email, telefono: this.persona.telefono
            }
            fetch('http://127.0.0.1:8000/api/v1/persona/' + this.personac.id, {
                method: "PUT",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(datospersona)
            })
                .then(respuesta => respuesta.json)
                .then((datosrespuesta => {
                    console.log(datosrespuesta);
                    window.location.href = '/datosgerente';
                }))
        },
        saluda() {
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
                    Editar persona
                </div>
                <div class="full-width panel-content" id="EditarPersona">
                    <form v-on:submit="editarpersona">

                        <h5 class="text-condensedLight">Cédula: {{ personac.cedula }}</h5>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?"
                                id="DNIAdmin" v-model="persona.cedula">
                            <label class="mdl-textfield__label" for="DNIAdmin"></label>
                            <span class="mdl-textfield__error">Cédula inválido</span>
                        </div>
                        <h5 class="text-condensedLight">Nombre: {{ personac.nombre }}</h5>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                                id="NameAdmin" v-model="persona.nombre">
                            <label class="mdl-textfield__label" for="NameAdmin"></label>
                            <span class="mdl-textfield__error">Nombre inválido</span>
                        </div>
                        <h5 class="text-condensedLight">Apellido: {{ personac.apellido }}</h5>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                                id="LastNameAdmin" v-model="persona.apellido">
                            <label class="mdl-textfield__label" for="LastNameAdmin"></label>
                            <span class="mdl-textfield__error">Apellido inválido</span>
                        </div>
                        <h5 class="text-condensedLight">Edad: {{ personac.edad }}</h5>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?"
                                id="EdadAdmin" v-model="persona.edad">
                            <label class="mdl-textfield__label" for="EdadAdmin"></label>
                            <span class="mdl-textfield__error">Edad inválido</span>
                        </div>
                        <h5 class="text-condensedLight">Telefono: {{ personac.telefono }}</h5>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="tel" pattern="^\d{10}$" id="phoneAdmin"
                                v-model="persona.telefono">
                            <label class="mdl-textfield__label" for="phoneAdmin"></label>
                            <span class="mdl-textfield__error">Número de teléfono invalido</span>
                        </div>
                        <h5 class="text-condensedLight">Email: {{ personac.email }}</h5>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="email"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="CorreoAdmin"
                                v-model="persona.email">
                            <label class="mdl-textfield__label" for="CorreoAdmin"></label>
                            <span class="mdl-textfield__error">Correo inválido</span>
                        </div>
                        <h5 class="text-condensedLight">Sexo: {{ personac.sexo }}</h5>
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
                                <div class="mdl-tooltip" for="btn-addCategory">
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
