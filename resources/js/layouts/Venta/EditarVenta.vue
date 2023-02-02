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
          EDITAR VENTA
        </div>
        <div class="full-width panel-content">
          <form v-on:submit="editarventa">
            <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                <h5 class="text-condensedLight">Datos a ingresar</h5>

                <h5 class="text-condensedLight">Articulo :{{ articulocod }} </h5>
                <div class="mdl-textfield mdl-js-textfield">
                  <select class="mdl-textfield__input"  v-model="venta.id_articulo">
                    <option disabled="" >Selecciona el articulo </option>
                    <option  v-for="articulo in articulos" :key="articulo.id" >{{articulo.codarticulo}}</option>
                  </select>
                </div>

                <h5 class="text-condensedLight">Código de la venta : {{ ventacod }}</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" id="CodVenta" v-model="venta.ventacod">
                  <label class="mdl-textfield__label" for="CodVenta"></label>
                  <span class="mdl-textfield__error">Codigo inválido</span>
                </div>

                <h5 class="text-condensedLight">Cantidad de la venta : {{ ventacantidad }}</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="CantidadVenta" v-model="venta.ventacantidad">
                  <label class="mdl-textfield__label" for="CantidadVenta"></label>
                  <span class="mdl-textfield__error">Cantidad inválido</span>
                </div>

                <h5 class="text-condensedLight">Valor de la Venta : {{ ventavalor }} $</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="number" min="0.00" max="10000.00" step="0.01" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" id="Valor" v-model="venta.ventavalor"> 
                  <label class="mdl-textfield__label" for="ValorVenta"></label>
                  <span class="mdl-textfield__error">Valor inválido</span>
                </div>

                <h5 class="text-condensedLight">Total de la venta Anterior: {{ ventatotalventa }} $</h5>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" v-model="venta.ventatotalventa" disabled>{{ venta.ventacantidad * venta.ventavalor }} $
                  <label class="mdl-textfield__label" for="NameProduct"> Total Venta </label> 
                    
                </div>

              </div>
            </div>
            <p class="text-center">
                <button
                  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary"
                  id="btn-addCategory" type="submit">
                  <i class="zmdi zmdi-plus"></i>
                  <div class="mdl-tooltip" for="btn-addCategory">
                    Editar Venta
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
    ventaidd: Number,
    ventacod: String,
    ventacantidad: 0,
    ventavalor: 0,
    ventatotalventa: Number,
    articulocod: String,
  },
  data() {
    return {
      venta: {id_users: window.auth_user.id},
      articulos: {},
      users: {},
      selecarti: {},
      selecprov: {},
      idarticulo: String,
      iduser: String
    }
  },
  created: function () {
    this.listararticulos();
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

    editarventa() {
      this.idarticulo=this.venta.id_articulo;
      this.iduser = window.auth_user.id;
      console.log("holaid"+this.ventaidd);
      this.selecarticulo = under.findWhere(this.articulos, {codarticulo: this.idarticulo});

      var dtventa = {
        codventa: this.venta.ventacod, cantidad: this.venta.ventacantidad,
        valor: this.venta.ventavalor, id_articulo: this.selecarticulo.id, id_users: this.iduser
      };
      console.log(this.venta);
      console.log(dtventa);

      fetch('http://127.0.0.1:8000/api/v1/venta/' + this.ventaidd, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(dtventa)
        
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/venta'
        }))
    }
  }
}
</script>