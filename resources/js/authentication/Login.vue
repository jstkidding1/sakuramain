<template>
    <div>
        <div class="flex flex-wrap items-center justify-center">
            <div class="bg-white p-16 mt-20 shadow-md w-1/3">
                <div
                    class="font-sans text-3xl font-bold mb-6 text-gray-800 font-semibold"
                >
                    Login to your account
                </div>
                <form class="space-y-6">
                    <div class="flex">
                        <label class="block font-bold text-gray-500"
                            >Email</label
                        >
                        <span
                            class="w-full ml-2 text-red-500"
                            v-if="errors.email"
                            >{{ errors.email[0] }}</span
                        >
                    </div>
                    <input
                        class="w-full bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                        type="email"
                        placeholder="example@gmail.com"
                        v-model="form.email"
                        required
                        autofocus
                    />
                    <div class="flex">
                        <label class="block font-bold text-gray-500"
                            >Password</label
                        >
                        <span
                            class="w-full ml-2 text-red-500"
                            v-if="errors.password"
                            >{{ errors.password[0] }}</span
                        >
                    </div>
                    <input
                        class="w-full bg-gray-100 focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                        type="password"
                        v-model="form.password"
                        required
                    />
                    <div class="flex justify-between">
                        <router-link
                            class="no-underline hover:underline text-indigo-800 hover:text-indigo-700"
                            to="/register"
                            >Don't have an account? Click here</router-link
                        >
                    </div>
                    <button
                        @click.prevent="login"
                        type="submit"
                        class="inline w-1/2 bg-indigo-600 hover:bg-indigo-300 p-3 rounded text-gray-50 hover:text-gray-700 transition duration-300"
                    >
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            errors: []
        };
    },
    methods: {
        login() {
            if (this.form.password.length > 0) {
                axios
                    .post('api/login', {
                        email: this.form.email,
                        password: this.form.password
                    })
                    .then(response => {
                        let Admin = response.data.user.Admin;
                        let Secretary = response.data.user.Secretary;
                        let Manager = response.data.user.Manager;
                        let Customer = response.data.user.Customer;
                        localStorage.setItem(
                            'user',
                            JSON.stringify(response.data.user)
                        );
                        localStorage.setItem('jwt', response.data.token);

                        if (localStorage.getItem('jwt') != null) {
                            this.$emit('isLogged');
                            if (this.$route.params.nextUrl != null) {
                                this.$router.push(this.$route.params.nextUrl);
                            } else {
                                if (Admin == 1) {
                                    this.$router.push({
                                        name: 'admin-dashboard'
                                    });
                                } else if (Secretary == 1) {
                                    this.$router.push({
                                        name: 'secretary-dashboard'
                                    });
                                } else if (Manager == 1) {
                                    this.$router.push({
                                        name: 'manager-dashboard'
                                    });
                                } else if (Customer == 1) {
                                    this.$router.push({
                                        name: 'customer-dashboard'
                                    });
                                }
                            }
                        }
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title:
                                'You have successfully login to your account.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    })
                    .catch(function(error) {
                        console.error(error);
                    });
            }
        }
    }
};
</script>

<style></style>
