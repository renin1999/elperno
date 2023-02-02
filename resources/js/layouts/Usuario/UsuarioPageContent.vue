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
            <a href="#tabNewKardexP" class="mdl-tabs__tab is-active" @click="disable">NUEVA CUENTA DE USUARIO</a>
            <a href="#tabListKardex" class="mdl-tabs__tab" @click="disable">LISTA</a>
            <a href="#tabEditaListVenta" class="mdl-tabs__tab" ref="edit" hidden="hidden">LISTA</a>
        </div>

        <div class="mdl-tabs__panel is-active" id="tabNewKardexP">
            <GuardarUsuario></GuardarUsuario>
        </div>
        <div class="mdl-tabs__panel" id="tabListKardex">
            <MostrarUsuario ref="MostrarComponent"></MostrarUsuario>
        </div>
        <div class="mdl-tabs__panel" id="tabEditaListVenta">
            <EditarUsuario :userc="this.userc" 
            :userusername="this.userc.username" :userced="this.userced" v-if="bool==true"></EditarUsuario>
        </div>

    </div>

</template>

<script>

import { GuardarUsuario, MostrarUsuario, EditarUsuario } from "../index.js";

export default {

    components: {
        GuardarUsuario,
        MostrarUsuario,
        EditarUsuario
    },
    data() {
        return {
            tipoidd: 0,
            tipocod: '',
            tipodescrip: '',
            tipoc: [],
            bool: false,
            userced: '',
            userc:[0,'',0,0]
        }
    },
    methods: {
        disable() {
            this.bool = false;
        },
        Edita(user,ced) {
            console.log("udp");
            console.log(user);
            this.$refs.MostrarComponent.passedit(this.userc,user, ced);

            this.userc = user;
            this.userced = ced;
            this.bool = true;
            console.log("udp");
            console.log(this.userc);

            this.$refs.edit.click();
            console.log(this.bool);
        }
    }
}
</script>