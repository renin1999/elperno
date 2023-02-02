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

        <div class="mdl-tabs__panel is-active" id="tabNewKardex" ><GuardarProveedor></GuardarProveedor></div>
        <div class="mdl-tabs__panel" id="tabListKardex" > <MostrarProveedor ref="MostrarComponent"></MostrarProveedor> </div>

        <div class="mdl-tabs__panel" id="tabEditaListVenta"> 
        <EditarProveedor  :proveedoridd="this.proveedorc.id" :proveedorcod="this.proveedorc.codproveedor" 
        :proveedornombre_ape="this.proveedorc.nombre_ape" :proveedordir="this.proveedorc.direccion" 
        :proveedoremail="this.proveedorc.email" :proveedortele="this.proveedorc.telefono" v-if="bool==true"></EditarProveedor>
        </div>
  
    </div>

</template>

<script>

import { MostrarProveedor, EditarProveedor, BorrarProveedor, GuardarProveedor } from "../index.js";

export default {

    components: {
        MostrarProveedor,
        EditarProveedor,
        BorrarProveedor,
        GuardarProveedor
},
    data() {
		return{
            proveedoridd: 0,
	        proveedorcod: '',
		    proveedornombre_ape: '',
            proveedordir: '',
            proveedoremail: '',
            proveedortele: '',
            proveedorc: [],
            bool:false
        } 
	},
    methods:{
        Edita(proveedor){
            this.$refs.MostrarComponent.passedit(this.proveedoridd,this.proveedorcod,this.proveedornombre_ape,
            this.proveedordir,this.proveedoremail,this.proveedortele, proveedor);
            this.proveedorc=proveedor; 
            console.log("udp");
            console.log(this.proveedorc);
            this.bool=true;
            console.log(this.bool);
            this.$refs.edit.click();
        },
        disable(){
            this.bool=false;
        }
    }
}
</script>