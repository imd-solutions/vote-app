<template>
    <section class="overflow-hidden" style="">
        <div class="container px-4 mx-auto">
            <div class="flex items-center justify-between py-6">
                <div class="flex items-center gap-10">
                    <a href="#"> </a>
                    <ul class="hidden lg:flex items-center gap-8">
                        <li
                            class="hover:text-opacity-70 transition duration-200"
                        >
                            <a href="#">Movies</a>
                        </li>
                    </ul>
                </div>
                <div class="hidden lg:flex gap-4">
                    <a
                        class="py-3 px-5 rounded-full border border-gray-200 shadow text-sm font-semibold hover:bg-gray-50 focus:ring focus:ring-orange-200 transition duration-200"
                        href="#"
                        >Login</a
                    >
                    <a
                        class="py-3 px-5 rounded-full bg-orange-500 border border-orange-600 shadow text-sm font-semibold text-white hover:bg-orange-600 focus:ring focus:ring-orange-200 transition duration-200"
                        href="#"
                        >Register</a
                    >
                </div>
            </div>
            <div
                class="hidden navbar-menu fixed top-0 left-0 bottom-0 w-4/6 sm:max-w-xs z-50"
            >
                <div
                    class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-80"
                ></div>
                <nav
                    class="relative z-10 px-9 py-8 h-full overflow-y-auto bg-white flex flex-col justify-between"
                >
                    <div class="flex items-center justify-between">
                        <a href="#"> </a>
                        <a class="navbar-burger" href="#">
                            <svg
                                width="24"
                                height="24"
                                viewbox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M6 18L18 6M6 6L18 18"
                                    stroke="#111827"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>
                        </a>
                    </div>
                    <ul class="flex flex-col gap-12 py-12">
                        <li
                            class="hover:text-opacity-70 transition duration-200"
                        >
                            <a href="#">Features</a>
                        </li>
                    </ul>
                    <div class="flex flex-col items-center gap-6">
                        <a
                            class="w-full text-center py-3 px-5 rounded-full border border-gray-200 shadow text-sm font-semibold hover:bg-gray-50 focus:ring focus:ring-orange-200 transition duration-200"
                            href="#"
                            >Login</a
                        ><a
                            class="w-full text-center py-3 px-5 rounded-full bg-orange-500 border border-orange-600 shadow text-sm font-semibold text-white hover:bg-orange-600 focus:ring focus:ring-orange-200 transition duration-200"
                            href="#"
                            >Register</a
                        >
                    </div>
                </nav>
            </div>
        </div>
    </section>
</template>

<script setup></script>
