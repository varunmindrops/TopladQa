/* ============
 * Actions for the auth module
 * ============
 *
 * The actions that are available on the
 * auth module.
*/

import Vue from 'vue';
import store from '@state/store';
import * as types from './mutation-types';

export const check = ({
    commit
}) => {
    commit(types.CHECK);
};

/* eslint-disable no-unused-vars */
export const register = ({
    commit
}) => {
    Vue.router.push({
        name: 'user.login',
    });
};

export const saveNotifications = ({
    commit
}, data) => {
    commit(types.SAVE_NOTIFICATION, data);
};

export const fetchUserNotifications = ({
    commit
}, data) => {
    commit(types.FETCH_USER_NOTIFICATIONS, data);
};
export const userNotificationReaded = ({
    commit
}, data) => {
    commit(types.USER_NOTIFICATION_READED, data);
};

export const login = ({
    commit
}, { user, token }) => {
    commit(types.LOGIN, token);

    store.dispatch('account/save', user);

    // let name = 'student.my_program';
    let name = 'admin.dashboard';

    const userPermissions =
        user.user_role &&
            user.user_role.permissions
            ? user.user_role.permissions.split(",")
            : [];

    if (user.user_type == 'admin') {
        if (user.user_role && user.user_role.value !== 'super_admin') {
            if (!userPermissions.includes(name)) {
                name = userPermissions[0];
            }
        }
    } else if (user.user_type == 'student') {
        name = 'student.my_program';
    } else if (user.user_type == 'institute') {
        name = 'institute.my_program';
    }

    Vue.router.push({
        name,
    });
};

export const logout = ({
    commit
}) => {
    commit(types.LOGOUT);
    const logoutRedirect = localStorage.getItem('logoutRedirect');

    store.dispatch('account/remove');

    if(logoutRedirect){ location.href = logoutRedirect; }
    else {
        Vue.router.push({
            name: 'user.login',
        });
    }
};

export default {
    check,
    register,
    login,
    logout,
    fetchUserNotifications,
    saveNotifications,
    userNotificationReaded
};
