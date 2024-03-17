<template>
    <nav class="bg-white border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap justify-between">
            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <img
                    :src="logo"
                    class="h-32 sm:h-16"
                    alt="Logo"
                />
                <span class="hidden self-center text-2xl font-semibold whitespace-nowrap sm:block">Movie Vote</span>
            </div>
            <button
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-default"
                aria-expanded="false"
                @click="menuBar = !menuBar"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
            <div
                class="w-full md:block md:w-auto"
                id="navbar-default"
                :class="menuBar ? 'hidden' : ''"
            >
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                    
                    <li>
                        <router-link
                            to="/"
                            href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#F40142] md:p-0"
                            >Movies
                        </router-link>    
                    </li>
                    <li>
                        <router-link
                            to="/auth/login"
                            type="button"
                            class="w-full text-white bg-[#3CACFF] hover:bg-[#F40142] focus:ring-4 focus:outline-none focus:ring-red-600 font-medium rounded-lg text-sm px-4 py-2 text-center"
                        >
                            Login
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref } from 'vue';
import logo from './../../../images/logo.png'

const menuBar = ref(true);
</script>
