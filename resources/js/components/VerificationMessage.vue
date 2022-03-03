<template>
    <div
        class="relative flex flex-col h-screen m-auto justify-center items-center bg-gray-900"
    >
        <div class="absolute">
            <div class="flex justify-center">
                <img
                    :src="'/images/noticeverification.png'"
                    alt=""
                    class="h-24 w-24"
                />
            </div>
            <div class="flex justify-center mt-10">
                <h1 class="text-4xl text-gray-50 font-bold">
                    Your account needs to be verified. Please check your email.
                </h1>
            </div>
            <div class="flex justify-center mt-4">
                <p class="text-xl text-gray-50 font-bold">
                    You will be automatically redirected to login page in
                    {{ timerCount }}.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            timerCount: 7
        };
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
    }
};
</script>

<style></style>
