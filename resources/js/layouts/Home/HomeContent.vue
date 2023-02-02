<template>

			<h3 class="text-center tittles">VISTA GENERAL</h3>
			<!-- Tiles -->
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						{{ proveedores.length }}<br>
						<small>Proveedores</small>
					</span>
				</div>
				<i class="zmdi zmdi-account tile-icon"></i>
			</article>

			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						{{ articulos.length }}<br>
						<small>Artículos</small>
					</span>
				</div>
				<i class="zmdi zmdi-washing-machine tile-icon"></i>
			</article>

			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						{{ marcas.length }}<br>
						<small>Marcas</small>
					</span>
				</div>
				<i class="zmdi zmdi-label tile-icon"></i>
			</article>

			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						{{ users.length }}<br>
						<small>Usuarios</small>
					</span>
				</div>
				<i class="zmdi zmdi-folder-person tile-icon"></i>
			</article>

			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						{{ ventas.length }}<br>
						<small>Ventas</small>
					</span>
				</div>
				<i class="zmdi zmdi-shopping-cart tile-icon"></i>
			</article>

			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						{{ compras.length }}<br>
						<small>Compras</small>
					</span>
				</div>
				<i class="zmdi zmdi-case tile-icon"></i>

			</article>

</template>

<script>
export default {
	data() {
		return {
			proveedores: [],
			articulos: [],
			marcas: [],
			users: [],
			ventas: [],
			compras: []
		}
	},
	created: function () {
		this.listarproveedor(),
		this.listararticulos(),
		this.listarcompras(),
		this.listarventa(),
		this.listarmarca(),
		this.listaruser()
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
				.catch(console.log);
		},
		listararticulos() {
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
		listarcompras() {
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
		listaruser() {
			fetch('http://127.0.0.1:8000/api/v1/users/')
				.then(respuesta => respuesta.json())
				.then((datosrespuesta) => {
					console.log(datosrespuesta)
					this.users = []
					if (typeof datosrespuesta[0].success === 'undefined') {
						this.users = datosrespuesta
					}
				})
				.catch(console.log)
		}
	}
}
</script>
