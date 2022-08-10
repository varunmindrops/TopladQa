import Vue from 'vue';
import 'ant-design-vue/dist/antd.css';
import 'bootstrap/dist/css/bootstrap.css';
// import 'font-awesome/css/font-awesome.css';

/** Import packages */
import Vuex from 'vuex';
import SweetModal from 'sweet-modal-vue/src/plugin';
import VeeValidate from 'vee-validate';
import BootstrapVue from 'bootstrap-vue';
import Raven from 'raven-js';
import RavenVue from 'raven-js/plugins/vue';
import VueBreadcrumbs from 'vue-breadcrumbs';
// import DownloadCsv from 'vue-json-csv';
// import Countdown from 'vue-awesome-countdown';

// Change the field bag name of vee validate because it conflicts with element ui forms
const VeeValidateConfig = {
    fieldsBagName: 'veeValidateFields',
    inject: false,
};

import Antd from 'ant-design-vue';


Vue.use(Antd);

Vue.use(SweetModal);
Vue.use(VeeValidate, VeeValidateConfig);

Vue.use(Vuex);

// Inview.offset(-400);
Vue.use(BootstrapVue);

Vue.use(VueBreadcrumbs);
// Vue.use(Countdown);

if (process.env.VUE_APP_NODE_ENV === 'staging' || process.env.VUE_APP_NODE_ENV === 'production') {
    Raven
    .config(process.env.VUE_APP_SENTRY_DSN, {
        environment: process.env.NODE_ENV,
        autoBreadcrumbs: true,
    })
    .addPlugin(RavenVue, Vue)
    .install();
}

// global components
// import AdminLayout from '@layouts/admin-layout';
// import FormLayout from "@layouts/form-layout";
// import SiteLayout from "@layouts/site-layout";
import FormFieldInput from '@components/form-field-input';
import FormField from '@components/form-field';
import LinkInline from '@components/link-inline';
import Button from '@components/button';
import Status from '@components/status';
import FileUpload from '@components/file-upload.vue';
import TruncateTooltip from '@components/truncate-tooltip.vue';
// import HtmlEditor from '@components/html-editor.vue';
// import PreviewTestProgram from "@components/preview-test-program";
// import QuestionPreview from "@components/question-preview";
// import HighCharts from "@components/high-charts"

// Vue.component('admin-layout', AdminLayout);
// Vue.component('form-layout', FormLayout);
// Vue.component('site-layout', SiteLayout);
Vue.component('form-field-input', FormFieldInput);
Vue.component('form-field', FormField);
Vue.component('link-inline', LinkInline);
Vue.component('file-upload', FileUpload);
Vue.component('btn', Button);
Vue.component('status', Status);
// Vue.component('downloadCsv', DownloadCsv);
Vue.component('truncate-tooltip', TruncateTooltip);
// Vue.component('html-editor', HtmlEditor);
// Vue.component('preview-test-program', PreviewTestProgram);
// Vue.component('question-preview', QuestionPreview);
// Vue.component('high-charts', HighCharts);


