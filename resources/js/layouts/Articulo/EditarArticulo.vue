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
            Editar Articulo
          </div>
          <div class="full-width panel-content" id="EditarArticulo" >
            <form v-on:submit="editarArticulo">

              <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                  <h5 class="text-condensedLight">Información básica</h5>


                  <p>

                  </p>
                  <h5 class="text-condensedLight">Código del Articulo : {{ articulocod }}</h5>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                      id="CodProduct" v-model="articulo.articulocod">
                    <label class="mdl-textfield__label" for="CodProduct">Código del Artículo</label>
                    <span class="mdl-textfield__error">Código Invalida</span>
                  </div>

                  <p>

                  </p>
                  <h5 class="text-condensedLight">Nombre : {{ articulodetalle }}</h5>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?"
                      id="NameProduct" v-model="articulo.articulodetalle">
                    <label class="mdl-textfield__label" for="NameProduct">Nombre</label>
                    <span class="mdl-textfield__error">Nombre inválido</span>
                  </div>
                  <p>

                  </p>
                  <h5 class="text-condensedLight">Stock : {{ articulostock }}</h5>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="VentaCode"
                      v-model="articulo.articulostock">
                    <label class="mdl-textfield__label" for="VentaCode">Stock</label>
                    <span class="mdl-textfield__error">Valor no válido</span>
                  </div>
                  <p>

                  </p>
                  <h5 class="text-condensedLight">Valor de Compra: {{ articulovalorc }}</h5>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="CompraCode"
                      v-model="articulo.articulovalorc">
                    <label class="mdl-textfield__label" for="CompraCode">Valor de Compra</label>
                    <span class="mdl-textfield__error">Valor no válido</span>
                  </div>

                  <p>

                  </p>
                  <h5 class="text-condensedLight">Valor de Venta : {{ articulovalorv }}</h5>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="VentaCode"
                      v-model="articulo.articulovalorv">
                    <label class="mdl-textfield__label" for="VentaCode">Valor de Venta</label>
                    <span class="mdl-textfield__error">Valor no válido</span>
                  </div>

                  <h5 class="text-condensedLight">Tipo :{{ tipocod }} </h5>
                <div class="mdl-textfield mdl-js-textfield">
                  <select class="mdl-textfield__input" v-model="articulo.id_tipo">
                    <option  disabled="" >Selecciona el tipo </option>
                    <option  v-for="tipo in tipos" :key="tipo.id" >{{tipo.codtipo}}</option>
                  </select>
                </div>
                <h5 class="text-condensedLight">Marca :{{ marcacod }} </h5>
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
import * as mat from '../../js_views/material.min.js'
export default {
  props: {
    articuloidd: Number,
    articulocod: String,
    articulodetalle: String,
    articulostock: Number,
    articulovalorc: Number,
    articulovalorv: Number,
    articuloidm: Number,
    articuloidt: Number,
    tipocod: String,
    marcacod: String,
  },
  data() {
    return {
      articulo: {},
      tipos: {},
      marcas: {},
      selecmarc: {},
      selectipo: {},
      idtipo: String,
      idmarca: String
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
        .catch(console.log);
      console.log("holadesdeedita");
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
        .catch(console.log)
    },

    editarArticulo() {
      this.idtipo = this.articulo.id_tipo;
      this.idmarca = this.articulo.id_marca;
      this.selecmarc = under.findWhere(this.marcas, { codmarca: this.idmarca });
      this.selectipo = under.findWhere(this.tipos, { codtipo: this.idtipo });
      console.log(this.idmarca);
      console.log(this.selectipo);
      var datosarticulo = {
        codarticulo: this.articulo.articulocod, detalle: this.articulo.articulodetalle,
        stock: this.articulo.articulostock, valorcompra: this.articulo.articulovalorc, valorventa: this.articulo.articulovalorv,
        id_marca: this.selecmarc.id, id_tipo: this.selectipo.id
      };
      console.log(this.articulo);
      fetch('http://127.0.0.1:8000/api/v1/articulo/' + this.articuloidd, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datosarticulo)
      })
        .then(respuesta => respuesta.json)
        .then((datosrespuesta => {
          console.log(datosrespuesta);
          window.location.href = '/articulos'
        }))
    }
  }
}
</script>