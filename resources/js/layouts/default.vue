<script setup>
import DefaultLayoutStudent from './components/DefaultLayoutStudent.vue'
</script>

<template>
  <DefaultLayoutStudent>
    <RouterView />
  </DefaultLayoutStudent>
</template>

<style lang="scss">
// As we are using `layouts` plugin we need its styles to be imported
@use "@layouts/styles/default-layout";
</style>
