<template>
    <div class="flex flex-col h-screen">
        <div class="container">
            <div v-if="!isLogged">
                <div class="flex flex-wrap justify-center">
                    <div
                        class="bg-white rounded shadow-md p-8 h-auto sm:w-full lg:w-1/3 mt-10"
                    >
                        <div class="flex justify-center">
                            <div
                                class="font-sans text-2xl font-bold text-gray-800 mb-2"
                            >
                                Create an account
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div
                                class="font-sans font-bold text-gray-600 mb-10"
                            >
                                Already Registered?
                            </div>
                            <router-link
                                to="/login"
                                style="text-decoration:none;"
                                class="font-sans font-bold text-yellow-600 hover:text-yellow-800 ml-2 transition duration-300"
                                >Sign in</router-link
                            >
                        </div>
                        <form class="px-5">
                            <div class="flex">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >First name</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.fname"
                                    >{{ errors.fname[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="text"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="First name"
                                    v-model="form.fname"
                                    required
                                    autofocus
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Middle name</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.mname"
                                    >{{ errors.mname[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="text"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="Middle name"
                                    v-model="form.mname"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Last name</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.lname"
                                    >{{ errors.lname[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="text"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="Last name"
                                    v-model="form.lname"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Email</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.email"
                                    >{{ errors.email[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="text"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="example@gmail.com"
                                    v-model="form.email"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Password</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.password"
                                    >{{ errors.password[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="password"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="Password"
                                    v-model="form.password"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <label
                                    class="font-sans text-md text-gray-800 mr-2"
                                    >Confirm Password</label
                                >
                                <span
                                    class="ml-2 text-red-500"
                                    v-if="errors.password_confirmation"
                                    >{{ errors.password_confirmation[0] }}</span
                                >
                            </div>
                            <div class="flex">
                                <input
                                    type="password"
                                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                    placeholder="Confirm password"
                                    v-model="form.password_confirmation"
                                    required
                                />
                            </div>
                            <div class="flex mt-4">
                                <p class="text-xs text-gray-400 text-justify">
                                    By clicking “Submit”, I agree that Sakura
                                    may communicate with me via text, or phone
                                    call. For more information on how we handle
                                    personal information, please read our
                                    <a
                                        href="/terms"
                                        style="text-decoration:none;"
                                        class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                                    >
                                        privacy policy.
                                    </a>
                                </p>
                                <!-- <label
                                    for="terms"
                                    class="font-sans font-bold ml-2 block text-sm text-gray-900"
                                >
                                    <input
                                        id="terms"
                                        name="terms"
                                        type="checkbox"
                                        class="mb-1.5"
                                        v-model="termsState"
                                        @change="handleTermState"
                                    />
                                    I agree to the
                                    <router-link
                                        to="#"
                                        class="font-sans text-indigo-600 hover:text-indigo-500 mr-1"
                                        >Terms</router-link
                                    >and
                                    <router-link
                                        to="#"
                                        class="font-sans text-indigo-600 hover:text-indigo-500"
                                        >Privacy Policy</router-link
                                    ></label
                                >
                                <span
                                    class="w-full ml-2 text-red-500"
                                    v-if="termsError"
                                    >You have to agree the terms and privacy
                                    policy.</span
                                > -->
                            </div>
                            <div class="flex mt-4 justify-end">
                                <button
                                    @click="handleSubmit"
                                    :disabled="loading"
                                    type="submit"
                                    class="flex items-center bg-gray-900 px-3 py-3 text-white rounded font-bold text-md hover:bg-gray-500 transition duration-300"
                                >
                                    <svg
                                        v-if="loading"
                                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-3"
                                        style="border-right-color: white; border-top-color: white;"
                                        viewBox="0 0 24 24"
                                    ></svg>
                                    <span v-if="loading">Please wait..</span>
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
    props: ['nextUrl'],
    components: { Notfound },
    data() {
        return {
            form: {
                fname: '',
                mname: '',
                lname: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            termsState: false,
            validated: false,
            loading: false,
            isLogged: null,
            errors: []
        };
    },
    mounted() {
        this.isLogged = localStorage.getItem('jwt') != null;
    },
    computed: {
        termsError() {
            return this.validated && !this.termsState;
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault();
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .post('api/register', {
                        fname: this.form.fname,
                        mname: this.form.mname,
                        lname: this.form.lname,
                        email: this.form.email,
                        password: this.form.password,
                        password_confirmation: this.form.password_confirmation
                    })
                    .then(response => {
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
                                this.$router.push('/');
                            }
                        }
                        console.log(response.data);
                    })
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Registered Successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }, 2000);
        },
        handleTermState() {
            this.validated = false;
        }
    }
};
</script>

<style></style>
