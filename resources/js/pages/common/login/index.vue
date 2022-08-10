<script>
    // import LinkInline from "@layouts/form-layout";

    export default {
        name: "Login",
        components: {
            // FormLayout,
        },
        data() {
            return {
                rememberEmail: false,
                user: {
                    email: null,
                    password: null,
                },
            };
        },
        mounted() {
            const email = localStorage.getItem('user_email');

            if (email) {
                this.user.email = email;
                this.rememberEmail = true;
            }
        },
        methods: {
            async login() {
                try {
                    const result = await this.$http.postWithoutHeaders("login", {
                        email: this.user.email.trim(),
                        password: this.user.password
                    });

                    this.$store.dispatch("auth/login", result.data);

                    this.rememberEmail ? localStorage.setItem('user_email', this.user.email) : localStorage.setItem('user_email', '');

                } catch (err) {
                    this.$utility.showErrorMessage(err.message);
                }
            },
        },
    };
</script>

<template lang="pug">
    //form-layout(title="Log In", label="Welcome back my friend! Please sign in.")
        //.login-wrapper.wd-250.wd-xl-350.mg-y-30
            h4.tx-inverse.tx-center Log In
            p.tx-center.mg-b-30.tx-14 Welcome back my friend! Please sign in.
    form(@submit.prevent='login()')
        .form-group
            form-field-input(
                v-model="user.email",
                attribute="email",
                input-type="text",
                placeholder="Email",
                :required="true",
            )
        .form-group
            form-field-input(
                v-model="user.password",
                attribute="Password",
                :input-type="'password'",
                placeholder='Password',
                :required="true",
                :maxLength="25",
            )
        div.row
            .col-8.col-lg-12
                form-field-input.pull-left(
                    v-model="rememberEmail",
                    inputType="checkbox-el",
                    attribute="Remember me",
                )
                span.pull-right
                    link-inline(
                        route="user.forgot_password"
                    )
                        a.pull-right
                        i.tx-14.fa.fa-lock.mr-1
                        | Forgot Password?
            .col-12.col-lg-12.mt-1.text-center
                button.btn.btn-info.btn-block Sign In

            .mg-t-30.tx-center.tx-14
                | New Student?
                link-inline.tx-14(route="student.register", label='Register Here')
</template>
