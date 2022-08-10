import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '@state/store';
import routes from './routes';

Vue.use(VueRouter);

export const router = new VueRouter({
    routes,
    mode: 'history',
    scrollBehavior (to, from) {
        return { x: 0, y: 0 };
    },
});

router.beforeEach((to, from, next) => {
    const userType = store.getters['account/userType'];

    store.dispatch('common/updateLoader', true);

    if (to.matched.some(m => m.meta.admin) && !store.state.auth.authenticated) {
        next({
            name: 'user.login',
        });
    } else if (to.matched.some(m => m.meta.auth) && !store.state.auth.authenticated) {
        next({
            name: 'user.login',
        });
    } if (to.matched.some(m => m.meta.admin) && store.state.auth.authenticated && userType!= 'admin') {
        next({
            name: 'user.login',
        });
    } else if (to.matched.some(m => m.meta.guest) && store.state.auth.authenticated) {
        let name = "admin.dashboard";

        if (userType === 'student') {
            name = 'student.my_program';
        } else if(userType === "institute"){
            name = 'institute.my_program';
        } 

        next({
            name,
        });
    } else {
        next();
    }
});

router.afterEach(() => {
    store.dispatch('common/updateLoader', false);
});

Vue.router = router;

export default router;
