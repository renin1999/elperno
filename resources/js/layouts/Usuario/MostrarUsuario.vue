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
					<th>CI</th>
					<th>Usuario</th>
				</tr>
			</thead>
			<tbody v-for="user in users" :key="user.id">
				<tr>
					<th>{{ showced(user.id_persona) }}</th>
					<th>{{ user.username }}</th>
					<td >
						<a href="#tabEditaListVenta" class="mdl-tabs__tab" @click="llamaedit(user,showced(user.id_persona))">
							<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
								EDITAR
							</button>
						</a>
					</td>
					<td id="BorrarUsuario" v-if="user.id!=1">
						<BorrarUsuario :userid="user.id" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
import BorrarUsuario from './BorrarUsuario.vue'
import * as under from '../../js_views/underscore-esm'
export default {
	components: {
		BorrarUsuario
	},
	data() {
		return {
			users: [],
			personas: [],
			selectarr:[],
			ced: String,
			userid: Number
		}
	},
	created: function () {
		this.listaruser(),
		this.listarpersona()
	},
	methods: {
		listaruser() {
			fetch('http://127.0.0.1:8000/api/v1/users/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					//console.log(datosrespuesta)
					this.users = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.users = datosrespuesta
					}
				})
				.catch(console.log)
		},
		listarpersona() {
			fetch('http://127.0.0.1:8000/api/v1/persona/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					//console.log(datosrespuesta)
					this.personas = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.personas = datosrespuesta
					}
				})
				.catch(console.log)
		},
		showced(idper){
      		this.selectarr = under.findWhere(this.personas, {id: idper});
			var ced = this.selectarr.cedula;
			return ced;
		},
		llamaedit(user,ced) {
			this.$parent.Edita(user,ced);
		},
		passedit(userc,user,ced) {

			userc=user;

			console.log("pasa");

			this.$emit("Edita", userc,user,ced);//no pasa tipo,arti,marca
		}
	}
}
</script>
