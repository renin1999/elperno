<template>
    <div id="principal"><canvas id="mychart12"></canvas></div>
</template>

<script setup lang="ts">
import { onMounted } from '@vue/runtime-core';
import Chart from 'chart.js/auto';


var labels2 = []
var datos = []
var respuesta = []
const top5marcasventa = fetch('http://127.0.0.1:8000/api/v1/productosmayoralpromedioventas/')
    .then(respuesta => respuesta.json())
    .then((datosrespuesta) => {
        if (typeof datosrespuesta[0].success === 'undefined') {
            respuesta = datosrespuesta
            let i = 0;
            respuesta.forEach((element) => {
                labels2[i] = element.detalle
                datos[i] = element.totalventa
                i++;
            });
            console.log(datos)
        }
    })
    .catch(console.log);


const data = {
    labels: labels2,
    datasets: [{
        label: 'Ganancia en Ventas',
        data: datos,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
        ],
        borderColor: 'rgb(255,99,132)'

    },]
}
const config: import('chart.js').ChartConfiguration = {
    type: 'doughnut',
    data: data,
    options: {}
}

onMounted(() => {
    const canvasTag = <ChartItem>document.getElementById('mychart12');
    new Chart(canvasTag, config);
})
</script>