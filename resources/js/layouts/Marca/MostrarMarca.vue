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

<script>
import BorrarMarca from './BorrarMarca.vue'
export default {
	components: {
		BorrarMarca
	},
	data() {
		return {
			marcas: [],
			marcaid: Number
		}
	},
	created: function () {
		this.listarmarca()
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
				.catch(console.log)
		},
		llamaedit(marca) {
			console.log(marca);
			this.$parent.Edita(marca);
		},
		passedit(marcaidd, marcacod, marcadescrip, marca) {
			console.log("pasa");
			marcaidd = marca.id;
			marcacod = marca.codmarca;
			marcadescrip = marca.detalle;
			this.$emit("Edita", marcaidd, marcacod, marcadescrip, marca);
		}
	}
}
</script>
<template>
	<div class="mdl-grid">
		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">

			<thead>
				<tr>
					<th>ID</th>
					<th>Código de la Marca</th>
					<th>Detalle</th>
				</tr>
			</thead>
			<tbody v-for="marca in marcas" :key="marca.id">
				<tr>
					<th>{{ marca.id }}</th>
					<th>{{ marca.codmarca }}</th>
					<th>{{ marca.detalle }}</th>
					<td>
						<a href="#tabEditaListVenta" class="mdl-tabs__tab" @click="llamaedit(marca)">
							<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
								EDITAR
							</button>
						</a>
					</td>
					<td id="BorrarMarca">
						<BorrarMarca :marcaid="marca.id" />
					</td>
				</tr>
			</tbody>

		</table>
	</div>

</template>


