/* ============
 * Mutation types for the account module
 * ============
 *
 * The mutation types that are available
 * on the auth module.
 */

export const CHECK = 'CHECK';
export const REGISTER = 'REGISTER';
export const LOGIN = 'LOGIN';
export const LOGOUT = 'LOGOUT';
export const SAVE_NOTIFICATION = 'SAVE_NOTIFICATION';
export const FETCH_USER_NOTIFICATIONS = 'FETCH_USER_NOTIFICATIONS';
export const USER_NOTIFICATION_READED = 'USER_NOTIFICATION_READED';

export default {
    CHECK,
    REGISTER,
    LOGIN,
    LOGOUT,
    FETCH_USER_NOTIFICATIONS,
    SAVE_NOTIFICATION,
    USER_NOTIFICATION_READED
};
