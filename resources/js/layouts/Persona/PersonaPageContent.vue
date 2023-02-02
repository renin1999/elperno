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

    <div class="full-width divider-menu-h"> </div>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabNewKardex" class="mdl-tabs__tab is-active" @click="disable">NUEVA PERSONA</a>

            <a href="#tabListKardex" class="mdl-tabs__tab" @click="disable">LISTA</a>
            <a href="#tabEditaListVenta" class="mdl-tabs__tab"  ref="edit" hidden="hidden">LISTA</a>
        </div>

        <div class="mdl-tabs__panel is-active" id="tabNewKardex">
            <GuardarPersona ></GuardarPersona>
        </div>
        <div class="mdl-tabs__panel" id="tabListKardex">
            <MostrarPersona ref="MostrarComponent"></MostrarPersona>
        </div>
        <div class="mdl-tabs__panel" id="tabEditaListVenta">
            <EditarPersona :personac = "this.personac" v-if="bool"></EditarPersona>
        </div>

    </div>

</template>

<script>

import { GuardarPersona, MostrarPersona,EditarPersona } from "../index.js";

export default {

    components: {
      GuardarPersona, MostrarPersona, EditarPersona
    },
    data() {
        return {
            personaidd: 0,
            personacod: '',
            personadescrip: '',
            personac: [],
            bool: false
        }
    },
    methods: {
        disable() {
            this.bool = false;
        },
        Edita(persona) {
            this.$refs.MostrarComponent.passedit(this.personac, persona);
            this.personac = persona;
            console.log("udp");
            console.log(this.personac);
            this.bool = true;
            console.log(this.bool);
            this.$refs.edit.click();
        }
    }
}
</script>