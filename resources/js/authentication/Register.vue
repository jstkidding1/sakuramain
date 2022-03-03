<template>
    <div class="mb-10">
        <div v-if="!isLogged" class="grid place-items-center">
            <div class="flex justify-center">
                <img src="/images/sakuralogo.png" alt="" class="h-52 w-full" />
            </div>
            <div
                class="w-11/12 px-3 py-4 bg-white shadow-md sm:w-8/12 md:w-1/2 lg:w-5/12"
            >
                <div class="flex justify-center">
                    <div
                        class="font-sans text-3xl mb-6 text-gray-800 font-semibold"
                    >
                        Registration form
                    </div>
                </div>

                <form class="mt-6">
                    <div class="flex justify-between gap-3 mt-2">
                        <span class="w-1/2">
                            <div class="flex inline-block">
                                <label
                                    for="text"
                                    class="text-xs font-semibold text-gray-600 uppercase"
                                    >First Name</label
                                >
                                <span
                                    class="ml-2 text-xs text-red-500"
                                    v-if="errors.fname"
                                    >{{ errors.fname[0] }}</span
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
                                    type="text"
                                    placeholder="First name"
                                    v-model="form.fname"
                                    autofocus
                                />
                            </div>
                        </span>
                        <span class="w-1/2">
                            <div class="flex inline-block">
                                <label
                                    for="text"
                                    class="text-xs font-semibold text-gray-600 uppercase"
                                    >Middle Name</label
                                >
                                <span
                                    class="ml-2 text-xs text-red-500"
                                    v-if="errors.mname"
                                    >{{ errors.mname[0] }}</span
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
                                    type="text"
                                    placeholder="Middle name"
                                    v-model="form.mname"
                                />
                            </div>
                        </span>
                    </div>
                    <div class="flex justify-between gap-3 mt-2">
                        <span class="w-1/2">
                            <div class="flex inline-block">
                                <label
                                    for="text"
                                    class="text-xs font-semibold text-gray-600 uppercase"
                                    >Last Name</label
                                >
                                <span
                                    class="ml-2 text-xs text-red-500"
                                    v-if="errors.lname"
                                    >{{ errors.lname[0] }}</span
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
                                    type="text"
                                    placeholder="Last name"
                                    v-model="form.lname"
                                />
                            </div>
                        </span>
                    </div>
                    <div class="flex justify-between gap-3 mt-2">
                        <span class="w-1/2">
                            <div class="flex inline-block">
                                <label
                                    for="email"
                                    class="text-xs font-semibold text-gray-600 uppercase"
                                    >Email</label
                                >
                                <span
                                    class="ml-2 text-xs text-red-500"
                                    v-if="errors.email"
                                    >{{ errors.email[0] }}</span
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
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                                        />
                                        <path
                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                                        />
                                    </svg>
                                </span>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="email"
                                    placeholder="example@gmail.com"
                                    v-model="form.email"
                                />
                            </div>
                        </span>
                        <span class="w-1/2">
                            <div class="flex">
                                <label
                                    for="contactnum"
                                    class="text-xs font-semibold text-gray-600 uppercase"
                                    >Contact #</label
                                >
                                <span
                                    class="ml-2 text-xs text-red-500"
                                    v-if="errors.contact_num"
                                    >{{ errors.contact_num[0] }}</span
                                >
                            </div>
                            <div class="relative w-full">
                                <span
                                    class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500"
                                >
                                    +63
                                </span>
                                <input
                                    class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                    type="text"
                                    placeholder="Contact Number"
                                    v-model="form.contact_num"
                                />
                            </div>
                        </span>
                    </div>

                    <div class="w-full mt-2">
                        <div class="flex inline-block">
                            <label
                                for="address"
                                class="text-xs font-semibold text-gray-600 uppercase"
                                >Address</label
                            >
                            <span
                                class="ml-2 text-xs text-red-500"
                                v-if="errors.address"
                                >{{ errors.address[0] }}</span
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
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                            <input
                                class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                placeholder="Address"
                                v-model="form.address"
                            />
                        </div>
                    </div>

                    <div class="flex inline-block mt-2">
                        <label
                            for="password"
                            class="text-xs font-semibold text-gray-600 uppercase"
                            >password</label
                        >
                        <span
                            class="ml-2 text-xs text-red-500"
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
                            placeholder="Password"
                            v-model="form.password_confirmation"
                            required
                        />
                    </div>
                    <div class="flex mt-1">
                        <p class="text-xs text-gray-500">
                            Your password must be more than 6 characters long,
                            should contain at-least 1 Uppercase, 1 Lowercase, 1
                            Numeric.
                        </p>
                    </div>
                    <div class="flex inline-block mt-2">
                        <label
                            for="confirmpass"
                            class="text-xs font-semibold text-gray-600 uppercase"
                            >Confirm Password</label
                        >
                        <span
                            class="ml-2 text-xs text-red-500"
                            v-if="errors.password_confirmation"
                            >{{ errors.password_confirmation[0] }}</span
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
                            placeholder="Confirm Password"
                            v-model="form.password"
                            required
                        />
                    </div>
                    <div class="flex mt-4 justify-end">
                        <button
                            @click="handleSubmit"
                            :disabled="loading"
                            type="submit"
                            class="flex items-center bg-gray-900 px-12 py-2 text-white rounded font-bold text-lg hover:bg-gray-500 transition duration-300"
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
                <div class="flex justify-start mt-4">
                    <p class="text-xs text-gray-500">
                        By clicking Submit you agree to our
                        <button
                            @click="toggleModal = !toggleModal"
                            class="text-blue-600 hover:text-blue-800 transition duration-300"
                        >
                            terms
                        </button>
                        and
                        <button
                            @click="toggleModal = !toggleModal"
                            class="text-blue-600 hover:text-blue-800 transition duration-300"
                        >
                            conditions.
                        </button>
                    </p>
                </div>
            </div>

            <div class="flex justify-center mt-4">
                <router-link
                    class="flex justify-between inline-block text-lg text-gray-500 cursor-pointer hover:text-black"
                    style="text-decoration:none;"
                    to="/login"
                >
                    Already registered?</router-link
                >
            </div>
            <div
                class="fixed overflow-x-hidden overflow-y-auto inset-0 flex justify-center items-center z-50"
                v-if="toggleModal"
            >
                <div class="relative mx-auto w-auto max-w-2xl">
                    <div class="w-full h-full flex flex-col">
                        <div class="flex justify-end p-2 overflow-hidden">
                            <button @click="toggleModal = false">
                                <svg
                                    class="fill-current h-10 w-10 text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 18 18"
                                >
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                        <div class="flex">
                            <div class="bg-white px-3 py-2">
                                <div class="flex mt-4">
                                    <h2
                                        class="text-gray-800 text-lg font-bold tracking-widest"
                                    >
                                        SAKURA AUTOPARTS TRADING CORPORATION
                                    </h2>
                                </div>
                                <div class="flex mt-2">
                                    <p class="text-gray-600 text-xs">
                                        Notice of Data Privacy Compliance with
                                        Data Privacy Act of 2012 and Its
                                        Implementing Rules and Regulations
                                    </p>
                                </div>
                                <div class="flex mt-10">
                                    <p
                                        class="text-gray-700 text-sm text-justify leading-snug"
                                    >
                                        Sakura AutoParts Trading Corporation is
                                        committed to ensuring the
                                        confidentiality of your information
                                        under Republic Act No. 10173 or the
                                        “Data Privacy Act of 2012” and will
                                        exert reasonable efforts to protect
                                        against its unauthorized use or
                                        disclosure.
                                    </p>
                                </div>
                                <div class="flex mt-10">
                                    <p
                                        class="text-gray-700 text-sm text-justify leading-snug"
                                    >
                                        In compliance with the requirements of
                                        the Data Privacy Act and its
                                        implementing rules and regulations, we
                                        would like to inform you how we handle
                                        and protect the data you provide in the
                                        course of your transaction/s with Sakura
                                        AutoParts Trading Corporations and its
                                        dealers.
                                    </p>
                                </div>
                                <div class="flex mt-10">
                                    <p
                                        class="text-gray-700 text-sm text-justify leading-snug"
                                    >
                                        These data, which include your personal
                                        or sensitive personal information, may
                                        be collected, processed, stored,
                                        updated, or disclosed by Sakura AutoPart
                                        Trading Corporation and its dealers (i)
                                        for legitimate purposes, (ii) to
                                        implement transactions which you
                                        request, allow, or authorize, (iii) to
                                        comply with Sakura AutoParts Trading
                                        Corporation and its dealers’ internal
                                        policies and its reporting obligations
                                        to governmental authorities under
                                        applicable laws.
                                    </p>
                                </div>
                                <div class="flex mt-10 mb-10">
                                    <p
                                        class="text-gray-700 text-sm text-justify leading-snug"
                                    >
                                        By patronizing Sakura AutoParts Trading
                                        Corporation products and services, you
                                        hereby grant your express and continuing
                                        consent to allow us to process your
                                        personal information and use it as may
                                        deem necessary.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                v-if="toggleModal"
                class="absolute z-40 inset-0 opacity-75 bg-black"
            ></div>
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
                contact_num: '',
                address: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            termsState: false,
            validated: false,
            toggleModal: false,
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
            this.loading = true;

            // setTimeout(() => {
            //     this.loading = !true;
            axios
                .post('api/register', {
                    fname: this.form.fname,
                    mname: this.form.mname,
                    lname: this.form.lname,
                    contact_num: this.form.contact_num,
                    address: this.form.address,
                    email: this.form.email,
                    password: this.form.password,
                    password_confirmation: this.form.password_confirmation
                })
                .then(response => {
                    // localStorage.setItem(
                    //     'user',
                    //     JSON.stringify(response.data.user)
                    // );
                    // localStorage.setItem('jwt', response.data.token);

                    // if (localStorage.getItem('jwt') != null) {
                    //     this.$emit('isLogged');
                    //     if (this.$route.params.nextUrl != null) {
                    //         this.$router.push(this.$route.params.nextUrl);
                    //     } else {
                    this.$router.push('/verification/message');
                    //     }
                    // }
                    // console.log(response.data);
                })
                .then(() => {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: 'Your have successfully registered.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
            // }, 2000);
        },
        handleTermState() {
            this.validated = false;
        }
    }
};
</script>

<style></style>
