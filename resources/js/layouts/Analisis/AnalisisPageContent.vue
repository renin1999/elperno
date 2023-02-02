<template>

    <section class="full-width text-center" style="padding: 40px 0;">
        <h3 class="text-center tittles" style="font-weight: bold; font-size:150% ">ANÁLISIS DE VENTAS</h3>


        <div class="row" style="width: 90%; margin-left: auto; margin-right: auto;">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Monto total de ventas realizadas: </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{ tv }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="zmdi zmdi-money zmdi-hc-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Monto total de compras realizadas:</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{ tc }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="zmdi zmdi-money-off zmdi-hc-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Articulos
                                    Totales disponibles en Stock
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ tst }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="zmdi zmdi-shopping-cart zmdi-hc-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Cantidad de artículos vendidos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ tcant }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <div class="row"></div>
    <hr width="100%" color="black">
    <div class="row" id="lista_bloq_1">
        <div class="full-width panel-tittle bg-primary text-center tittles">
            BALANCES
        </div>
        <br><br> <br>
        <div style="width:90%; text-align:center; margin-left:5%; justify-content: center ">
            <div class="card shadow ">
                <div class="card-header py-3">
                    <h6 class="float-left">BALANCE DE TRANSACCIONES: </h6>
                    <h6 class="float-right"> ${{ balance_() }}</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold float-left"> Monto de Ventas: ${{
                        this.tv
                    }} </h4>
                    <h4 class="small font-weight-bold float-right"> Porcentaje de Ventas {{
                        balancev_()
                    }}% </h4>
                    <br>
                    <div class="progress mb-4">
                        <div id="bventas" ref="bventas" class="progress-bar bg-danger"
                            :style="{ width: this.balancev + '%' }" role="progressbar" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold float-left"> Monto de Compras: ${{
                        this.tc
                    }} </h4>
                    <h4 class="small font-weight-bold float-right"> Porcentaje de Compras {{
                        balancec_()
                    }}% </h4>
                    <br>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" :style="{ width: this.balancec + '%' }"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="card-header py-3">
                    <h6 class="float-left">BALANCE DE ARTÍCULOS: </h6>
                    <h6 class="float-right"> {{ balancearti_() }}</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold float-left"> Cantidad de artículos en stock: {{
                        this.tst
                    }} unidades </h4>
                    <h4 class="small font-weight-bold float-right"> Porcentaje de artículos en stock {{
                        balanceartist_()
                    }}% </h4>
                    <br>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar"
                            :style="{ width: this.balanceartist + '%' }" aria-valuenow="40" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold float-left"> Cantidad de artículos vendidos: {{
                        this.tcant
                    }} unidades </h4>
                    <h4 class="small font-weight-bold float-right"> Porcentaje de artículos vendidos {{
                        balanceartiventa_()
                    }}% </h4>
                    <br>
                    <div class="progress mb-4">
                        <div id="bventas" ref="bventas" class="progress-bar bg-danger"
                            :style="{ width: this.balanceartiventa + '%' }" role="progressbar" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold float-left"> Cantidad de artículos comprados: {{
                        this.tcantcomp
                    }} unidades </h4>
                    <h4 class="small font-weight-bold float-right"> Porcentaje de artículos comprados {{
                        balancearticompra_()
                    }}% </h4>
                    <br>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar"
                            :style="{ width: this.balancearticompra + '%' }" aria-valuenow="40" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row" id="lista_bloq_4">
        <div id="p" class="full-width panel-tittle bg-primary text-center tittles">
            Ventas realizadas durante el último año
        </div>
        <div id="principal_4" style=" margin-left:5%; width:80%;">
            <Analisis7></Analisis7>
        </div>
    </div>
    <div class="row" id="lista_bloq_4">
        <div id="p" class="full-width panel-tittle bg-primary text-center tittles">
            Ventas realizadas durante el último mes
        </div>
        <div id="principal_4" style=" margin-left:5%; width:80%;">
            <Analisis8></Analisis8>
        </div>
    </div>

    <div class="row" id="lista_bloq_2"></div>
    <hr width="100%" color="black">
    <div class="row" id="lista_bloq_2">
        <hr width="100%" color="black">
        <div style="width:95%; margin-left:1%;">
            <div id="contenido" style="height:50%; width:48%; float: left">
                <div id="d" class="full-width panel-tittle bg-primary text-center tittles">
                    Total de venta de todos los artículos por tipo de articulos
                </div>
                <div id="principal_1">
                    <Analisis9></Analisis9>
                </div>
            </div>

            <div id="contenido" style="height:50%; width:49%; float:left; margin-left:2%; ">
                <div id="a" class="full-width panel-tittle bg-primary text-center tittles">
                    Ventas alcanzadas por cada marca
                </div>
                <div id="principal_2">
                    <Analisis2></Analisis2>
                </div>
            </div>
        </div>
    </div>




    <div class="row" id="lista_bloq_2"></div>
    <hr width="100%" color="black">
    <div class="row" id="lista_bloq_2">
        <hr width="100%" color="black">
        <div style="width:95%; margin-left:1%;">
            <div id="contenido" style="height:50%; width:48%; float: left">
                <div id="d" class="full-width panel-tittle bg-primary text-center tittles">
                    TOP 5 articulos mas vendidos por cantidad
                </div>
                <div id="principal_6" style="height:50%; width:48%; margin-left:30%">
                    <Analisis6></Analisis6>
                </div>
            </div>

            <div id="contenido" style="height:50%; width:49%; float:left; margin-left:2%; ">
                <div id="a" class="full-width panel-tittle bg-primary text-center tittles">
                    Artículos que no se han vendido
                </div>
                <div id="principal_5">
                    <div id="45" style="text-align:center;">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-gray-800 mb-1"
                                            v-for="items of articulosnovendidos" :key="items.detalle">
                                            {{ items.detalle }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="lista_">
        <hr width="100%" color="black">
        <div style="width:95%; margin-left:1%;">
            <div id="contenido_1" style="height:50%; width:48%; float: left">
                <div id="d_1" class="full-width panel-tittle bg-primary text-center tittles">
                    Artículos con mayor precio de venta
                </div>
                <div id="principal_7">
                    <Analisis11></Analisis11>
                </div>
            </div>
            <div id="contenido_2" style="height:50%; width:49%; float:left; margin-left:2%; ">
                <div id="a_1" class="full-width panel-tittle bg-primary text-center tittles">
                    Artículos con menor precio de venta
                </div>
                <div id="principal_8">
                    <Analisis10></Analisis10>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="lista_">
        <hr width="100%" color="black">
        <div style="width:95%; margin-left:1%;">
            <div id="contenido_1" style="height:50%; width:48%; float: left">
                <div id="d_1" class="full-width panel-tittle bg-primary text-center tittles">
                    Artículos cuya venta cumplen o superan el promedio de ventas
                </div>
                <div id="principal_7" style="height:50%; width:48%; margin-left:30%">
                    <Analisis12></Analisis12>
                </div>
            </div>
            <div id="contenido_2" style="height:50%; width:49%; float:left; margin-left:2%; ">
                <div id="a_1" class="full-width panel-tittle bg-primary text-center tittles">
                    Artículos cuya venta no cumplen o superan el promedio de ventas
                </div>
                <div id="principal_8" style="height:50%; width:48%; margin-left:30%">
                    <Analisis13></Analisis13>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="lista_finla">
        <hr width="100%" color="black">
        <div style="width:95%; margin-left:1%;">

            <div style="height:50%; width:31%; float: left; margin-left:3%;">

                <div id="a" class="full-width panel-tittle bg-primary text-center tittles">
                    Artículos que reportan menor o igual a dos ventas
                </div>
                <div id="principal__12">
                    <div id="45">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-gray-800 mb-1"
                                            v-for="items2 of articulosmenorigual" :key="items2.detalle">
                                            {{ items2.detalle}}    ....................{{items2.count}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div style="height:50%; width:31%; float: left; margin-left:1%;">

                <div id="a" class="full-width panel-tittle bg-primary text-center tittles">
                    Cantidad de artículos que existen por marca
                </div>
                <div id="principal__12">
                    <div id="45">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-gray-800 mb-1"
                                            v-for="items3 of cantidadexistenxmarca" :key="items3.detalle">
                                            {{ items3.detalle}}    ....................{{items3.count}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div style="height:50%; width:31%; float: left; margin-left:1%;">

                <div id="a" class="full-width panel-tittle bg-primary text-center tittles">
                    10 últimos artículos vendidos
                </div>
                <div id="principal__12">
                    <div id="45">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-gray-800 mb-1"
                                            v-for="items4 of t10ultimos" :key="items4.detalle">
                                            {{ items4.detalle}}--({{ items4.date }})
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>



    <div class="row" id="lista_finla">
        <hr width="100%" color="black">
        <div style="width:95%; margin-left:1%;">
            </div>
            </div>



</template>
<script>
import Analisis from './Analisis.vue';
import Analisis2 from './Analisis2.vue';
import Analisis3 from './Analisis3.vue';
import Analisis4 from './Analisis4.vue';
import Analisis5 from './Analisis5.vue';
import Analisis6 from './Analisis6.vue';
import Analisis7 from './Analisis7.vue';
import Analisis8 from './Analisis8.vue';
import Analisis9 from './Analisis9.vue';
import Analisis10 from './Analisis10.vue';
import Analisis11 from './Analisis11.vue';
import Analisis12 from './Analisis12.vue';
import Analisis13 from './Analisis13.vue'
export default {
    components: {
        Analisis, Analisis2, Analisis3, Analisis4, Analisis5, Analisis6, Analisis7, Analisis8, Analisis9,
        Analisis10, Analisis11, Analisis12, Analisis13
    },
    data() {
        return {
            totalventas: {},
            tv: Number,
            totalcompras: {},
            tc: Number,
            totalstock: {},
            tst: Number,
            totalcantidad: {},
            tcant: Number,
            totalcantidadcomprado: {},
            articulosnovendidos: {},
            articulosmenorigual: {},
            cantidadexistenxmarca: {},
            t10ultimos: {},
            tcantcomp: Number,
            balance: Number,
            balancec: Number,
            balancev: Number,
            balancearti: Number,
            balancearticompra: Number,
            balanceartiventa: Number,
            balanceartist: Number

        }
    },
    created: function () {
        this.totalventas_(),
            this.totalcompras_(),
            this.totalcantidad_(),
            this.totalstock_(),
            this.totalcantidadcomprados_(),
            this.totalcantidad_(),
            this.articulosnovendidos_(),
            this.articulosmenorigual_(),
            this.cantidadexistenxmarca_(),
            this.t10ultimos_()
    },
    methods: {
        totalventas_() {
            fetch('http://127.0.0.1:8000/api/v1/totalventas/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.totalventas = datosrespuesta
                    }
                    var tv_ = this.totalventas[0];
                    this.tv = tv_.total_ventas;
                    this.tv = this.tv.toFixed(2);
                })
                .catch(console.log)
        },
        totalcompras_() {
            fetch('http://127.0.0.1:8000/api/v1/totalcompras/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.totalcompras = datosrespuesta
                    }
                    var tc_ = this.totalcompras[0];
                    this.tc = tc_.totalcompra;
                    this.tc = this.tc.toFixed(2);
                })
                .catch(console.log)
        },
        totalstock_() {
            fetch('http://127.0.0.1:8000/api/v1/sumastock/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.totalstock = datosrespuesta
                    }
                    var tst_ = this.totalstock[0];
                    this.tst = tst_.totalstock;
                })
                .catch(console.log)
        },
        totalcantidad_() {
            fetch('http://127.0.0.1:8000/api/v1/sumacantidad/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.totalcantidad = datosrespuesta
                    }
                    var tcant_ = this.totalcantidad[0];
                    this.tcant = tcant_.totalcantidad;
                })
                .catch(console.log)
        },
        totalcantidadcomprados_() {
            fetch('http://127.0.0.1:8000/api/v1/sumacantidadcomprados/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.totalcantidadcomprado = datosrespuesta
                    }
                    var tcantcomp_ = this.totalcantidadcomprado[0];
                    this.tcantcomp = tcantcomp_.totalcantidad;
                })
                .catch(console.log)
        },
        articulosnovendidos_() {
            fetch('http://127.0.0.1:8000/api/v1/articulosnovendidos/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.articulosnovendidos = datosrespuesta
                    }

                })
                .catch(console.log)
        },
        articulosmenorigual_() {
            fetch('http://127.0.0.1:8000/api/v1/articulosmenorigual/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.articulosmenorigual = datosrespuesta
                    }
                })
                .catch(console.log)
        },
        cantidadexistenxmarca_() {
            fetch('http://127.0.0.1:8000/api/v1/cantidadexistenxmarca/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.cantidadexistenxmarca = datosrespuesta
                    }
                })
                .catch(console.log)
        },
        t10ultimos_() {
            fetch('http://127.0.0.1:8000/api/v1/t10ultimos/')
                .then(respuesta => respuesta.json())
                .then((datosrespuesta) => {
                    console.log(datosrespuesta)
                    if (typeof datosrespuesta[0].success === 'undefined') {
                        this.t10ultimos = datosrespuesta
                    }
                })
                .catch(console.log)
        },
        balance_() {
            this.balance = parseFloat(this.tc) + parseFloat(this.tv);
            return this.balance.toFixed(2);
        },
        balancev_() {
            this.balancev = (parseFloat(this.tv) * 100) / this.balance;
            return this.balancev.toFixed(2);
        },
        balancec_() {
            this.balancec = (parseFloat(this.tc) * 100) / this.balance;
            return this.balancec.toFixed(2);
        },
        balancearti_() {
            this.balancearti = parseInt(this.tcantcomp) + parseInt(this.tcant) + parseInt(this.tst);
            return this.balancearti;
        },
        balancearticompra_() {
            this.balancearticompra = (parseInt(this.tcantcomp) * 100) / this.balancearti;
            return this.balancearticompra.toFixed(2);
        },
        balanceartiventa_() {
            this.balanceartiventa = (parseInt(this.tcant) * 100) / this.balancearti;
            return this.balanceartiventa.toFixed(2);;
        },
        balanceartist_() {
            this.balanceartist = (parseInt(this.tst) * 100) / this.balancearti;
            return this.balanceartist.toFixed(2);;
        }
    }
}
</script>
