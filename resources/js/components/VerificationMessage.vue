<template>
    <div class="flex flex-col min-h-screen justify-center items-center">
        <div class="text-4xl text-gray-700">
            Your account needs to be verified. Please be patient.
        </div>
        <div class="text-4xl text-gray-700">Thank you</div>
        <p class="text-lg text-gray-500">
            You should be automatically redirected to login page in
            <span class="font-bold text-gray-900">{{ timerCount }}</span>
            seconds.
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            timerCount: 5
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
