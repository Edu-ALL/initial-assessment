<script setup>
import { defineEmits } from 'vue'

const emits = defineEmits(['step'])

const checkStep = value => {
  emits('step', value)
}

const tickLabels = ref ({
  0: '1',
  1: '2',
  2: '3',
  3: '4',
  3: '5',
})

const submit = () => {
  console.log('submit')
}
</script>

<template>
  <!-- Writing  -->
  <VCard>
    <VCardTitle class="mb-4">
      <h3>
        <strong>
          Writing
        </strong>
      </h3>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <p>
        <strong>
          How well can you explain yourself through writing?
        </strong>
        This area aims to prepare you on what will be expected of your university application essays, as they are the one way you get to show the university who you are beyond your academics—what your interests are, what your personality is like, and why you're a great fit for them.
      </p>

      <ol
        type="1"
        class="ms-5"
      >
        <!-- Question 1 -->
        <li class="my-5">
          What curriculum does your school use?
          <span style="color:red">*</span>
          <VSelect
            label="Answer"
            density="compact"
            closable-chips
            chips
            multiple
            class="mt-3"
          />
        </li>

        
        <li class="my-5">
          What curriculum does your school use?
          <span style="color:red">*</span>
          <VRow>
            <VCol cols="4">
              <VSlider
                :max="3"
                :ticks="tickLabels"
                show-ticks="always"
                step="1"
                tick-size="4"
              />
            </VCol>
          </VRow>
        </li>
      </ol>
    </VCardText>
    <VCardActions class="justify-space-between">
      <VBtn
        variant="elevated"
        class="ms-3 mb-1 bg-warning"
        @click="checkStep(4)"
      >
        <VIcon icon="bx-chevron-left" />
        <span class="me-2">Writing</span>
      </VBtn>

      <VBtn
        variant="elevated"
        class="me-5 mb-1"
        @click="checkStep(6)"
      >
        <span class="me-2">Submit</span>
        <VIcon icon="bx-chevron-right" />
      </VBtn>
    </VCardActions>
  </VCard>
</template>
