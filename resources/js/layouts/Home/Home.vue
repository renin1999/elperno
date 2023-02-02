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
	<div class="full-width navLateral-bg btn-menu"></div>
	<div class="full-width navLateral-body">
		<div class="full-width navLateral-body-logo text-center tittles">
			<i class="zmdi zmdi-close btn-menu"></i> Analisis de ventas

		</div>
		<figure class="full-width" style="height: 77px;">
			<div class="navLateral-body-cl">
				<img src="../../../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
			</div>
			<figcaption class="navLateral-body-cr hide-on-tablet">
				<span>
					{{ rol + " " + usern }} <br>

				</span>
			</figcaption>
		</figure>
		<div class="full-width tittles navLateral-body-tittle-menu">
			<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; MENÚ</span>
		</div>
		<nav class="full-width">
			<ul class="full-width list-unstyle menu-principal">
				<li class="full-width">
					<a href="home" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-view-dashboard"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							INICIO
						</div>
					</a>
				</li>

				<li class="full-width divider-menu-h" ></li>
				<li class="full-width" v-if="bool">
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-face"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							USUARIOS
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="datosgerente" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-accounts"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									GERENTES
								</div>
							</a>
							<a href="gerente" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-accounts"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									CUENTAS DE USUARIO
								</div>
							</a>
						</li>
					</ul>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="user" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-accounts"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									CUENTAS DE GERENTES
								</div>
							</a>
						</li>
					</ul>
				</li>


				<li class="full-width divider-menu-h"></li>
				<li class="full-width">
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-case"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							INVENTARIO
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="articulos" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-washing-machine"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									ARTÍCULOS
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="tipo" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-label"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									TIPO
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="marca" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-label"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									MARCA
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="proveedor" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-accounts"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									PROVEEDORES
								</div>
							</a>
						</li>
					</ul>
				</li>



				<li class="full-width divider-menu-h"></li>
				<li class="full-width">
					<a href="compra" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-widgets"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							COMPRAS
						</div>
					</a>
				</li>

				<li class="full-width divider-menu-h"></li>
				<li class="full-width">
					<a href="venta" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-widgets"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							VENTAS
						</div>
					</a>
				</li>

				<li class="full-width divider-menu-h"></li>
				<li class="full-width">
					<a href="analisis" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-store"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							ANÁLISIS
						</div>
					</a>
				</li>
				<!-- logo con derechos reservados-->

				<div>
						<div class="navLateral-body-cl">
							<img src="../../../../public/fotos/logo.png" class="img-responsive">
						</div>
						<figcaption class="navLateral-body-cr hide-on-tablet">
							<span>
								<li class="text-condensedLight noLink"><small> Derechos reservados 2022-2023</small>
								</li>
							</span>
						</figcaption>
					</div>
			</ul>
		</nav>
	</div>

	<br>
	<br>
	<br>
	<br>	
</template>

<script>


export default {
	props: {},
	data() {
		return {
			usern: String,
			rol: String,
			bool: false
		}
	},
	mounted() {
		// Do something useful with the data in the template
		this.usern = window.auth_user.usern;
		this.isUser();
		console.log(this.usern);
	},
	methods: {
		isUser() {
			if (window.auth_user.rol == 1) {
				this.rol = "Administrador"
				this.bool = true;

			}
			else {
				this.rol = "Gerente"
				this.bool = false;
			}

		}
	}
}
</script>