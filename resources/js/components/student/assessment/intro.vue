<script setup>
import { defineEmits } from 'vue'

const emits = defineEmits(['step'])

const checkStep = value => {
  emits('step', value)
}
</script>

<template>
  <!-- Intro  -->
  <VCard style="border-bottom:10px solid #0000FF">
    <VCardTitle class="mb-4">
      <h3 class="text-wrap text-xl text-md-h5 mt-4">
        <strong>
          Initial Assessment
        </strong>
      </h3>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <p>
        Do you have what it takes to get into your uni of choice? Let's find out!
      </p>
      <p>
        Hey there! 🎓  Wondering if you're all set for the long university application journey? You're in the right spot! We're here to help you figure out if you're ready to dive in. This isn't your typical quiz. It's more like a fun, no-pressure check-in to see how ready you are.
      </p>
      <p>
        Take a moment to think about where you stand with your schoolwork, hobbies, profile-building and how confident you feel about expressing your ideas on paper as each aspect will be important for admissions!
        Here's how it goes:
      </p>
      <ul class="ps-5 mb-3">
        <li>
          Chill and read each question at your own pace.
        </li>
        <li>
          Be super honest with your answers – just go with what feels right.
        </li>
        <li>
          If you hit a question that makes you go 🤔, pick the answer that's closest to your gut feeling.
        </li>
      </ul>
      <p>
        This quiz is your personal launchpad to getting university-ready. So, let's find out what you're rocking at and where you can level up. Ready to explore? Let’s get started!
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
