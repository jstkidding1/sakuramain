<template>
    <div>
        <div class="container">
            <div v-if="!isLogged">
                <div class="flex flex-wrap justify-center">
                    <div
                        class="bg-white rounded shadow-md p-8 h-auto w-1/3 mt-20"
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
                                class="font-sans font-bold text-indigo-600 ml-2"
                                >Sign in</router-link
                            >
                        </div>
                        <div class="px-5">
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
                                    class="w-full border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500 mb-4"
                                    placeholder="Ken"
                                    v-model="form.fname"
                                    required
                                    autofocus
                                />
                            </div>
                            <div class="flex">
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
                                    class="w-full border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500 mb-4"
                                    placeholder="Digiz"
                                    v-model="form.mname"
                                    required
                                />
                            </div>
                            <div class="flex">
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
                                    class="w-full border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500 mb-4"
                                    placeholder="Dignos"
                                    v-model="form.lname"
                                    required
                                />
                            </div>
                            <div class="flex">
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
                                    class="w-full border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500 mb-4"
                                    placeholder="kendigs@gmail.com"
                                    v-model="form.email"
                                    required
                                />
                            </div>
                            <div class="flex">
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
                                    class="w-full border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500 mb-4"
                                    v-model="form.password"
                                    required
                                />
                            </div>
                            <div class="flex">
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
                                    class="w-full border-2 border-gray-200 p-2 rounded outline-none focus:border-indigo-500 mb-4"
                                    v-model="form.password_confirmation"
                                    required
                                />
                            </div>
                            <div class="flex">
                                <label
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
                                >
                            </div>
                            <div class="flex justify-end">
                                <button
                                    @click="handleSubmit"
                                    class="flex items-center bg-indigo-500 px-5 py-3 text-white font-bold text-md hover:bg-indigo-600 mt-8"
                                >
                                    <svg
                                        v-if="loading"
                                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-3"
                                        style="border-right-color: white; border-top-color: white;"
                                        viewBox="0 0 24 24"
                                    ></svg>
                                    <span v-if="loading">Sign up</span>
                                    <span v-else>Sign up</span>
                                </button>
                            </div>
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
                if (
                    this.form.password === this.form.password_confirmation &&
                    this.form.password.length > 0
                ) {
                } else {
                    this.password = '';
                    this.password_confirmation = '';

                    return alert('Password do not match');
                }
            }, 2000);
        },
        handleTermState() {
            this.validated = false;
        }
    }
};
</script>

<style></style>
