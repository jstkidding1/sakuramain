<template>
    <div class="container w-1/3 mt-10">
        <div class="w-full flex justify-start">
            <div class="flex inline-block">
                <button
                    @click="$router.go(-1)"
                    class="text-gray-600 text-xs hover:text-yellow-600 transition duration-300"
                >
                    Return to Previous Page
                </button>
            </div>
        </div>
        <div class="flex justify-start mt-10">
            <h1 class="text-4xl text-gray-800 font-bold">
                Terms and Conditions
            </h1>

            <!-- <img :src="terms" alt="terms" class="float-right" /> -->
        </div>
        <hr class="my-4" />
        <div class="w-full bg-white shadow-md px-3 py-4">
            <div class="flex justify-center">
                <img :src="terms" class="h-52 w-52 object-cover" />
            </div>
            <div class="flex mt-4">
                <h2 class="text-gray-800 text-lg font-bold tracking-widest">
                    SAKURA AUTOPARTS TRADING CORPORATION
                </h2>
            </div>
            <div class="flex mt-2">
                <p class="text-gray-600 text-xs">
                    Notice of Data Privacy Compliance with Data Privacy Act of
                    2012 and Its Implementing Rules and Regulations
                </p>
            </div>
            <div class="flex mt-10">
                <p class="text-gray-700 text-sm text-justify leading-snug">
                    Sakura AutoParts Trading Corporation is committed to
                    ensuring the confidentiality of your information under
                    Republic Act No. 10173 or the “Data Privacy Act of 2012” and
                    will exert reasonable efforts to protect against its
                    unauthorized use or disclosure.
                </p>
            </div>
            <div class="flex mt-10">
                <p class="text-gray-700 text-sm text-justify leading-snug">
                    In compliance with the requirements of the Data Privacy Act
                    and its implementing rules and regulations, we would like to
                    inform you how we handle and protect the data you provide in
                    the course of your transaction/s with Sakura AutoParts
                    Trading Corporations and its dealers.
                </p>
            </div>
            <div class="flex mt-10">
                <p class="text-gray-700 text-sm text-justify leading-snug">
                    These data, which include your personal or sensitive
                    personal information, may be collected, processed, stored,
                    updated, or disclosed by Sakura AutoPart Trading Corporation
                    and its dealers (i) for legitimate purposes, (ii) to
                    implement transactions which you request, allow, or
                    authorize, (iii) to comply with Sakura AutoParts Trading
                    Corporation and its dealers’ internal policies and its
                    reporting obligations to governmental authorities under
                    applicable laws.
                </p>
            </div>
            <div class="flex mt-10">
                <p class="text-gray-700 text-sm text-justify leading-snug">
                    By patronizing Sakura AutoParts Trading Corporation products
                    and services, you hereby grant your express and continuing
                    consent to allow us to process your personal information and
                    use it as may deem necessary.
                </p>
            </div>
            <div class="flex mt-10">
                <p class="text-gray-700 text-sm text-justify leading-snug">
                    Should you also wish to access, update, or correct certain
                    personal information, or withdraw consent to the use of any
                    of your information as set out in this letter, you may
                    communicate with us through
                    <a
                        href="https://www.facebook.com/pages/category/Automotive-Parts-Store/Sakura-Auto-Parts-Trading-1412649018771591/"
                        style="text-decoration:none;"
                        class="text-yellow-600 hover:text-yellow-900 transition duration-300"
                        >Sakura Auto Parts Tading Facebook Page</a
                    >.
                </p>
            </div>
        </div>
        <!-- <div class="grid grid-flow-row">
            <h2 class="text-4xl font-extrabold justify-self-center p-8">
                SAKURA AUTOPARTS TRADING CORPORATION
            </h2>
            <h3 class="text-xl font-extrabold justify-self-center p-2">
                Notice of Data Privacy Compliance with Data Privacy Act of 2012
                and Its Implementing Rules and Regulations
            </h3>
            <p class="p-2">
                Sakura AutoParts Trading Corporation is committed to ensuring
                the confidentiality of your information under Republic Act No.
                10173 or the “Data Privacy Act of 2012” and will exert
                reasonable efforts to protect against its unauthorized use or
                disclosure.
            </p>
            <p class="p-2">
                In compliance with the requirements of the Data Privacy Act and
                its implementing rules and regulations, we would like to inform
                you how we handle and protect the data you provide in the course
                of your transaction/s with Sakura AutoParts Trading Corporations
                and its dealers.
            </p>
            <p class="p-2">
                These data, which include your personal or sensitive personal
                information, may be collected, processed, stored, updated, or
                disclosed by Sakura AutoPart Trading Corporation and its dealers
                (i) for legitimate purposes, (ii) to implement transactions
                which you request, allow, or authorize, (iii) to comply with
                Sakura AutoParts Trading Corporation and its dealers’ internal
                policies and its reporting obligations to governmental
                authorities under applicable laws.
            </p>
            <p class="p-2">
                By patronizing Sakura AutoParts Trading Corporation products and
                services, you hereby grant your express and continuing consent
                to allow us to process your personal information and use it as
                may deem necessary.
            </p>
            <p class="p-2">
                Should you also wish to access, update, or correct certain
                personal information, or withdraw consent to the use of any of
                your information as set out in this letter, you may communicate
                with us through
                <a
                    href="https://www.facebook.com/pages/category/Automotive-Parts-Store/Sakura-Auto-Parts-Trading-1412649018771591/"
                    >Sakura Auto Parts Tading Facebook Page</a
                >.
            </p>
            <p class="p-2">Thank you for your continued patronage.</p>
        </div> -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            terms: '/images/Terms.png'
        };
    }
};
</script>
