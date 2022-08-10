<script>
import { mapGetters } from "vuex";

export default {
    name: 'Spinner',
    props: {
        show: {
            type: Boolean,
            default: () => false,
        },
    },
    computed: {
        ...mapGetters("common", ["getLoader"]),
    },
}
</script>

<template lang="pug"> 
div(v-if="getLoader")
    .spinner-overlay
    .sk-cube-grid
        .sk-cube.sk-cube1
        .sk-cube.sk-cube2
        .sk-cube.sk-cube3
        .sk-cube.sk-cube4
        .sk-cube.sk-cube5
        .sk-cube.sk-cube6
        .sk-cube.sk-cube7
        .sk-cube.sk-cube8
        .sk-cube.sk-cube9
</template>

<style lang="scss">
</style>
