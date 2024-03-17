<template> 
    <div class="container mx-auto space-y-2 items-center justify-between mx-auto p-4">
        <Navigation />
        <RouterView />
    </div>
</template>

<script setup>
import Navigation from './components/navigation/Header.vue';
import { useQuery } from "@vue/apollo-composable";
import GET_APPLICATION from './apollo/query/application'

const { results } = useQuery(GET_APPLICATION)

</script>