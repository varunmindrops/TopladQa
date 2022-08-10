<script>
export default {
    name: 'Button',
    props: {
        type: {
            type: String,
            default: 'primary',
        },
        icon: {
            type: String,
            default: '',
        },
        size: {
            type: String,
            default: 'small',
        },
        toolTipLabel: {
            type: String,
            default: 'top',
        },
        toolTipOpen: {
            type: String,
            default: 'top',
        },
    },
}
</script>

<template lang="pug">
el-tooltip.item(effect='dark', :content='toolTipLabel', :placement='toolTipOpen')
    el-button(:type='type', plain, :size='size', :icon='icon', @click="$emit('click')")
        slot
</template>

<style lang="scss">
</style>
