<template>
    <div class="container">
        <div class="grid grid-cols-2 gap-4 pt-2 px-3 mt-2">
            <label class="w-full font-bold text-md">Phone Number </label>
            <label class="w-full font-bold text-md">Address </label>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="px-3">
                <div class="relative w-full">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-2"
                    >
                        <p class="text-gray-500 text-md font-bold">
                            +63
                        </p>
                    </span>
                    <input
                        class="w-full focus:bg-white border-2 border-gray-200 py-2 pl-10 rounded outline-none focus:border-gray-800 transition duration-150"
                        type="text"
                        placeholder="Phone Number"
                        v-model="user.contact_num"
                        disabled
                    />
                </div>
            </div>
            <div class="pr-3">
                <input
                    class="w-full focus:bg-white border-2 border-gray-200 p-2 rounded outline-none focus:border-gray-800 transition duration-150"
                    type="text"
                    placeholder="Address"
                    v-model="user.address"
                    disabled
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: []
        };
    },
    beforeMount() {
        this.getUser();
        this.getAdmin();
    },
    methods: {
        getUser() {
            this.userB = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer ' + localStorage.getItem('jwt');
        },
        getAdmin() {
            axios.get(`/api/users/${this.$route.params.id}`).then(response => {
                this.user = response.data;
                console.log(response.data);
            });
        }
    }
};
</script>

<style></style>
