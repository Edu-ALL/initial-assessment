<script setup>
import { defineEmits } from 'vue'

const emits = defineEmits(['step'])

const checkStep = value => {
  emits('step', value)
}
</script>

<template>
  <!-- Intro  -->
  <VCard style="border-bottom:10px solid rgb(var(--v-theme-primary))">
    <VCardTitle class="mb-2">
      <h3 class="text-wrap text-xl text-md-h5 mt-4">
        <strong>
          Initial Assessment
        </strong>
      </h3>
    </VCardTitle>
    <VCardText>
      <p>
        Hey there! 🎓  Wondering if you're all set for the university application journey? This quiz is your personal launchpad to getting university-ready and we're here to help you figure out if you're ready to dive in. 
      </p>
      <ul class="ps-5 mb-4">
        <li>
          Read each question at your own pace.
        </li>
        <li>
          Be super honest with your answers – go with what feels right.
        </li>
        <li>
          If you hit a question that makes you go 🤔, pick the answer that's closest to your gut feeling.
        </li>
      </ul>
      <p>
        Ready to explore? Let's find out what you're rocking at and where you can level up. Let’s get started!
      </p>
    </VCardText>
    <VCardActions class="justify-end">
      <VBtn
        variant="elevated"
        class="me-5 mb-1 bg-success"
        @click="checkStep(2)"
      >
        <span class="me-2">Next</span>
        <VIcon icon="bx-chevron-right" />
      </VBtn>
    </VCardActions>
  </VCard> 
</template>
