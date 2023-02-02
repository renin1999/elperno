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
					<th>Código de la Venta</th>
					<th>Cantidad</th>
					<th>Valor</th>
					<th>Total de la Venta</th>
					<th>Articulo</th>
					<th>Gerente</th>
				</tr>
			</thead>
			<tbody v-for="venta in ventas" :key="venta.id">
				<tr>
					<th>{{ venta.id }}</th>
					<th>{{ venta.codventa }}</th>
					<th>{{ venta.cantidad }}</th>
					<th>{{ venta.valor }} $</th>
					<th>{{ venta.totalventa }} $</th>
					<th>{{ venta.articulo.codarticulo }}</th>
					<th>{{ venta.user.username }}</th>
					<td>
						<a href="#tabEditaListVenta" class="mdl-tabs__tab" @click="llamaedit(venta)">
							<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
								EDITAR
							</button>
						</a>
					</td>
					<td id="BorrarVenta">
						<BorrarVenta :ventaid="venta.id" />
					</td>
				</tr>
			</tbody>

		</table>
	</div>

</template>

<script>
import BorrarVenta from './BorrarVenta.vue'
export default {
	components: {
		BorrarVenta
	},
	data() {
		return {
			ventas: [],
			ventaid: Number
		}
	},
	created: function () {
		this.listarventa()
	},
	methods: {
		listarventa() {
			fetch('http://127.0.0.1:8000/api/v1/venta/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.ventas = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.ventas = datosrespuesta
					}
				})
				.catch(console.log)
		},
		llamaedit(venta, articulo_, user_) {
			console.log("llam2");
			articulo_ = venta.articulo;
			user_ = venta.user;
			this.$parent.Edita(venta, articulo_);
		},
		passedit(ventaidd, ventacod, ventavalor,
			ventatotalventa, ventaida, venta, articulo_) {

			ventaidd = venta.id;
			ventacod = venta.codventa;
			ventavalor = venta.valor;
			ventatotalventa = venta.totalventa;
			ventaida = venta.id_articulo;


			console.log("pasa");

			this.$emit("Edita", ventaidd, ventacod, ventavalor,
				ventatotalventa, ventaida, venta, articulo_);//no pasa tipo,arti,marca
		}
	}
}
</script>
