<script>
import VueCkeditor from "vue-ckeditor2";
import { VueMathjax } from "vue-mathjax";

export default {
    name: "HtmlEditor",
    components: {
        VueCkeditor,
        VueMathjax
    },
    props: {
        value: {
            type: String,
            default: ''
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            math: ""
        };
    },
    created() {
        if(this.value) {
            this.replaceStrings()
        }
    },
    methods: {
        updatedData(value) {
            this.inputValue = value;
        },
        reRender() {
            console.log();
            if (window.MathJax) {
                console.log("rendering mathjax");
                window.MathJax.Hub.Queue(["Typeset", window.MathJax.Hub], () =>
                    console.log("done")
                );
            }
        },
        replaceStrings() {
            if (this.disabled) {
                // let data = this.value.replace(/\\\"/g, '\\\\"')
                let data = this.value.replace(
                    String.fromCharCode(92, 40),
                    String.fromCharCode(36, 36, 36)
                );
                data = data.replace(
                    String.fromCharCode(92, 41),
                    String.fromCharCode(36, 36, 36)
                );
                this.math = data;
                this.reRender();
            }
        }
    },
    computed: {
        inputValue: {
            get() {
                return this.value || null;
            },
            set(val) {
                if (val || val === "") this.$emit("input", val);
                // this.value = val;
            }
        },
        config() {
            const data = {
                height: 300,
                extraPlugins: "mathjax",
                mathJaxLib:
                    "//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML",
                removeButtons: '',
                filebrowserUploadUrl: process.env.MIX_APP_URL + '/api/upload-ck-image',
                filebrowserUploadMethod: 'form'
            };
            if (this.disabled) {
                data.toolbar = [];
                data.allowedContent =
                    "span p h1 h2 strong em; a[!href]; img[!src,width,height];";
            }
            return data;
        }
    },
    watch: {
        $attrs({ value }) {
            this.updatedData(value);
        },
        value(val) {
            if (!val) return;
            this.replaceStrings();
        }
    }
};
</script>

<template lang="pug">
div
    vue-ckeditor.ck-mlg-editor.hidden-border(
        v-if="!disabled"
        v-model="inputValue",
        :config="config",
        :readOnlyMode="disabled", 
        types="inline"
    )
    vue-mathjax(
        v-else
        :safe="false"
        :formula="math"
    )
</template>
