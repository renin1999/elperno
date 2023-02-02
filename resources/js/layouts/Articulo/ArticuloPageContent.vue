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
            <GuardarArticulo></GuardarArticulo>
        </div>

        <div class="mdl-tabs__panel" id="tabListKardex">
            <MostrarArticulo ref="MostrarComponent"></MostrarArticulo>
        </div>

        <div class="mdl-tabs__panel" id="tabEditaListVenta">
            <EditarArticulo :articuloidd="this.articuloc.id" :articulocod="this.articuloc.codarticulo"
                :articulodetalle="this.articuloc.detalle" :articulostock="this.articuloc.stock"
                :articulovalorc="this.articuloc.valorcompra" :articulovalorv="this.articuloc.valorventa"
                :articuloidm="this.articuloc.id_marca" :articuloidt="this.articuloc.id_tipo"
                :tipocod="this.articulotipoc.codtipo" :marcacod="this.articulomarcac.codmarca" v-if="bool==true">
            </EditarArticulo>
        </div>
            
     



    </div>

</template>

<script>

import { MostrarArticulo, EditarArticulo, BorrarArticulo, GuardarArticulo } from "../index.js";

export default {

    components: {
        MostrarArticulo,
        EditarArticulo,
        BorrarArticulo,
        GuardarArticulo
    },
    data() {
        return {
            articuloidd: 0,
            articulocod: '',
            articulodetalle: '',
            articulostock: 0.0,
            articulovalorc: 0.0,
            articulovalorv: 0.0,
            articuloidm: 0,
            articuloidt: 0,
            tipocod: '',
            marcacod: '',
            articuloc: [],
            articulotipoc: [],
            articulomarcac: [],
            bool: false
        }
    },
    methods: {
        Edita(articulo, tipo_, marca_) {

            this.$refs.MostrarComponent.passedit(this.articuloidd, this.articulocod, this.articulodetalle,
                this.articulostock, this.articulovalorc, this.articulovalorv, this.articuloidm, this.articuloidt, articulo, tipo_, marca_);

            this.articuloc = articulo;
            this.articulotipoc = tipo_;
            this.articulomarcac = marca_;
            this.bool = true;
            console.log("udp");
            console.log(articulo);
            console.log(this.articulotipoc.codtipo);
            console.log(this.articulomarcac.codmarca);

            this.$refs.edit.click();
            console.log(this.bool);
        },
        disable() {
            this.bool = false;
        }
    }
}
</script>