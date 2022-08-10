<script>
// import SlotMixin from "@mixins/slot";
// import Spinner from "@components/spinner";

export default {
    name: "FormLayout",
    // mixins: [SlotMixin],
    components: {
        // Spinner
    },
    props: {
        title: {
            type: String,
            default: ''
        },
        label: {
            type: String,
            default: ''
        },
    }
};
</script>

<template lang="pug">
div
   div This is form layout
</template>

<style lang="scss">
/*@import "@assets/admin/scss/common.scss";*/

.login-page{
    /*background: url('../assets/admin/images/admin-bg1.jpg') no-repeat center top;*/
    background-size: cover;
    float: left;
    width:100%;
    height: 100%;
    position: absolute;
}
</style>
