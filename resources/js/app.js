import './bootstrap';



import { createApp } from 'vue';

import MarcaPageContent from './layouts/Marca/MarcaPageContent.vue'
import ProveedorPageContent from './layouts/Proveedor/ProveedorPageContent.vue'
import TipoPageContent from './layouts/Tipo/TipoPageContent.vue'
import ArticuloPageContent from './layouts/Articulo/ArticuloPageContent.vue'
import CompraPageContent from './layouts/Compra/CompraPageContent.vue'
import VentaPageContent from './layouts/Venta/VentaPageContent.vue'
import UsuarioPageContent from './layouts/Usuario/UsuarioPageContent.vue'
import PersonaPageContent from './layouts/Persona/PersonaPageContent.vue'
import AnalisisPageContent from './layouts/Analisis/AnalisisPageContent.vue'



//import PageContent from './layouts/Home/PageContent.vue'
import Home from './layouts/Home/Home.vue'
import HomeContent from './layouts/Home/HomeContent.vue'
import app from './layouts/app.vue'

import.meta.glob([
    '../assets/img/**',
    '../assets/icon/**',
    '../css/**',
    '../js/js_view/**'
  ]);


createApp(app).mount("#app")


createApp(Home).mount("#Home")
createApp(HomeContent).mount("#HomeContent")
createApp(MarcaPageContent).mount("#MarcaPageContent")
createApp(ProveedorPageContent).mount("#ProveedorPageContent")
createApp(TipoPageContent).mount("#TipoPageContent")
createApp(ArticuloPageContent).mount("#ArticuloPageContent")
createApp(CompraPageContent).mount("#CompraPageContent")
createApp(VentaPageContent).mount("#VentaPageContent")
createApp(UsuarioPageContent).mount("#UsuarioPageContent")
createApp(PersonaPageContent).mount("#PersonaPageContent")
createApp(AnalisisPageContent).mount("#AnalisisPageContent")


