<template> 
    <div class="container mx-auto space-y-2 items-center justify-between mx-auto p-4">
        <Navigation />
        <RouterView />
    </div>
</template>

<script setup>
import Navigation from './components/navigation/Header.vue';

</script>