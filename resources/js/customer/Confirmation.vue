<template>
    <div class="flex h-screen">
        <div class="m-auto">
            <h1 class="text-7xl text-gray-700 font-bold">
                Thank you {{ user.fname }}!
            </h1>
            <div class="flex mt-4">
                <p class="text-xl text-gray-700">
                    The staff will coordinate of your orders.
                </p>
            </div>
            <div class="flex mt-4">
                <p class="text-md text-gray-700">
                    For more questions you can send a message at our facebook
                    page
                    <a
                        href="https://www.facebook.com/pages/category/Automotive-Parts-Store/Sakura-Auto-Parts-Trading-1412649018771591/"
                        style="text-decoration:none;"
                        class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                    >
                        Sakura Auto Parts Trading.
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: null
        };
    },
    beforeMount() {
        this.getUser();
    },
    methods: {
        getUser() {
            if (localStorage.getItem('jwt') != null) {
                this.user = JSON.parse(localStorage.getItem('user'));
                axios.defaults.headers.common['Content-Type'] =
                    'application/json';
                axios.defaults.headers.common['Authorization'] =
                    'Bearer ' + localStorage.getItem('jwt');
            }
        }
    }
};
</script>
<style scoped>
.medium-text {
    font-size: 36px;
}
.small-link {
    font-size: 24px;
    text-decoration: underline;
    color: #777;
}
.product-box {
    border: 1px solid #cccccc;
    padding: 10px 15px;
}
.hero-section {
    height: 80vh;
    align-items: center;
    margin-bottom: 20px;
    margin-top: -20px;
}
.title {
    font-size: 60px;
}
</style>
