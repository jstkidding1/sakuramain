<template>
    <div>
        <div class="container">
            <div v-if="!isLogged">
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
                                class="w-full border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
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
                                class="w-full border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500"
                                type="password"
                                v-model="form.password"
                                required
                            />
                            <div class="flex justify-between">
                                <router-link
                                    class="no-underline hover:underline text-indigo-800 hover:text-indigo-700"
                                    to="/register"
                                    >Don't have an account? Click
                                    here</router-link
                                >
                            </div>
                            <div class="flex justify-end">
                                <button
                                    @click="login"
                                    type="submit"
                                    class="flex items-center bg-indigo-500 px-5 py-3 text-white font-bold text-md hover:bg-indigo-600"
                                >
                                    <svg
                                        v-if="loading"
                                        class="animate-spin h-4 w-4 cursor-not-allowed rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-3"
                                        style="border-right-color: white; border-top-color: white;"
                                        viewBox="0 0 24 24"
                                    ></svg>
                                    <span
                                        v-if="loading"
                                        class="cursor-not-allowed"
                                        >Submit</span
                                    >
                                    <span v-else>Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isLogged">
            <Notfound />
        </div>
    </div>
</template>

<script>
import Notfound from '../components/Notfound.vue';
export default {
    components: { Notfound },
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            isLogged: null,
            loading: false,
            errors: []
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    methods: {
        login(e) {
            e.preventDefault();
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
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
                                    this.$router.push(
                                        this.$route.params.nextUrl
                                    );
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
                        });
                    // .catch(function(error) {
                    //     console.error(error);
                    // });
                }
            }, 2000);
        }
    }
};
</script>

<style></style>
