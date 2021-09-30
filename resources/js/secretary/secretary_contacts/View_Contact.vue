<template>
    <div class="container">
        <div class="flex justify-center">
            <div class="bg-white w-2/5 rounded shadow-md mt-10 h-full">
                <div class="flex py-3 px-3">
                    <div class="w-full flex justify-between">
                        <div class="flex inline-block">
                            <router-link
                                to="/secretary/contact/list"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Return to Previous Page
                            </router-link>
                        </div>
                        <div class="flex items-center">
                            <router-link
                                to="/secretary/contact/list"
                                style="text-decoration:none;"
                                class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                            >
                                Contact List
                            </router-link>
                            <svg
                                class="fill-current text-xs w-3 h-3 mx-3"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512"
                            >
                                <path
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                />
                            </svg>
                            <router-link
                                :to="{
                                    name: 'secretary-view-contact',
                                    params: { id: contact.id }
                                }"
                                style="text-decoration:none"
                                class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                >{{ contact.name }}</router-link
                            >
                        </div>
                    </div>
                </div>
                <form>
                    <div class="flex px-3 py-2 mt-4">
                        <h1 class="text-gray-700 font-bold text-lg">
                            Personal Information
                        </h1>
                    </div>
                    <div class="flex py-2 px-3 mt-2 space-x-2">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Name:
                        </p>
                        <p class="w-full text-md text-gray-700">
                            {{ contact.name }}
                        </p>
                    </div>
                    <div class="flex px-3 py-2 space-x-2">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Email:
                        </p>
                        <p class="w-full text-md text-gray-700">
                            {{ contact.email }}
                        </p>
                    </div>
                    <div class="flex px-3 py-2 space-x-2">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Message:
                        </p>
                        <p class="w-full text-md text-gray-700">
                            {{ contact.message }}
                        </p>
                    </div>
                    <div class="flex py-2 px-3 space-x-2">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Submitted at:
                        </p>
                        <p class="w-full text-md text-gray-700">
                            {{ contact.created_at | date }}
                        </p>
                    </div>
                    <div class="flex items-center py-2 px-3 space-x-2">
                        <p class="w-full text-md text-gray-700 font-bold">
                            Status:
                        </p>
                        <select
                            class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                            v-model="contact.status"
                        >
                            <option value="Pending">Pending</option>
                            <option value="Called">Called</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="flex px-3 py-2 mt-10 mb-20">
                        <div class="flex justify-start">
                            <button
                                @click.prevent="updateContact"
                                :disabled="loading"
                                class="flex items-center bg-yellow-700 px-3 py-2 text-lg text-white rounded font-bold text-md hover:bg-yellow-600 transition duration-300"
                            >
                                <svg
                                    v-if="loading"
                                    class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 mr-2"
                                    style="border-right-color: white; border-top-color: white;"
                                    viewBox="0 0 24 24"
                                ></svg>
                                <span v-if="loading">Please wait..</span>
                                <span v-else>Update</span>
                            </button>
                            <button
                                @click="$router.go(-1)"
                                class="flex items-center border-2 border-gray-500 px-3 py-2 text-lg text-gray-500 rounded font-bold text-md hover:bg-gray-600 hover:text-gray-50 ml-2 transition duration-300"
                            >
                                <span>Cancel</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    data() {
        return {
            user: null,
            loading: false,
            errors: [],
            contact: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getContact();
    },
    filters: {
        date(value) {
            if (value) {
                return moment(String(value)).fromNow();
            }
        }
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getContact() {
            axios
                .get(`/api/contacts/${this.$route.params.id}`)
                .then(response => {
                    this.contact = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        updateContact() {
            this.loading = !false;

            setTimeout(() => {
                this.loading = !true;
                axios
                    .put(`/api/contacts/${this.$route.params.id}`, this.contact)
                    .then(() => {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Status has successfully updated.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            this.$router.push({ name: 'secretary-contacts' });
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
