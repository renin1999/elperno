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
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" @click="borrarcompras">
		Borrar
	</button>
</template>

<script>
export default {
	props: {
		comprasid: Number
	},
	methods: {
		borrarcompras() {
			fetch('http://127.0.0.1:8000/api/v1/compras/' + this.comprasid, {
				method: "DELETE"
			})
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta);
					window.location.href = '/compras'
				})
				.catch(console.log)
		}
	}
}
</script>
