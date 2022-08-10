<script>
import SlotMixin from '@mixins/slot'

export default {
    name: 'LinkInline',
    mixins: [SlotMixin],
    props: {
        route: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: false,
        },
        contextualStyle: {
            type: String,
            required: false,
        },
    },
}
</script>

<template lang="pug">
    router-link(
        :to="{ name: route }",
        :class="contextualStyle"
    )
        slot(v-if="hasSlot()")
        span.link(v-else) {{ label }}
</template>

<style lang="scss">
</style>
