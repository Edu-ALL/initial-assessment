<script setup>
import { defineEmits } from 'vue'

const emits = defineEmits(['step'])

const checkStep = value => {
  emits('step', value)
}
</script>

<template>
  <!-- Exploration  -->
  <VCard>
    <VCardTitle class="mb-4">
      <h3>
        <strong>
          Exploration
        </strong>
      </h3>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <p>
        <strong>
          How well have you explored yourself?
        </strong>
        This area aims to understand your personality, values, interests, and skills/aptitudes that will help you develop your career plan and decide what is best for your future!
      </p>
    </VCardText>
    <VCardActions class="justify-space-between">
      <VBtn
        variant="elevated"
        class="ms-3 mb-1 bg-warning"
        @click="checkStep(1)"
      >
        <VIcon icon="bx-chevron-left" />
        <span class="me-2">Back</span>
      </VBtn>

      <VBtn
        variant="elevated"
        class="me-5 mb-1"
        @click="checkStep(3)"
      >
        <span class="me-2">Profile Building</span>
        <VIcon icon="bx-chevron-right" />
      </VBtn>
    </VCardActions>
  </VCard>
</template>
