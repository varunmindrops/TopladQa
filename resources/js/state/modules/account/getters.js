/* ============
 * Getters for the account module
 * ============
 *
 * The getters that are available on the
 * account module.
 */

export default {
    loggedInUser: state => state.user,
    getUserId: state => state.user.id,
    getUserRole: state => state.user && state.user.user_role ? state.user.user_role.value : 'super_admin',
    userEmail: state => state.user.email,
    userType: state => state.user.user_type,
    userFullName: state => `${state.user.first_name || ''} ${state.user.last_name || ''}`,
    isSuperAdmin: state => state.user.user_type === 'admin',
    isStudent: state => state.user.user_type === 'student',
    isInstitute: state => state.user.user_type === 'institute',
    userIs: state => (...args) => args.includes(state.user.user_type),
    mstCategories: state => state.mstCategories,
};
