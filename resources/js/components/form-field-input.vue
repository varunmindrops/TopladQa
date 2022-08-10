<script>
import FormLabel from "./form-label";
import countries from "@utils/country.json";
import { humanize } from "underscore.string";

export default {
    name: "FormFieldInput",
    components: {
        FormLabel,
    },
    inject: ["$validator"],
    props: {
        inputType: {
            type: String,
            default: "text",
        },
        inputClass: {
            type: String,
            default: "form-control",
        },
        attribute: {
            type: String,
        },
        value: {},
        label: {
            type: String,
            required: false,
        },
        pickerOptions: {},
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
            default: true,
        },
        contextualStyle: {
            type: String,
            default: "light",
        },
        items: {
            type: Array,
            default: () => [],
        },
        array: {
            type: Boolean,
            default: false,
        },
        required: {
            type: Boolean,
            default: false,
        },
        clearable: {
            type: Boolean,
            default: true,
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
            default: () => false,
        },
        disabled: {
            type: Boolean,
            default: () => false,
        },
        buttonLabel: {
            type: String,
        },
        maxHeight: {
            type: Number,
            default: 300,
        },
        showErrors: {
            type: Boolean,
            default: true,
        },
        radioButtonValue: {},
        minLength: {
            type: Number,
            default: Infinity,
        },
        maxLength: {
            type: Number,
            default: Infinity,
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
        // search-select
        customLabel: {
            type: Function,
        },
        trackBy: {
            type: String,
            default: "",
        },
        noOptionsText: {
            type: String,
            default: "No item found",
        },
        openDirection: {
            type: String,
            default: "bottom", // top, bottom
        },
        showClearAll: {
            type: Boolean,
            default: false,
        },
        useCustomLabel: {
            type: Boolean,
            default: true,
        },
        // date time filter
        valueFormat: {
            type: String,
            default: "yyyy-MM-dd hh:mm A",
        },
        collapseTags: {
            type: Boolean,
            default: true,
        }
    },
    data() {
        return {
            // If no label is set, just humanize the attribute name for convenience
            labelText: this.label || null, // humanize(this.attribute),
            placeholderText: this.placeholder || this.label || humanize(this.attribute),
            inputValueText: "",
            countries,
            passwordType: "password",
        };
    },
    computed: {
        inputValue: {
            get() {
                return this.value || null;
            },
            set() {
            },
        },
        hasError() {
            if (this.errors && this.errors.items.length && this.showErrors) {
                const index = this.$lodash.findIndex(this.errors.items, {
                    field: this.attribute,
                });
                if (index !== -1 && !this.inputValue) return true;
            }
            return false;
        },
    },
    mounted() {
        // Watch for the changes to the childs error bag and pass back to the parent
        this.$watch(
            () => (this.errors ? this.errors.items : []),
            errors => {
                // console.log("errors", errors);
                // Emit the errors for this attribute
                // this.$emit("errors", {
                //     [this.attribute]: errors,
                // });
                // const errList = errors.filter(err => err.field === this.attribute);

                this.$emit("errors", {
                    [this.attribute]: errors,
                });
            },
        );
        if (this.required) {
            this.validation.required = true;
        }

        if (this.inputType === "email") {
            this.validation.email = true;
        }

        // if (this.inputType === "number") {
        //     this.validation.numeric = true;
        // }

        if (this.inputType === "url") {
            this.validation.url = true;
        }
    },
    methods: {
        humanize(value) {
            return humanize(value);
        },
        passwordToggle() {
            this.passwordType = this.passwordType === "password" ? "text" : "password";
        },
        customLabelMethod(option) {
            if (!this.useCustomLabel) return option[this.label];
            if (!this.customLabel) return `${humanize(option[this.label])}`;
            return this.customLabel(option);
        },
    },
};
</script>

<template lang="pug">
span.el-input
    //---------------------------------- Input fields ----------------------------------------
    input(
        v-if="['text','email','number'].includes(inputType)",
        :class="{'error-bg': hasError, 'cursor-disable' : disabled, [inputClass] : true }",
        :name="attribute",
        v-model="inputValue",
        :type="inputType",
        :placeholder="placeholderText",
        v-validate="validation",
        :data-vv-as="labelText",
        :disabled="disabled",
        :required="required",
        :maxLength="maxLength",
        :minLength="minLength",
        @input="$emit('input', $event.target.value)",
    )

    input(
        v-if="inputType === 'text-number'",
        :class="{'error-bg': hasError, 'cursor-disable' : disabled, [inputClass] : true }",
        :name="attribute",
        v-model="inputValue",
        type="text",
        :placeholder="placeholderText",
        v-validate="validation",
        :data-vv-as="labelText",
        :disabled="disabled",
        :required="required",
        :maxLength="maxLength",
        :minLength="minLength",
        onkeypress='return event.charCode >= 48 && event.charCode <= 57',
        @input="$emit('input', $event.target.value)",
    )

    input(
        v-if="inputType === 'text-float'",
        :class="{'error-bg': hasError, 'cursor-disable' : disabled, [inputClass] : true }",
        :name="attribute",
        v-model="inputValue",
        type="text",
        :placeholder="placeholderText",
        v-validate="validation",
        :data-vv-as="labelText",
        :disabled="disabled",
        :required="required",
        :maxLength="maxLength",
        :minLength="minLength",
        onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46',
        @input="$emit('input', $event.target.value)",
    )

    input(
        v-if="inputType === 'text-only'",
        :class="{'error-bg': hasError, 'cursor-disable' : disabled, [inputClass] : true }",
        :name="attribute",
        v-model="inputValue",
        type="text-number",
        :placeholder="placeholderText",
        v-validate="validation",
        :data-vv-as="labelText",
        :disabled="disabled",
        :required="required",
        :maxLength="maxLength",
        :minLength="minLength",
        @input="$emit('input', $event.target.value)",
        onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)",
    )
    .position-relative(v-if=" inputType === 'password'")
        input(
            :class="{'error-bg': hasError, 'cursor-disable' : disabled, [inputClass] : true }",
            :name="attribute",
            v-model="inputValue",
            :type="passwordType",
            :placeholder="placeholderText",
            v-validate="validation",
            :data-vv-as="labelText",
            :disabled="disabled",
            :required="required",
            :maxLength="maxLength",
            :minLength="minLength",
            @input="$emit('input', $event.target.value)",
        )
        span.fa.fa-eye.field-icon.toggle-password.cursor-pointer.text-dark(
            v-if="inputType === 'password' && passwordType === 'password'",
            @click="passwordToggle"
        )
        span.fa.fa-eye-slash.field-icon.toggle-password.cursor-pointer.text-dark(
            v-if="inputType === 'password' && passwordType === 'text'",
            @click="passwordToggle"
        )

    //----------------------------- Checkbox --------------------------------
    input(
        v-if="inputType === 'checkbox'",
        :name="attribute",
        v-model="inputValue",
        @change="$emit('input', $event.target.checked)",
        type="checkbox",
        :placeholder="placeholderText",
        v-validate="validation",
        :data-vv-as="labelText",
        :disabled="disabled",
        :required="required",
    )
    // span(
    //     v-if="inputType === 'checkbox' && (trueCheckboxText || falseCheckboxText)",
    //     v-html="inputValue ? trueCheckboxText : falseCheckboxText",
    //     style="margin-left: 10px;",
    // )

    b-form-checkbox-group(
        v-if="inputType === 'checkbox-group'",
        v-model="inputValue",
        :options="items",
        :disabled="disabled",
        @change="$emit('input', $event)",
    )

    el-checkbox(
        :name="attribute",
        v-model="inputValue",
        @change="$emit('input', $event)",
        type="checkbox",
        :placeholder="placeholderText",
        v-validate="validation",
        v-if="inputType === 'checkbox-el-border'",
        :data-vv-as="labelText",
        :disabled="disabled",
        :required="required",
        border
    )
        span {{attribute}}

    el-checkbox(
        v-model="inputValue",
        @change="$emit('input', $event)",
        :placeholder="placeholderText",
        v-validate="validation",
        v-if="inputType === 'checkbox-el'",
        :data-vv-as="labelText",
        :disabled="disabled",
        :required="required",
    )
        span {{attribute}}

    //-------------------------------- Text area-------------------------------
    textarea.fix-height(
        v-if="inputType === 'textarea'",
        :name="attribute",
        v-model="inputValue",
        @input="$emit('input', $event.target.value)",
        :placeholder="placeholderText",
        v-validate="validation",
        :data-vv-as="labelText",
        :disabled="disabled",
        :required="required",
    )

    //---------------------------------------- Date and time picker --------------------------
    el-date-picker(
        v-if="inputType === 'date'",
        v-model="inputValue",
        :name="attribute",
        size='large',
        type='date',
        @input="$emit('input', $event)",
        :placeholder="placeholderText",
        format='MMM dd,yyyy',
        value-format='yyyy-MM-dd',
        :clearable='clearable',
        v-validate="validation",
        :disabled="disabled",
        :required="required",
    )

    el-time-picker(
        v-if="inputType === 'time'",
        v-model='inputValue',
        size='large',
        :name="attribute",
        :placeholder="placeholderText",
        format='hh:mm A',
        @input="$emit('input', $event)",
        value-format='hh:mm A',
        :clearable='clearable',
        v-validate="validation",
        :disabled="disabled",
        :required="required",
    )

    el-date-picker(
        v-if="inputType === 'date-time'",
        type='datetime',
        v-model='inputValue',
        size='large',
        :name="attribute",
        :placeholder="placeholderText",
        @input="$emit('input', $event)",
        :clearable='clearable',
        v-validate="validation",
        :disabled="disabled",
        :required="required",
        format='yyyy-MM-dd hh:mm A',
        :value-format='valueFormat',
        :time-arrow-control="false",
    )

    el-date-picker(
        v-if="inputType === 'daterange'",
        v-model="inputValue",
        type="daterange",
        range-separator="To",
        start-placeholder="Start date",
        end-placeholder="End date",
        format='MMM dd,yyyy',
        value-format='yyyy-MM-dd',
        :clearable='clearable',
        v-validate="validation",
        :disabled="disabled",
        :required="required",
        :picker-options="pickerOptions",
        @input="$emit('input', $event)",
    )

    //---------------------------------------- Radio button------------------------------
    el-radio.form-control(
        v-if="inputType === 'radio'",
        :name="attribute",
        v-model="inputValue",
        @input="$emit('input', $event)",
        v-validate="validation",
        :disabled="disabled",
        :required="required",
        :label="radioButtonValue",
    ) {{attribute}}

    el-radio-group.form-control(
        v-if="inputType === 'radio-group'",
        :name="attribute",
        v-model="inputValue",
        @input="$emit('input', $event)",
        v-validate="validation",
        :disabled="disabled",
        :required="required",
        size="medium"
    )
        el-radio(v-for='{ name, value } in items', :key="value", :label="value") {{name}}

    //------------------------------------ Select and multi select dropdown menu -------------------------------------
    select.form-control(
        v-if="inputType === 'select-country'",
        v-model='inputValue',
        @input="$emit('input', $event.target.value)",
        v-validate="validation",
        :disabled="disabled",
        :required="required",
    )
        option(value='') Select A Country
        option(v-for='{ country } in countries', :key="country", :value='country') {{country}}

    el-select.d-block(
        v-if="inputType === 'select'",
        v-model="inputValue",
        :disabled="disabled",
        :placeholder="placeholderText",
        :clearable="true",
        :filterable="true",
        @change="$emit('input', $event)",
    )
        el-option(
            v-for="item in items",
            :key="item[valueKey]",
            :label="item[labelKey]",
            :value="item[valueKey]"
        )

    el-select.d-block(
        v-if="inputType === 'select-multiple'",
        v-model="inputValue",
        :disabled="disabled",
        :placeholder="placeholderText",
        :multiple="true",
        :clearable="true",
        :filterable="true",
        :collapse-tags="collapseTags",
        @change="$emit('input', $event)",
    )
        el-option(
            v-for="item in items",
            :key="item[valueKey]",
            :label="item[labelKey]",
            :value="item[valueKey]"
        )
    el-select.d-block(
        v-if="inputType === 'select-custom-template'",
        v-model="inputValue",
        :disabled="disabled",
        :placeholder="placeholderText",
        :clearable="true",
        :filterable="true",
        :collapse-tags="true",
        @change="$emit('input', $event)",
    )
        el-option(
            v-for="item in items",
            :key="item[valueKey]",
            :label="item[labelKey]",
            :value="item[valueKey]",
            :disabled="!item.count"
        )
            span(style="float: left") {{ item[labelKey] | truncate(35)}}
            span.ml-2(style="float: right; color: #409EFF;") {{ item.count }}
    p.error-block(v-if="showErrors && errors.has(attribute)")
        span {{ errors.first(attribute) }}
</template>

<style lang="scss">
.error-block {
    color: red;
    margin: 0.5em 0 0;
}

label {
    font-weight: bold;
}

// .fix-height {
//     height: 100px !important;
//     overflow-x: auto !important;
// }

// .error-bg {
//     border: 1px solid red;
// }

.cursor-disable {
    cursor: not-allowed;
}

textarea {
    resize: none;
}
</style>
