<script setup>
import DefaultLayoutAdmin from './components/DefaultLayoutAdmin.vue'
</script>

<template>
  <DefaultLayoutAdmin>
    <RouterView />
  </DefaultLayoutAdmin>
</template>

<style lang="scss">
// As we are using `layouts` plugin we need its styles to be imported
@use "@layouts/styles/default-layout";
</style>
