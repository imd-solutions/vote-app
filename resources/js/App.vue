<script setup>
import NavigationHeader from './components/navigation/Header.vue';
import NavigationFooter from './components/navigation/Footer.vue';
import { useQuery } from "@vue/apollo-composable";
import GET_APPLICATION from './apollo/query/application'

const { result, loading } = useQuery(GET_APPLICATION)

</script>
<template> 
    <div v-if="loading" class="w-full h-full fixed top-0 left-0 bg-white opacity-85 z-50">
        <div class="flex justify-center items-center mt-[50vh]">
            Processing...
        </div>
    </div>
    <div class="container mx-auto space-y-2 items-center mx-auto p-4">
        <div class="flex flex-col h-screen justify-between">
            <NavigationHeader />
            <RouterView class="mb-auto h-full"/>
            <NavigationFooter v-if="result && result.application" :data="result.application"/>
        </div>       
    </div>
    
</template>