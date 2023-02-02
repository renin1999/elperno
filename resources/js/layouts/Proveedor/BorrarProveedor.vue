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
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" @click="borrarproveedor">
		Borrar
	</button>
</template>

<script>
export default {
	props: {
		proveedorid: Number
	},
	methods: {
		borrarcompras() {
			fetch('http://127.0.0.1:8000/api/v1/proveedor/' + this.proveedorid, {
				method: "DELETE"
			})
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta);
					window.location.href = '/proveedor'
				})
				.catch(console.log)
		}
	}
}
</script>
