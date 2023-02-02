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
					<th>Cédula</th>
					<th>Nombre y Apellido</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Teléfono</th>
				</tr>
			</thead>
			<tbody v-for="persona in personas" :key="persona.id">
				<tr>
					<th>{{ persona.id }}</th>
					<th>{{ persona.cedula }}</th>
					<th>{{ persona.nombre +"  "+ persona.apellido }}</th>
                    <th>{{ persona.edad }}</th>
                    <th>{{ persona.sexo }}</th>
                    <th>{{ persona.email }}</th>
                    <th>{{ persona.telefono }}</th>
					<td>
						<a href="#tabEditaListVenta" class="mdl-tabs__tab" @click="llamaedit(persona)">
							<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
								EDITAR
							</button>
						</a>
					</td>
					<td id="BorrarPersona" v-if="persona.id!=1">
						<BorrarPersona :personaid="persona.id" />
					</td>
				</tr>
			</tbody>

		</table>
	</div>

</template>

<script>
import BorrarPersona from './BorrarPersona.vue'
export default {
	components: {
		BorrarPersona
	},
	data() {
		return {
			personas: [],
			personaid: Number
		}
	},
	created: function () {
		this.listarpersona()
	},
	methods: {
		listarpersona() {
			fetch('http://127.0.0.1:8000/api/v1/persona/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.personas = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.personas = datosrespuesta
					}
				})
				.catch(console.log)
		},
		llamaedit(persona) {
			console.log(persona);
			this.$parent.Edita(persona);
		},
		passedit(personac, persona) {
			console.log("pasa");
			personac = persona;
			this.$emit("Edita", personac, persona);
		}
	}
}
</script>
