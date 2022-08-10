<script>
export default {
    name: 'Tag',
    props: {
        items: {
            type: Array,
            default: () => [],
        },
    },
}
</script>

<template lang="pug">
div
    span.mr-2.mb-2.bbq-tag(v-if="items && items.length", v-for="name of items") {{ name }}
    span.mr-2.mb-2(v-if="items && !items.length") -
</template>

<style lang="scss">
</style>
