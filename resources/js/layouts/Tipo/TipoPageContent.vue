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
            <a href="#tabNewKardex" class="mdl-tabs__tab is-active" @click="disable">NUEVO</a>
            <a href="#tabListKardex" class="mdl-tabs__tab" @click="disable">LISTA</a>
            <a href="#tabEditaListVenta" class="mdl-tabs__tab"  ref="edit" hidden="hidden">LISTA</a>
        </div>

        <div class="mdl-tabs__panel is-active" id="tabNewKardex">
            <GuardarTipo></GuardarTipo>
        </div>
        <div class="mdl-tabs__panel" id="tabListKardex">
            <MostrarTipo ref="MostrarComponent"></MostrarTipo>
        </div>
        <div class="mdl-tabs__panel" id="tabEditaListVenta">
            <EditarTipo :tipoidd="this.tipoc.id" :tipocod="this.tipoc.codtipo" :tipodescrip="this.tipoc.detalle"
                v-if="bool == true"></EditarTipo>
        </div>

    </div>

</template>

<script>

import { MostrarTipo, EditarTipo, BorrarTipo, GuardarTipo } from "../index.js";

export default {

    components: {
        MostrarTipo, EditarTipo, BorrarTipo, GuardarTipo
    },
    data() {
        return {
            tipoidd: 0,
            tipocod: '',
            tipodescrip: '',
            tipoc: [],
            bool: false
        }
    },
    methods: {
        Edita(tipo) {
            this.$refs.MostrarComponent.passedit(this.tipoidd, this.tipocod, this.tipodescrip, tipo);
            this.tipoc = tipo;
            console.log("udp");
            console.log(this.tipoc);
            this.bool = true;
            console.log(this.bool);
            this.$refs.edit.click();
        },
        disable() {
            this.bool = false;
        }
    }
}
</script>