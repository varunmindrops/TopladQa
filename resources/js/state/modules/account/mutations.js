/* ============
 * Mutations for the account module
 * ============
 *
 * The mutations that are available on the
 * account module.
 */

import {
    FIND,
    SAVE,
    REMOVE,
    UPDATE,
    SAVE_ADMIN,
    SAVE_MST_CATEGORIES
} from './mutation-types';
import Vue from 'vue';

export default {
    [FIND](state, user) {
        state.email = user.email;
        state.fullName = user.fullName;
        // state.lastName = user.lastName;
    },
    [SAVE](state, user) {
        const data = {
            email: user.email,
            phone: user.phone,
            address: user.address,
            first_name: user.first_name,
            last_name: user.last_name,
            username: user.username,
            profile_image: user.profile_image,
            about: user.about,
            user_type: user.user_type,
            user_role: user.user_role,
            id: user.id
        };

        state.user = data;
        localStorage.setItem('user', JSON.stringify(data));

        let expires = "";
        const date = new Date();
        date.setTime(date.getTime() + (24*60*60*1000));
        expires = "; expires=" + date.toLocaleString("en-US", {timeZone: "Asia/Kolkata"});
        document.cookie = "user=" + JSON.stringify(data)  + expires + "; path=/";
    },
    [SAVE_ADMIN](state, admin) {
        state.admin = admin;
        localStorage.setItem('admin', JSON.stringify(admin));
    },
    [REMOVE](state) {
        state.user = {};
        localStorage.clear();
        state.admin = {};
        localStorage.removeItem('admin');

        const expires = "; expires=" + new Date().toLocaleString("en-US", {timeZone: "Asia/Kolkata"});
        document.cookie = "user= " + expires + "; path=/";
        document.cookie = "x-access-token= " + expires + "; path=/";
    },
    [UPDATE](state, user) {
        const data = {
            email: user.email,
            phone: user.phone,
            address: user.address,
            first_name: user.first_name,
            last_name: user.last_name,
            username: user.username,
            profile_image: user.profile_image,
            about: user.about,
            user_type: user.user_type,
            user_role: user.user_role,
            id: user.id
        };
        Object.keys(data).forEach((k) => {
            Vue.set(state.user, k, data[k]);
        });
        const expires = "; expires=" + new Date().toLocaleString("en-US", {timeZone: "Asia/Kolkata"});
        document.cookie = "user=" + JSON.stringify(data) + expires + "; path=/";
        localStorage.setItem('user', JSON.stringify(state.user));
    },
    [SAVE_MST_CATEGORIES](state, mstCategories) {
        state.mstCategories = mstCategories;
        localStorage.setItem('mst_category_count', JSON.stringify(mstCategories.length));
    },
};
