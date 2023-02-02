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


  <div class="mdl-grid">
    <div
      class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
      <div class="full-width panel mdl-shadow--2dp">
        <div class="full-width panel-tittle bg-primary text-center tittles">
          Nuevo Articulo
        </div>

        <div class="full-width panel-content" id="Articulo">

          <form v-on:submit="guardarArticulo">

            <div class="mdl-grid">

              <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                <h5 class="text-condensedLight">Información básica</h5>



                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                    id="CodProduct" v-model="articulo.codarticulo">
                  <label class="mdl-textfield__label" for="CodProduct">Código del Artículo</label>
                  <span class="mdl-textfield__error">Código Invalida</span>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                    id="NameProduct" v-model="articulo.detalle">
                  <label class="mdl-textfield__label" for="NameProduct">Nombre</label>
                  <span class="mdl-textfield__error">Nombre inválido</span>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="VentaCode" v-model="articulo.stock">
                  <label class="mdl-textfield__label" for="VentaCode">Stock</label>
                  <span class="mdl-textfield__error">Valor no válido</span>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" step=".01" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="CompraCode" v-model="articulo.valorcompra">
                  <label class="mdl-textfield__label" for="CompraCode">Valor de Compra</label>
                  <span class="mdl-textfield__error">Valor no válido</span>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" step=".01" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="VentaCode" v-model="articulo.valorventa">
                  <label class="mdl-textfield__label" for="VentaCode">Valor de Venta</label>
                  <span class="mdl-textfield__error">Valor no válido</span>
                </div>

                <h7 class="text-condensedLight">Tipo</h7>
                <div class="mdl-textfield mdl-js-textfield">
                  <select class="mdl-textfield__input" v-model="articulo.id_tipo">
                    <option  disabled="" >Selecciona el tipo </option>
                    <option  v-for="tipo in tipos" :key="tipo.id" >{{tipo.codtipo}}</option>
                  </select>
                </div>
                <h7 class="text-condensedLight">Marca</h7>
                <div class="mdl-textfield mdl-js-textfield">
                  <select class="mdl-textfield__input"  v-model="articulo.id_marca">
                    <option disabled="" >Selecciona la marca </option>
                    <option  v-for="marca in marcas" :key="marca.id" >{{marca.codmarca}}</option>
                  </select>
                </div>

              </div>

            </div>
            
            <p class="text-center">
                <button
                  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                  id="btn-addCategory" type="submit">
                  <i class="zmdi zmdi-plus"></i>
                  <div class="mdl-tooltip" for="btn-addCategory">
                    Añadir Articulo
                  </div>
                </button>
              </p>

          </form>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import * as under from '../../js_views/underscore-esm'
export default {
  data() {
    return {
      articulo: {},
      tipos: {},
      selecmarc:{},
      selectipo:{},
      idtipo:String,
      idmarca:String,
      marcas: {}
    }
  },
  created: function () {
		this.listartipo();
    this.listarmarca();
	},
  methods: {
    
    listarmarca() {
			fetch('http://127.0.0.1:8000/api/v1/marca/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.marcas = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.marcas = datosrespuesta
					}
				})
		},

    listartipo() {
			fetch('http://127.0.0.1:8000/api/v1/tipo/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.tipos = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.tipos = datosrespuesta
					}
				})
	
		},

    guardarArticulo() {
      this.idtipo=this.articulo.id_tipo;
      this.idmarca=this.articulo.id_marca; 
      this.selecmarc = under.findWhere(this.marcas, {codmarca: this.idmarca});
      this.selectipo = under.findWhere(this.tipos, {codtipo: this.idtipo});
      var datosarticulo = {
        codarticulo: this.articulo.codarticulo, detalle: this.articulo.detalle,
        stock: this.articulo.stock, valorcompra: this.articulo.valorcompra, valorventa: this.articulo.valorventa,
        id_marca: this.selecmarc.id , id_tipo: this.selectipo.id
      };console.log(this.articulo);
      fetch('http://127.0.0.1:8000/api/v1/articulo/', {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datosarticulo)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/articulo'
        }));
    }
  }
}
</script>