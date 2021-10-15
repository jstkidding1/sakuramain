<template>
    <div class="flex flex-col h-screen">
        <div class="container">
            <div v-if="!isLogged">
                <div class="flex items-center justify-center mt-20">
                    <div
                        class="md:flex no-wrap md:-mx-2 lg:space-x-10 lg:flex justify-center"
                    >
                        <div class="lg:w-1/3 sm:w-full p-2 mr-10 lg:mb-52">
                            <div class="flex">
                                <p
                                    class="text-7xl font-bold antialiased text-gray-700"
                                >
                                    Sakura
                                </p>
                            </div>
                            <div class="flex mt-4">
                                <p
                                    class="text-lg leading-6 tracking-wide antialiased text-gray-700 text-justify"
                                >
                                    Sakura: A Web-Based Application for
                                    Automotive Wholesaler designed to provide an
                                    online platform to the company employees to
                                    help them in performing their work
                                    effortlessly.
                                </p>
                            </div>
                        </div>
                        <div
                            class="bg-white p-16 shadow-md rounded-xl sm:w-full lg:w-1/3"
                        >
                            <div
                                class="font-sans text-3xl mb-6 text-gray-800 font-semibold"
                            >
                                Sign in
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
                                    <span
                                        class="w-full ml-2 text-red-500"
                                        v-if="errors.response"
                                        >{{ errors.response[0] }}</span
                                    >
                                </div>
                                <div class="relative w-full">
                                    <span
                                        class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </span>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="email"
                                        placeholder="example@gmail.com"
                                        v-model="form.email"
                                        required
                                        autofocus
                                    />
                                </div>
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
                                <div class="relative w-full">
                                    <span
                                        class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </span>
                                    <input
                                        class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                        type="password"
                                        v-model="form.password"
                                        required
                                    />
                                </div>
                                <div class="flex justify-between">
                                    <router-link
                                        class="text-gray-800 hover:text-yellow-600 transition duration-300"
                                        style="text-decoration:none;"
                                        to="/register"
                                        >Don't have an account? Click
                                        here</router-link
                                    >
                                </div>
                                <!-- <div class="flex">
                                <router-link
                                    class="text-gray-800 hover:text-yellow-600 transition duration-300"
                                    style="text-decoration:none;"
                                    to="/reset/password"
                                    >Forgot Password? Click here</router-link
                                >
                            </div> -->
                                <div class="flex justify-end">
                                    <button
                                        @click="login"
                                        :disabled="loading"
                                        type="submit"
                                        class="flex items-center bg-yellow-700 px-8 py-3 text-white rounded font-semibold text-md hover:bg-yellow-800 transition duration-300"
                                    >
                                        <svg
                                            v-if="loading"
                                            class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-3"
                                            style="border-right-color: white; border-top-color: white;"
                                            viewBox="0 0 24 24"
                                        ></svg>
                                        <span v-if="loading"
                                            >Please wait..</span
                                        >
                                        <span v-else>Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
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
            message: [],
            errors: []
        };
    },
    async mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    methods: {
        async login(e) {
            e.preventDefault();
            this.loading = !false;

            await setTimeout(() => {
                this.loading = !true;

                axios
                    .post('api/login', {
                        email: this.form.email,
                        password: this.form.password
                    })
                    .then(response => {
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
                                if (Secretary == 1) {
                                    this.$router.push({
                                        name: 'secretary-dashboard'
                                    });
                                } else if (Manager == 1) {
                                    this.$router.push({
                                        name: 'manager-dashboard'
                                    });
                                } else if (Customer == 1) {
                                    this.$router.push({
                                        name: 'customer'
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
            }, 2000);
        }
    }
};
</script>

<style></style>
