<script>
export default {
    name: "DocumentUpload",
    data() {
        return {
            dialogImageUrl: "",
            dialogVisible: false,
            disabled: false,
            mode: 'add'
        };
    },
    methods: {
        handleRemove(file) {
            console.log(file);
        },
        handlePictureCardPreview(file) {
            this.dialogImageUrl = file.url;
            this.dialogVisible = true;
        },
        handleDownload(file) {
            console.log(file);
        },
    },
};
</script>

<template lang="pug">
div
    el-upload(action="#" list-type="picture-card" :auto-upload="false")
            i.el-icon-plus(slot="default")
            div(slot="file" slot-scope="{file}")
                img.el-upload-list__item-thumbnail(:src="file.url" alt="")
                span.el-upload-list__item-actions
                    span.el-upload-list__item-preview(@click="handlePictureCardPreview(file)")
                        i.el-icon-zoom-in
                    span.el-upload-list__item-delete(v-if="!disabled" @click="handleDownload(file)")
                        i.el-icon-download
                    span.el-upload-list__item-delete(v-if="!disabled" @click="handleRemove(file)")
                        i.el-icon-delete
    el-dialog(:visible.sync="dialogVisible")
        img(width="100%" :src="dialogImageUrl" alt="")
    span.text-muted.mb-5(v-if="mode === 'add'") Accepted file types are: jpg, jpeg, png, pdf.
</template>

<style lang="scss">
</style>