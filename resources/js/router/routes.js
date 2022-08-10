export default [
    //------------------------- Common  pages---------------------------

    {
        path: '/user/login',
        name: 'user.login',
        component: () => import('@common-views/login'),
        meta: {
            guest: true,
        },
    },

    // --------------------------- Default routing --------------------------------------

    // {
    //     path: '/',
    //     redirect: '/user/login',
    // }, {
    //     path: '/*',
    //     redirect: '/user/login',
    // },
];
