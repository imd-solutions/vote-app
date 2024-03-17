<script setup>
defineProps({
  data: Object
})
</script>

<template>
    <footer class="h-10">Version: {{ data.version }} Name: {{  data.name }}</footer>
</template>
