<template>
    <div class="container">
        <div class="flex flex-col h-screen">
            <div class="flex justify-center">
                <div class="bg-white w-1/2 rounded shadow-md p-2 mt-10">
                    <div class="flex py-3 px-3 mb-10">
                        <div class="w-full flex justify-between">
                            <div class="flex inline-block">
                                <router-link
                                    to="/manager/category/list"
                                    style="text-decoration:none;"
                                    class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                                >
                                    Return to Previous Page
                                </router-link>
                            </div>
                            <div class="flex items-center">
                                <router-link
                                    to="/manager/category/list"
                                    style="text-decoration:none;"
                                    class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                                >
                                    Category List
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
                                        name: 'manager-view-category',
                                        params: { id: category.id }
                                    }"
                                    style="text-decoration:none"
                                    class="text-xs text-gray-700 hover:text-yellow-700 transition duration-300"
                                    >{{ category.name }}</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <img
                            :src="`/images/${category.image}`"
                            class="h-72 w-72"
                            alt=""
                        />
                    </div>
                    <div class="px-10">
                        <div class="flex">
                            <label
                                class="block text-sm font-medium text-gray-700"
                                >Name</label
                            >
                        </div>
                        <div class="flex mb-10">
                            <input
                                class="w-full focus:bg-white border-2 border-gray-400 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                                type="text"
                                v-model="category.name"
                                disabled
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            category: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getCategory();
    },
    methods: {
        getUser() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getCategory() {
            axios
                .get(`/api/category/${this.$route.params.id}`)
                .then(response => {
                    this.category = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style></style>
