<script>
export default {
    name: 'Status',
    props: {
        value: {
            type: Number,
            default: 0,
        },
        trueText: {
            type: String,
            default: 'Active',
        },
        falseText: {
            type: String,
            default: 'Inactive',
        },
        trueType: {
            type: String,
            default: 'primary',
        },
        falseType: {
            type: String,
            default: 'danger',
        },
    },
}
</script>

<template lang="pug">
el-button(v-if="value",size='small', round, :type='trueType', plain) {{trueText}}
el-button(v-else, size='small', :type='falseType', round, plain) {{falseText}}
</template>

<style lang="scss">
</style>
