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
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
      <div class="full-width panel mdl-shadow--2dp">
        <div class="full-width panel-tittle bg-primary text-center tittles">
          NUEVA COMPRA
        </div>
        <div class="full-width panel-content">
          <form v-on:submit="editarcompra">
            <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                <h5 class="text-condensedLight">Datos a ingresar</h5>

                <h5 class="text-condensedLight">Articulo :{{ articulocod }} </h5>
                <div class="mdl-textfield mdl-js-textfield">
                  <select class="mdl-textfield__input"  v-model="compra.id_articulo">
                    <option disabled="" >Selecciona el articulo </option>
                    <option  v-for="articulo in articulos" :key="articulo.id" >{{articulo.codarticulo}}</option>
                  </select>
                </div>

                <h5 class="text-condensedLight">Proveedor :{{ proveedorcod }} </h5>
                <div class="mdl-textfield mdl-js-textfield">
                  <select class="mdl-textfield__input"  v-model="compra.id_proveedor">
                    <option disabled="" >Selecciona el Proveedor </option>
                    <option  v-for="proveedor in proveedors" :key="proveedor.id" >{{proveedor.codproveedor}}</option>
                  </select>
                </div>

                <h5 class="text-condensedLight">Código de la compra : {{ compracod }}</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" id="CodCompra" v-model="compra.compracod">
                  <label class="mdl-textfield__label" for="CodCompra"></label>
                  <span class="mdl-textfield__error">Codigo inválido</span>
                </div>

                <h5 class="text-condensedLight">Cantidad de la compra : {{ compracantidad }}</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="CantidadCompra" v-model="compra.compracantidad">
                  <label class="mdl-textfield__label" for="CantidadCompra"></label>
                  <span class="mdl-textfield__error">Cantidad inválido</span>
                </div>

                <h5 class="text-condensedLight">Valor de la compra : {{ compravalor }} $</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="number" min="0.00" max="10000.00" step="0.01" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" id="Valor" v-model="compra.compravalor"> 
                  <label class="mdl-textfield__label" for="ValorCompra"></label>
                  <span class="mdl-textfield__error">Valor inválido</span>
                </div>

                <h5 class="text-condensedLight">Total de la compra Anterior: {{ compratotalcompra }} $</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" disabled>{{ compra.compracantidad * compra.compravalor }} $
                  <label class="mdl-textfield__label" for="NameProduct"> Total Compra </label> 
                    
                </div>

              </div>
            </div>
            <p class="text-center">
                <button
                  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                  id="btn-addCategory" type="submit">
                  <i class="zmdi zmdi-plus"></i>
                  <div class="mdl-tooltip" for="btn-addCategory">
                    Editar Compra
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
  props: {
    compraidd: Number,
    compracod: String,
    compracantidad: 0,
    compravalor: 0,
    compratotalcompra: Number,
    proveedorcod: String,
    articulocod: String,
  },
  data() {
    return {
      compra: {},
      articulos: {},
      proveedors: {},
      selecarti: {},
      selecprov: {},
      idarticulo: String,
      idproveedor: String
    }
  },
  created: function () {
    this.listararticulos();
    this.listarproveedor();
  },
  methods: {

    listararticulos() {
      fetch('http://127.0.0.1:8000/api/v1/articulo/')
        .then(respuesta => respuesta.json())
        .then((datosrespuesta) => {
          console.log(datosrespuesta)
          this.articulos = []
          if (typeof datosrespuesta[0].success === 'undefined') {
            this.articulos = datosrespuesta
          }
        })
        .catch(console.log);
      console.log("holadesdeedita");
    },

    listarproveedor() {
			fetch('http://127.0.0.1:8000/api/v1/proveedor/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.proveedors = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.proveedors = datosrespuesta
					}
				})
	
		},

    editarcompra() {
      this.idarticulo = this.compra.id_articulo;
      this.idproveedor = this.compra.id_proveedor;
      this.selecarti = under.findWhere(this.articulos, { codarticulo: this.idarticulo });
      this.selecprov = under.findWhere(this.proveedors, { codproveedor: this.idproveedor });
      console.log(this.selecarti);
      console.log(this.selecprov);
      var datoscompra = {
        codcompra: this.compra.compracod, cantidad: this.compra.compracantidad,
        valor: this.compra.compravalor, id_articulo: this.selecarti.id, id_proveedor: this.selecprov.id
      };
      console.log(this.compra);
      fetch('http://127.0.0.1:8000/api/v1/compra/' + this.compraidd, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datoscompra)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/compra'
        }))
    }
  }
}
</script>