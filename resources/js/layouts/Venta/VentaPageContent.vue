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
            <GuardarVenta></GuardarVenta>
        </div>
        <div class="mdl-tabs__panel" id="tabListKardex">
            <MostrarVenta ref="MostrarComponent"></MostrarVenta>
        </div>
        <div class="mdl-tabs__panel " id="tabEditaListVenta">
            <EditarVenta :ventaidd="this.ventac.id" :ventacod="this.ventac.codventa"
                :ventacantidad="this.ventac.cantidad" :ventavalor="this.ventac.valor"
                :ventatotalventa="this.ventac.totalventa" :ventaida="this.ventac.id_articulo"
                :articulocod="this.ventaartic.codarticulo"
                v-if="bool == true"></EditarVenta>
        </div>
    </div>

</template>

<script>

import { MostrarVenta, EditarVenta, BorrarVenta, GuardarVenta } from "../index.js";

export default {

    components: {
        MostrarVenta,
        EditarVenta,
        BorrarVenta,
        GuardarVenta
    },
    data() {
        return {
            ventaidd: 0,
            ventacod: '',
            ventacantidad: 0,
            ventavalor: 0,
            ventatotalventa: 0,
            ventac: [],
            ventaida: 0,
            articulocod: '',
            articuloc: [],
            ventaartic: [],
            bool: false
        }
    },
	mounted(){
		
	},
    methods: {
        Edita(venta, articulo_) {
            this.$refs.MostrarComponent.passedit(this.ventaidd, this.ventacod, this.ventavalor,
                this.ventatotalventa, this.ventaida, venta, articulo_);
            this.ventac = venta;
            this.ventaartic = articulo_;
            this.bool = true;
            console.log("udp");
            console.log(venta);
            console.log(this.ventaartic.codarticulo);


            console.log(this.bool);
            this.$refs.edit.click();
        },
        disable() {
            this.bool = false;
        }
    }
}
</script>