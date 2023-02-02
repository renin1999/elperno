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
            <a href="#tabNewKardex" class="mdl-tabs__tab is-active" >NUEVO</a>
            <a href="#tabListKardex" class="mdl-tabs__tab" >LISTA</a>
        </div>

        <div class="mdl-tabs__panel is-active" id="tabNewKardex"><GuardarMarca></GuardarMarca></div>
        <div class="mdl-tabs__panel" id="tabListKardex"> <MostrarMarca ref="MostrarComponent"></MostrarMarca> </div>
        
        <EditarMarca  :marcaidd="this.marcac.id" :marcacod="this.marcac.codmarca" :marcadescrip="this.marcac.detalle" v-if="bool"></EditarMarca>
       
    </div>

</template>

<script>

import { MostrarMarca, EditarMarca, BorrarMarca, GuardarMarca } from "../index.js";

export default {

    components: {
        MostrarMarca, BorrarMarca, EditarMarca, GuardarMarca
    },
    data() {
		return{
            marcaidd: 0,
	        marcacod: '',
		    marcadescrip: '',
            marcac: [],
            bool:false
        } 
	},
    methods:{
        Edita(marca){
            this.$refs.MostrarComponent.passedit(this.marcaidd,this.marcacod,this.marcadescrip,marca);
            this.marcac=marca; 
            console.log("udp");
            console.log(this.marcac);
            this.bool=true;
            console.log(this.bool);
        }
    }
}
</script>