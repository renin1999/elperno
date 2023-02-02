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
		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">

			<thead>
				<tr>
					<th>ID</th>
					<th>Código del Artículo</th>
					<th>Detalle</th>
					<th>Stock</th>
					<th>Valor de Compra</th>
					<th>Valor de Venta</th>
					<th>Marca</th>
					<th>Tipo</th>
				</tr>
			</thead>
			<tbody v-for="articulo in articulos" :key="articulo.id">
				<tr>
					<th>{{ articulo.id }}</th>
					<th>{{ articulo.codarticulo }}</th>
					<th>{{ articulo.detalle }}</th>
					<th>{{ articulo.stock }}</th>
					<th>{{ articulo.valorcompra }}</th>
					<th>{{ articulo.valorventa }}</th>
					<th>{{ articulo.marca.codmarca }}</th>
					<th>{{ articulo.tipo.codtipo }}</th>
					<td>
						<a href="#tabEditaListVenta" class="mdl-tabs__tab" @click="llamaedit(articulo, tipo_, marca_)">
							<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
								EDITAR
							</button>
						</a>
					</td>
					<td id="BorrarArticulo">
						<BorrarArticulo :articuloid="articulo.id" />
					</td>
				</tr>
			</tbody>

		</table>
	</div>

</template>

<script>
import BorrarArticulo from './BorrarArticulo.vue'
export default {
	components: {
		BorrarArticulo
	},
	data() {
		return {
			articulos: [],
			articuloid: Number
		}
	},
	created: function () {
		this.listararticulo()
	},
	methods: {
		listararticulo() {
			fetch('http://127.0.0.1:8000/api/v1/articulo/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.articulos = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.articulos = datosrespuesta
					}
				})
				.catch(console.log)
		},
		llamaedit(articulo, tipo_, marca_) {
			console.log("llam2");
			tipo_ = articulo.tipo;
			marca_ = articulo.marca;
			this.$parent.Edita(articulo, tipo_, marca_);
		},
		passedit(articuloidd, articulocod, articulodetalle,
			articulostock, articulovalorc, articulovalorv, articuloidm, articuloidt, articulo, tipo_, marca_) {

			articuloidd = articulo.id;
			articulocod = articulo.codarticulo;
			articulodetalle = articulo.detalle;
			articulostock = articulo.stock;
			articulovalorc = articulo.valorcompra;
			articulovalorv = articulo.valorventa;
			articuloidm = articulo.id_marca;
			articuloidt = articulo.id_tipo;

			console.log("pasa");

			this.$emit("Edita", articuloidd, articulocod, articulodetalle,
				articulostock, articulovalorc, articulovalorv, articuloidm, articuloidt, articulo, tipo_, marca_);//no pasa tipo,arti,marca
		}
	}
}
</script>
