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

import { MostrarMarca, EditarMarca, BorrarMarca, GuardarMarca } from "../index.js";

export default {

    components: {
        MostrarMarca, BorrarMarca, EditarMarca, GuardarMarca
    },
    data() {
        return {
            marcaidd: 0,
            marcacod: '',
            marcadescrip: '',
            marcac: [],
            bool: false
        }
    },
    methods: {
        Edita(marca) {
            this.$refs.MostrarComponent.passedit(this.marcaidd, this.marcacod, this.marcadescrip, marca);
            this.marcac = marca;
            console.log("udp");
            console.log(this.marcac);
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
<template>

    <div class="full-width divider-menu-h"> </div>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabNewKardex" class="mdl-tabs__tab is-active" @click="disable">NUEVO</a>
            <a href="#tabListKardex" class="mdl-tabs__tab" @click="disable">LISTA</a>
            <a href="#tabEditaListVenta" class="mdl-tabs__tab"  ref="edit" hidden="hidden">LISTA</a>
        </div>

        <div class="mdl-tabs__panel is-active" id="tabNewKardex">
            <GuardarMarca></GuardarMarca>
        </div>
        <div class="mdl-tabs__panel" id="tabListKardex">
            <MostrarMarca ref="MostrarComponent"></MostrarMarca>
        </div>
        <div class="mdl-tabs__panel" id="tabEditaListVenta">
            <EditarMarca :marcaidd="this.marcac.id" :marcacod="this.marcac.codmarca" :marcadescrip="this.marcac.detalle"
                v-if="bool == true">
            </EditarMarca>
        </div>


    </div>

</template>

