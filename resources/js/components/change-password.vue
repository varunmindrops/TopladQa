<script>
export default {
    name: "ChangePassword",
    props: {
        userId:{
            type : Number,
            required : true,
        }
    },
    data() {
        return {
            data: {
                newPassword: null,
                confirmPassword: null,
            },
        };
    },
    methods: {
        async updatePassword() {
            if (this.data.newPassword == this.data.confirmPassword) {
                try {
                    await this.$http.updateById("users", this.userId, {
                        password : this.data.newPassword
                    });

                    this.$utility.showSucessMessage("Password successfully changed");
                    this.$emit('close');
                } catch (err) {
                    this.$utility.showErrorMessage(err.message);
                }
            } else {
                this.$utility.showErrorMessage("Password does not match");
            }
        },
    },
    watch: {
        userId() {
            this.data.newPassword = '';
            this.data.confirmPassword = '';
        },
    },
};
</script>

<template lang="pug">
form.row(@submit.prevent="updatePassword()")
    .col-sm-12
        form-field(
            v-model='data.newPassword',
            attribute='New password',
            input-type='password',
            placeholder='Enter New Password',
            :required='true',
            :maxLength="50",
        )
    .col-sm-12
        form-field(
            v-model='data.confirmPassword',
            attribute='Confirm password',
            input-type='password',
            placeholder='Enter Confirm Password',
            :required='true',
            :maxLength="50",
        )
    .col-sm-12
        .text-right
            button.btn.btn-primary Submit
</template>