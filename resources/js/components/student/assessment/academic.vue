<script setup>
import { defineEmits } from 'vue'

const emits = defineEmits(['step'])

const checkStep = value => {
  emits('step', value)
}
</script>

<template>
  <!-- Academic  -->
  <VCard>
    <VCardTitle class="mb-4">
      <h3>
        <strong>
          Academic
        </strong>
      </h3>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <p>
        <strong>
          What subjects will be beneficial for your intended major?
        </strong>
        This area aims to understand better what academic profile you will need when applying to university, as they measure your understanding and analytical skill in specific subjects such as language, mathematics, science, social science, etc.
      </p>
    </VCardText>
    <VCardActions class="justify-space-between">
      <VBtn
        variant="elevated"
        class="ms-3 mb-1 bg-warning"
        @click="checkStep(3)"
      >
        <VIcon icon="bx-chevron-left" />
        <span class="me-2">Academic</span>
      </VBtn>

      <VBtn
        variant="elevated"
        class="me-5 mb-1"
        @click="checkStep(5)"
      >
        <span class="me-2">Writing</span>
        <VIcon icon="bx-chevron-right" />
      </VBtn>
    </VCardActions>
  </VCard>
</template>
