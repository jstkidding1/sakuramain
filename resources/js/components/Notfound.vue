<template>
    <div>
        <div
            class="min-w-screen min-h-screen bg-blue-100 flex items-center p-5 lg:p-20 overflow-hidden relative"
        >
            <div
                class="flex justify-center min-h-full min-w-full rounded-3xl bg-white shadow-xl p-10 lg:p-20 text-gray-800 relative md:flex items-center text-center md:text-left"
            >
                <div class="w-full md:w-1/2">
                    <div class="mb-10 md:mb-20 text-gray-600 font-light">
                        <h1
                            class="font-black uppercase text-3xl lg:text-5xl text-yellow-500 mb-10"
                        >
                            You seem to be lost!
                        </h1>
                        <p>The page you're looking for isn't available.</p>
                        <p>
                            Try searching again or use the Go Back button below.
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <div class="mb-20 md:mb-0">
                            <button
                                @click="$router.go(-1)"
                                class="text-lg font-light outline-none focus:outline-none transform transition-all hover:scale-110 text-yellow-500 hover:text-yellow-600"
                            >
                                Go Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="w-64 md:w-96 h-96 md:h-full bg-blue-200 bg-opacity-30 absolute -top-64 md:-top-96 right-20 md:right-32 rounded-full pointer-events-none -rotate-45 transform"
            ></div>
            <div
                class="w-96 h-full bg-yellow-200 bg-opacity-20 absolute -bottom-96 right-64 rounded-full pointer-events-none -rotate-45 transform"
            ></div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style>
/* .st0 {
    fill: #fff;
}
.st1 {
    fill: #b5dfea;
}
.st2 {
    opacity: 0.55;
    fill: #90cedd;
}
.st3 {
    fill: #d7f0f9;
}
.st4 {
    fill: #0582c1;
}
.st5 {
    fill: #79c9e8;
}
.st6 {
    fill: #ffbf4d;
}
.st7 {
    fill: #00668e;
}
.st8 {
    fill: #05556d;
}
.st9 {
    fill: #f98d3d;
}
.st10 {
    fill: #ed701b;
}
.st11 {
    fill: none;
}
.st12 {
    fill: #efaa3a;
}
.st13 {
    opacity: 0.29;
    fill: #f98d2b;
}
.st14 {
    fill: #49b4d6;
}
.st15 {
    fill: #ff9f50;
}
.st16 {
    fill: #f77e2d;
}
.st17 {
    opacity: 0.55;
    fill: url(#SVGID_1_);
} */
</style>
