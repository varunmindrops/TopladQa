const httpService = require('../../../services/api');
import {
  CHECK,
  REGISTER,
  LOGIN,
  LOGOUT,
  FETCH_USER_NOTIFICATIONS,
  SAVE_NOTIFICATION,
  USER_NOTIFICATION_READED
} from './mutation-types';
import store from '@state/store';
import Api from '@services/api';

export default {
    async [CHECK]() {
        const token = localStorage.getItem('x-access-token');
        const user = JSON.parse(localStorage.getItem('user'));

        if (token && user) {
            store.dispatch('auth/login', { token, user });
        } else {
            store.dispatch('auth/logout');
        } 
        // else if (token && (!user)) {
        //     const data = await Api.get('validate-token');
        //     store.dispatch('auth/login', { token, user: data.user });
        // } 
    },

    [REGISTER]() { },

    async [LOGIN](state, token) {
        state.token = token;
        state.authenticated = true;
        localStorage.setItem('x-access-token', token);

        let expires = "";
        const date = new Date();
        date.setTime(date.getTime() + (24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
        document.cookie = "x-access-token=" + token  + expires + "; path=/";

        const {data} = await httpService.default.getWithoutHeaders("category");
        if(data && data.length) {
            store.dispatch("account/saveMstCategories", data);    
        }
    },
    
    async [FETCH_USER_NOTIFICATIONS](state, data) {
        if(data && data.userId) {
            const items = await httpService.default.get('notification', {
                where: {
                    isDeleted: false,
                    userId: data.userId,
                },
                order: [["created_at", "DESC"]],
                required: false
            });

            if (items && items.length) {
                store.dispatch('auth/saveNotifications', items);
            }
        }
    },

    [SAVE_NOTIFICATION](state, notifications = []) {
        state.userNotifications = notifications;
        state.notificationCount = notifications.filter(a => a.hasRead === false).length;
    },

    async [USER_NOTIFICATION_READED](state, notification) {
        const readedNotification = await httpService.default.updateById('notification', notification.id, {
            hasRead: true
        });
        if(readedNotification) {
            const index = state.userNotifications.findIndex(a => a.id === notification.id);
            state.userNotifications[index].hasRead = true
        }
    },

    async [LOGOUT](state) {
        state.token = null;
        state.authenticated = false;
        state.userNotifications = [];
        state.notificationCount = 0;

        try {
            const token = localStorage.getItem('x-access-token');
            if (token) await Api.get('logout');
            localStorage.removeItem('x-access-token');
        } catch (err) {
            localStorage.removeItem('x-access-token');
        }
    },
};
