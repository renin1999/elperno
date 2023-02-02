<template>
  <div id="principal" style="margin-left: 100px ;height: 400px; width:900px;"><canvas id="myChart4"></canvas></div>
</template>

<script setup lang="ts">
import { onMounted } from '@vue/runtime-core';
import Chart from 'chart.js/auto';

var labels2 = []
var datos = []
var respuesta = []
const top5marcasventa = fetch('http://127.0.0.1:8000/api/v1/top5tiposproductosvendidos/')
  .then(respuesta => respuesta.json())
  .then((datosrespuesta) => {
    if (typeof datosrespuesta[0].success === 'undefined') {
      respuesta = datosrespuesta
      console.log(respuesta)
      let i = 0;
      respuesta.forEach((element) => {
        labels2[i] = element.detalle
        datos[i] = element.total_ventas
        i++;
      });
      console.log(datos)
    }
  })
  .catch(console.log);


const data = {
  labels: labels2,
  datasets: [{
    label: 'Ganancia en Ventas por Marca',
    backgroundColor: 'blue',
    borderColor: 'rgb(255,99,132)',
    data: datos
  }]
}
const config: import('chart.js').ChartConfiguration = {
  type: 'bar',
  data: data,
  options: {}
}

onMounted(() => {
  const canvasTag = <ChartItem>document.getElementById('myChart4');
  new Chart(canvasTag, config);
})


</script>