<script>
import FormLabel from "./form-label";
import FormHelp from "./form-help";
import FormFieldInput from "./form-field-input";

export default {
    name: "FormField",
    components: {
        FormLabel,
        FormHelp,
        FormFieldInput,
    },
    // inject: ["$validator"],
    props: {
        inputType: {
            type: String,
            required: false,
            default: "text",
        },
        attribute: {
            type: String,
            required: false,
        },
        value: {},
        label: {
            type: String,
            required: false,
        },
        validation: {
            type: Object,
            required: false,
            default: () => ({}),
        },
        placeholder: {
            type: String,
            required: false,
        },
        showLabel: {
            type: Boolean,
            required: false,
            default: true,
        },
        help: {
            type: String,
            required: false,
        },
        contextualStyle: {
            type: String,
            required: false,
            default: "light",
        },
        items: {
            type: Array,
            required: false,
        },
        array: {
            type: Boolean,
            default: false,
        },
        required: {
            type: Boolean,
            required: false,
            default: false,
        },
        falseCheckboxText: {
            type: String,
            required: false,
        },
        trueCheckboxText: {
            type: String,
            required: false,
        },
        removeNullOption: {
            type: Boolean,
            required: false,
            default: () => false,
        },
        disabled: {
            type: Boolean,
            required: false,
            default: () => false,
        },
        buttonLabel: {
            type: String,
            required: false,
        },
        showErrors: {
            type: Boolean,
            required: false,
            default: () => true,
        },
        maxHeight: {
            type: Number,
            required: false,
            default: 300,
        },
        // search-select
        customLabel: {
            type: Function,
        },
        trackBy: {
            type: String,
            default: "",
            required: false,
        },
        radioButtonValue: {},
        clearable: {
            type: Boolean,
            required: false,
            default: true,
        },
        noOptionsText: {
            type: String,
            default: "No item found",
        },
        inputClass: {
            type: String,
            required: false,
            default: "form-control",
        },
        labelClass: {
            type: String,
            required: false,
            default: "",
        },
        openDirection: {
            type: String,
            required: false,
            default: "bottom", // top, bottom
        },
        showClearAll: {
            type: Boolean,
            default: false,
            required: false,
        },
        minLength: {
            type: Number,
            default: Infinity,
        },
        maxLength: {
            type: Number,
            default: Infinity,
        },
        useCustomLabel: {
            type: Boolean,
            default: true,
        },
         // select options
        labelKey: {
            type: String,
            default: "name",
        },
        valueKey: {
            type: String,
            default: "value",
        },
        //date time picker
        valueFormat: {
            type: String,
            default: "yyyy-MM-dd hh:mm A",
        },
        collapseTags: {
            type: Boolean,
            default: true,
        }
    },
    computed: {
        inputValue: {
            get() {
                return this.value;
            },
            set() {},
        },
    },
};
</script>

<template lang="pug">
    .form-group.el-input(:class="contextualStyle")
        slot(name="input")
            //- Label (off by default)
            form-label(
                :labelClass="labelClass",
                :name="attribute",
                :showLabel="showLabel",
                :label="attribute",
                :attribute="attribute",
                :required="required",
            )
            sup.tx-danger(v-if="required") *
            form-help(v-if="help",:help="help")
            br(v-if="['date','time','date-time'].includes(inputType)")
            form-field-input(
                v-model="inputValue",
                :inputClass="inputClass",
                :inputType="inputType",
                :attribute="attribute",
                :value="value",
                :label="label",
                :validation="validation",
                :placeholder="placeholder",
                :showLabel="showLabel",
                :contextualStyle="contextualStyle",
                :items="items",
                :array="array",
                :required="required",
                :falseCheckboxText="falseCheckboxText",
                :trueCheckboxText="trueCheckboxText",
                :removeNullOption="removeNullOption",
                :disabled="disabled",
                :buttonLabel="buttonLabel",
                :showErrors="showErrors",
                :maxHeight="maxHeight",
                :clearable='clearable',
                :customLabel="customLabel",
                :trackBy="trackBy",
                :radioButtonValue="radioButtonValue",
                :noOptionsText="noOptionsText",
                :openDirection="openDirection",
                :showClearAll="showClearAll",
                :maxLength="maxLength",
                :labelKey="labelKey",
                :valueKey="valueKey",
                :valueFormat="valueFormat",
                :collapseTags="collapseTags",
                @input="$emit('input', $event)",
                @clearAll="$emit('clearAll')"
            )
                slot


</template>

<style lang="scss">
.error-block {
    color: red;
    margin: 1em 0;
}

label {
    font-weight: bold;
}
</style>
