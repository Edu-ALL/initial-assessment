<script setup>
import { defineEmits } from 'vue'

const emits = defineEmits(['step'])

const checkStep = value => {
  emits('step', value)
}
</script>

<template>
  <!-- Profile Building  -->
  <VCard>
    <VCardTitle class="mb-4">
      <h3>
        <strong>
          Profile Building
        </strong>
      </h3>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <p>
        <strong>
          Let’s see how many activities you’ve joined!
        </strong>
        This area aims to educate you on the importance of building your unique strengths and accumulating experiences, making you stand out in a competitive landscape and setting the stage for your success beyond high school! 
      </p>
    </VCardText>
    <VCardActions class="justify-space-between">
      <VBtn
        variant="elevated"
        class="me-5 mb-1 bg-warning"
        @click="checkStep(2)"
      >
        <VIcon icon="bx-chevron-left" />
        <span class="me-2">Profile Building</span>
      </VBtn>

      <VBtn
        variant="elevated"
        class="me-5 mb-1"
        @click="checkStep(4)"
      >
        <span class="me-2">Academic</span>
        <VIcon icon="bx-chevron-right" />
      </VBtn>
    </VCardActions>
  </VCard>
</template>
