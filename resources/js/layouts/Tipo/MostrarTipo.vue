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
					<th>Código del Tipo</th>
					<th>Detalle</th>
				</tr>
			</thead>
			<tbody v-for="tipo in tipos" :key="tipo.id">
				<tr>
					<th>{{ tipo.id }}</th>
					<th>{{ tipo.codtipo }}</th>
					<th>{{ tipo.detalle }}</th>
					<td>
						<a href="#tabEditaListVenta" class="mdl-tabs__tab" @click="llamaedit(tipo)">
							<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
								EDITAR
							</button>
						</a>
					</td>
					<td id="BorrarTipo">
						<BorrarTipo :tipoid="tipo.id" />
					</td>
				</tr>
			</tbody>

		</table>
	</div>

</template>

<script>
import BorrarTipo from './BorrarTipo.vue'
export default {
	components: {
		BorrarTipo
	},
	data() {
		return {
			tipos: [],
			tipoid: Number
		}
	},
	created: function () {
		this.listartipo()
	},
	methods: {
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
		llamaedit(tipo) {
			console.log(tipo);
			this.$parent.Edita(tipo);
		},
		passedit(tipoidd, tipocod, tipodescrip, tipo) {
			console.log("pasa");
			tipoidd = tipo.id;
			tipocod = tipo.codtipo;
			tipodescrip = tipo.detalle;
			this.$emit("Edita", tipoidd, tipocod, tipodescrip, tipo);
		}
	}
}
</script>
