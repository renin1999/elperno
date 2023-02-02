<template>
    <div id="principal"><canvas id="myChart8"></canvas></div>

</template>


<script setup lang="ts">
import { onMounted } from '@vue/runtime-core';
import Chart from 'chart.js/auto';
var dia = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
var diares= []
var totalventa = []
var countventa = []
var respuesta = []

const top5marcasventa = fetch('http://127.0.0.1:8000/api/v1/ventaactualmes/')
    .then(respuesta => respuesta.json())
    .then((datosrespuesta) => {
        if (typeof datosrespuesta[0].success === 'undefined') {
            respuesta = datosrespuesta
            let i = 0;
            respuesta.forEach((element) => {
                diares[i] = element.dia
                totalventa[i] = element.totalventa
                countventa[i] = element.countventa
                i++;
            });
            console.log(respuesta);
        }
    })
    .catch(console.log);


onMounted(() => {
    const canvasTag = <ChartItem>document.getElementById('myChart8');
    new Chart(canvasTag, {
        data: {
            datasets: [{
                type: 'bar',
                label: 'Ganancia durante el dia',
                data: totalventa,
            }, {
                type: 'line',
                label: 'Vendidos durante el dia',
                data: countventa,
            }],
            labels: diares
        },
        options: {}
    });
})
</script>