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
						<th>Código del Proveedor</th>
						<th>Nombre y Apellido</th>
						<th>Dirección</th>
						<th>Email</th>
						<th>Teléfono</th>
					</tr>
				</thead>
				<tbody v-for="proveedor in proveedores" :key="proveedor.id">
					<tr>
						<th>{{ proveedor.id }}</th>
						<th>{{ proveedor.codproveedor }}</th>
						<th>{{ proveedor.nombre_ape }}</th>
						<th>{{ proveedor.direccion }}</th>
						<th>{{ proveedor.email }}</th>
						<th>{{ proveedor.telefono }}</th>
						<td>
							       <a href="#tabEditaListVenta" class="mdl-tabs__tab" @click="llamaedit(proveedor)">
										<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
											EDITAR</button>
									</a>
						</td>
						<td id="BorrarProveedor">
							<BorrarProveedor :proveedorid="proveedor.id" />
						</td>
					</tr>
				</tbody>

			</table>
		</div>
	
</template>

<script>
import BorrarProveedor from './BorrarProveedor.vue'
export default {
	components: {
		BorrarProveedor
	},
	data() {
		return {
			proveedores: [],
			proveedorid: Number
		}
	},
	created: function () {
		this.listarproveedor()
	},
	methods: {
		listarproveedor() {
			fetch('http://127.0.0.1:8000/api/v1/proveedor/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.proveedores = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.proveedores = datosrespuesta
					}
				})
				.catch(console.log)
		},
		llamaedit(proveedor) {
			console.log(proveedor);
			this.$parent.Edita(proveedor);
		},
		passedit(proveedoridd,proveedorcod,proveedornombre_ape,proveedordir,proveedoremail,proveedortele, proveedor) {
			console.log("pasa");
			proveedoridd=proveedor.id;
			proveedorcod=proveedor.codproveedor;
			proveedornombre_ape=proveedor.nombre_ape;
			proveedordir=proveedor.direccion;
			proveedoremail=proveedor.email;
			proveedortele=proveedor.telefono;
			this.$emit("Edita",proveedoridd,proveedorcod,proveedornombre_ape,proveedordir,proveedoremail,proveedortele, proveedor);
		}
	}
}
</script>
