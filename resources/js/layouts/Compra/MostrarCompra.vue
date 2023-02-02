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
					<th>Código de la compra</th>
					<th>Cantidad</th>
					<th>Valor</th>
					<th>Total de la Compra</th>
					<th>Articulo</th>
					<th>Proveedor</th>
				</tr>
			</thead>
			<tbody v-for="compra in compras" :key="compra.id">
				<tr>
					<th>{{ compra.id }}</th>
					<th>{{ compra.codcompra }}</th>
					<th>{{ compra.cantidad }}</th>
					<th>{{ compra.valor }} $</th>
					<th>{{ compra.totalcompra }} $</th>
					<th>{{ compra.articulo.codarticulo }}</th>
					<th>{{ compra.proveedor.codproveedor }}</th>
					<td>
						<a href="#tabEditaListVenta" class="mdl-tabs__tab" @click="llamaedit(compra)">
							<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
								EDITAR
							</button>
						</a>
					</td>
					<td id="BorrarCompra">
						<BorrarCompra :compraid="compra.id" />
					</td>
				</tr>
			</tbody>

		</table>
	</div>

</template>

<script>
import BorrarCompra from './BorrarCompra.vue'
export default {
	components: {
		BorrarCompra
	},
	data() {
		return {
			compras: [],
			compraid: Number
		}
	},
	created: function () {
		this.listarcompra()
	},
	methods: {
		listarcompra() {
			fetch('http://127.0.0.1:8000/api/v1/compra/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.compras = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.compras = datosrespuesta
					}
				})
				.catch(console.log)
		},
		llamaedit(compra, articulo_, proveedor_) {
			console.log("llam2");
			articulo_ = compra.articulo;
			proveedor_ = compra.proveedor;
			this.$parent.Edita(compra, articulo_, proveedor_);
		},
		passedit(compraidd, compracod, compravalor,
			compratotalcompra, compraida, compraidp, compra, articulo_, proveedor_) {

			compraidd = compra.id;
			compracod = compra.codcompra;
			compravalor = compra.valor;
			compratotalcompra = compra.totalcompra;
			compraida = compra.id_articulo;
			compraidp = compra.id_proveedor;


			console.log("pasa");

			this.$emit("Edita", compraidd, compracod, compravalor,
				compratotalcompra, compraida, compraidp, compra, articulo_, proveedor_);//no pasa tipo,arti,marca
		}
	}
}
</script>
