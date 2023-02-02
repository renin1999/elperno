<template>
    <div id="principal"><canvas id="myChart7"></canvas></div>

</template>


<script setup lang="ts">
import { onMounted } from '@vue/runtime-core';
import Chart from 'chart.js/auto';
var mes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
var totalventa = []
var countventa = []
var respuesta = []

const top5marcasventa = fetch('http://127.0.0.1:8000/api/v1/ventaxultimoano/')
    .then(respuesta => respuesta.json())
    .then((datosrespuesta) => {
        if (typeof datosrespuesta[0].success === 'undefined') {
            respuesta = datosrespuesta
            console.log(respuesta)
            let i = 0;
            respuesta.forEach((element) => {
                totalventa[i] = element.totalventa
                countventa[i] = element.countventa
                i++;
            });
        }
    })
    .catch(console.log);


const data = {
    labels: mes,
    datasets: [{
        label: 'Ganancia durante el último año',
        backgroundColor: 'blue',
        borderColor: 'rgb(255,99,132)',
        data: totalventa
    }]
}
const data2 = {
    labels: mes,
    datasets: [{
        label: 'Ganancia durante el último año',
        backgroundColor: 'blue',
        borderColor: 'rgb(255,99,132)',
        data: countventa
    }]
}

const config: import('chart.js').ChartConfiguration = {
    type: 'line',
    data: data,
    options: {}
}

onMounted(() => {
    const canvasTag = <ChartItem>document.getElementById('myChart7');
    new Chart(canvasTag, {
        data: {
            datasets: [{
                type: 'bar',
                label: 'Ganancias durante el último año',
                data: totalventa,
            }, {
                type: 'line',
                label: 'Ventas durante el último año',
                data: countventa,
            }],
            labels: mes
        },
        options: {}
    });
})


</script>