<template>
    <div
        class="relative flex flex-col h-screen m-auto justify-center items-center"
    >
        <div class="absolute">
            <div class="flex justify-center">
                <img
                    :src="'/images/checkverified.png'"
                    alt=""
                    class="h-24 w-24"
                />
            </div>
            <div class="flex justify-center mt-10">
                <h1 class="text-4xl text-gray-900 font-bold">
                    Your email address has been verified.
                </h1>
            </div>
            <div class="flex justify-center mt-4">
                <p class="text-xl text-gray-900 font-bold">
                    You will be redirected to login page in {{ timerCount }}.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            token: null,
            timerCount: 7
        };
    },
    beforeMount() {
        this.getAuthenticate();
    },
    created() {
        this.verifyEmail(this.$route.query);
    },
    watch: {
        timerCount: {
            handler(value) {
                if (value > 0) {
                    setTimeout(() => {
                        this.timerCount--;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.$router.push({ path: '/login' });
                    }, 1000);
                }
            },
            immediate: true
        }
    },
    methods: {
        getAuthenticate() {
            this.user = JSON.parse(localStorage.getItem('user'));
            axios.defaults.headers.common['Content-Type'] = 'application/json';
            axios.defaults.headers.common['Authorization'] =
                'Bearer' + localStorage.getItem('jwt');
        },
        verifyEmail(ctx, payload) {
            // console.log(ctx);
            axios
                .get(`/api/email-verification/`, { params: ctx })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>

<style></style>
