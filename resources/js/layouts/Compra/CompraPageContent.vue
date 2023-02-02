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
            <GuardarCompra></GuardarCompra>
        </div>
        <div class="mdl-tabs__panel" id="tabListKardex">
            <MostrarCompra ref="MostrarComponent"></MostrarCompra>
        </div>
        <div class="mdl-tabs__panel " id="tabEditaListVenta">
            <EditarCompra :compraidd="this.comprac.id" :compracod="this.comprac.codcompra"
                :compracantidad="this.comprac.cantidad" :compravalor="this.comprac.valor"
                :compratotalcompra="this.comprac.totalcompra" :compraida="this.comprac.id_articulo"
                :compraidp="this.comprac.id_proveedor" :articulocod="this.compraartic.codarticulo"
                :proveedorcod="this.compraprovc.codproveedor" v-if="bool == true"></EditarCompra>
        </div>
    </div>

</template>

<script>

import { MostrarCompra, EditarCompra, BorrarCompra, GuardarCompra } from "../index.js";

export default {

    components: {
        MostrarCompra,
        EditarCompra,
        BorrarCompra,
        GuardarCompra
    },
    data() {
        return {
            compraidd: 0,
            compracod: '',
            compracantidad: 0,
            compravalor: 0,
            compratotalcompra: 0,
            comprac: [],
            compraida: 0,
            compraidp: 0,
            articulocod: '',
            proveedorcod: '',
            articuloc: [],
            compraartic: [],
            compraprovc: [],
            bool: false
        }
    },
	mounted(){
		
	},
    methods: {
        Edita(compra, articulo_, proveedor_) {
            this.$refs.MostrarComponent.passedit(this.compraidd, this.compracod, this.compravalor,
                this.compratotalcompra, this.compraida, this.compraidp, compra, articulo_, proveedor_);
            this.comprac = compra;
            this.compraartic = articulo_;
            this.compraprovc = proveedor_;
            this.bool = true;
            console.log("udp");
            console.log(compra);
            console.log(this.compraartic.codarticulo);
            console.log(this.compraprovc.codproveedor);


            console.log(this.bool);
            this.$refs.edit.click();
        },
        disable() {
            this.bool = false;
        }
    }
}
</script>