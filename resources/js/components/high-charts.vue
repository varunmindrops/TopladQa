<script>
import { Chart } from 'highcharts-vue'

export default {
    name: 'HighCharts',
    components: {
        Chart,
    },
    props: {
        chartOptions: {
            type: Object,
            default: () => {}
        },
    },
    data() {
        return {
            updateArgs: [true, true, {duration: 1000}],
        }
    }
};
</script>

<template lang="pug">
chart.chart(:options="chartOptions", :updateArgs="updateArgs") 
</template>
