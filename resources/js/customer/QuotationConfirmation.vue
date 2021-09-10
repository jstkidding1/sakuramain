<template>
    <div class="container mt-56">
        <!-- <img :src="thanks" alt="thanks" /> -->
        <div class="m-auto">
            <h1 class="text-7xl text-gray-700 font-bold">
                Thank you {{ user.fname }}!
            </h1>
            <div class="grid grid-col mt-4">
                <p class="text-xl text-gray-700">
                    Our team is working hard to help you, please give us a
                    little time to release a quotation for you. To view your
                    quotation
                    <a
                        href="/dashboard/quotations"
                        style="text-decoration:none;"
                        class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                    >
                        Click here.
                    </a>
                </p>
                <p class="text-xl text-gray-700 italic mt-10">
                    You can be updated regarding the status of your parcel in
                    the "Quotation" page
                </p>
            </div>
            <div class="flex mt-4">
                <p class="text-md text-gray-700">
                    If you want to know more about Sakura and for more questions
                    you can send a message or visit us at our facebook page
                    <a
                        href="https://www.facebook.com/pages/category/Automotive-Parts-Store/Sakura-Auto-Parts-Trading-1412649018771591/"
                        style="text-decoration:none;"
                        class="text-yellow-600 hover:text-yellow-800 transition duration-300"
                    >
                        Sakura Auto Parts Trading.
                    </a>
                </p>
            </div>

            <div class="p-16">
                <h1 class="text-xs font font-bold">
                    Wanna visit our store? No problem! Always follow the safety
                    protocol:
                </h1>
            </div>
            <div class="flex justify-between">
                <div>
                    <label class="flex justify-center font-bold"
                        >WEAR MASK</label
                    >
                    <img
                        :src="Mask"
                        alt="hygiene protocol 1"
                        class="transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                    />
                </div>
                <div>
                    <label class="flex justify-center font-bold"
                        >SOCIAL DISTANCING</label
                    >
                    <img
                        :src="SocialDistancing"
                        alt="hygiene protocol 2"
                        class="transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                    />
                </div>
                <div>
                    <label class="flex justify-center font-bold"
                        >AVOID COUGHING IN PUBLIC</label
                    >
                    <img
                        :src="Coughing"
                        alt="hygiene protocol 3"
                        class="transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                    />
                </div>
                <div>
                    <label class="flex justify-center font-bold"
                        >SANITIZE</label
                    >
                    <img
                        :src="Sanitize"
                        alt="hygiene protocol 4"
                        class="transform transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-75"
                    />
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
            thanks: '/images/Thanks.png',
            SocialDistancing: '/images/SocialDistancing.png',
            Coughing: '/images/Coughing.png',
            Mask: '/images/FaceMask.png',
            Sanitize: '/images/Soap.png'
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
