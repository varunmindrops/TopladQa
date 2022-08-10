import Vue from "vue";
import {
    humanize
} from "underscore.string";
import {
    isEmpty,
} from "lodash";
// import store from '@state';
import api from "./api";
// import {
//     Message
// } from 'element-ui';
import { message } from "ant-design-vue"

const service = {
    getRoles() {
        const items = [{
            name: "Super Admin",
            value: "super_admin",
        }, {
            name: "SME",
            value: "sme",
        }, {
            name: "DTP",
            value: "dtp",
        }];
        return items;
    },
    getRolePermissions() {
        const list = [{
            name: "Dashboard",
            value: "admin.dashboard",
        }, {
            name: "Question Bank (Test Program)",
            value: "admin.test_program.question_bank",
        }, {
            name: "Test Paper (Test Program)",
            value: "admin.test_program.test_paper",
        }, {
            name: "Test Program (Test Program)",
            value: "admin.test_program.test_program",
        }, {
            name: "Manage Student",
            value: "admin.manage_student",
        }, {
            name: "Class Exam (Master Data)",
            value: "admin.master.class_exam",
        }, {
            name: "Tag  (Master Data)",
            value: "admin.master.tag",
        }, {
            name: "Skill (Master Data)",
            value: "admin.master.skill",
        }, {
            name: "Difficulty Level (Master Data)",
            value: "admin.master.difficulty_level",
        }, {
            name: "Category (Master Data)",
            value: "admin.master.category",
        }, {
            name: "Manage Coupon",
            value: "admin.manage_coupon",
        }, {
            name: "Results & Reports",
            value: "admin.result_report",
        }, {
            name: "Manage Users",
            value: "admin.manage_user",
        }, {
            name: "Manage Institute",
            value: "admin.manage_institute",
        }, {
            name: "Manage Order",
            value: "admin.manage_order",
        }, {
            name: "Manage Discount",
            value: "admin.manage_discount",
        }, {
            name: "Change Password",
            value: "admin.manage_password",
        }, {
            name: "Manage Permissions",
            value: "admin.manage_permission"
        }, {
            name: "Content Management",
            value: "admin.content_management"
        }];
        return list;
    },
    getYesNoOption() {
        const items = [{
            name: "Yes",
            value: '1',
        }, {
            name: "No",
            value: '0',
        }];
        return items;
    },
    arrayToObject(array) {
        const mapped = array.map(value => ({
            name: humanize(value),
            value,
        }));
        return [...mapped];
    },
    redirectToHttps() {
        const loc = `${window.location.href} `;
        if (loc.indexOf("http://") === 0 && process.env.VUE_APP_NODE_ENV === "production") {
            window.location.href = loc.replace("http://", "https://");
        }
    },
    downloadFile(url, fileName = "") {
        const link = document.createElement("a");
        link.href = url;
        link.target = "_blank";
        link.setAttribute("download", fileName);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    },
    goToPage(name = "home", data = {}, type = "params") {
        const obj = {
            name,
        };
        if (!isEmpty(data)) obj[type] = data;
        Vue.router.push(obj);
    },
    redirectToLink(url, target = '_blank') {
        const link = document.createElement("a");
        link.href = url;
        link.target = target;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    },
    sendOtp(phone) {
        return api.rawPost("send-sms", {
            phone,
        });
    },
    verifyOtp(phone, otp) {
        return api.rawPost("verify-otp", {
            phone,
            otp,
        });
    },
    showSucessMessage(content) {
        console.log(content);
        if (!content) return;

        message.success(message, 3000);
    },
    showErrorMessage(content) {
        if (!content) return;

        message.error(content, 3000);
    },
    showWarningMessage(content) {
        if (!content) return;

        message.warning(content, 3000);
    },
    calculatePriceWithTax(price, tax) {
        if (!price) return 0;

        const value = (tax / 100) * price + parseFloat(price);
        return value.toFixed(2);
    },
    validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    },
    validatePhone(phone) {
        var re = /^[0-9]+$/;
        return phone.match(re);
    },
    getTestPaperTypeComponent(paperType) {
        const list = [
            {value: "practice_test", component: "practice-test"},
            {value: "chapter_test", component: "chapter-test"},
            {value: "diagnostic_test", component: "diagnostic-test"},
            {value: "mock_test", component: "mock-test"},
            {value: "scheduled_test", component: "scheduled-test"},
        ];

        const listComponent = list.find(a => a.value === paperType)
        if(listComponent) {
            return listComponent.component
        }
        return
    },
    setLocalstotege(key, value) {
        localStorage.setItem(key, value)
    }
};

// Bind Utilities to Vue$
Vue.$http = service;

Object.defineProperty(Vue.prototype, "$utility", {
    get() {
        return service;
    },
});

export default service;
