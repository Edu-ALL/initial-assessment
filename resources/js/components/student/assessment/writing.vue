<script setup>
import { rules } from '@/helper/rules'
import { defineEmits } from 'vue'

const emits = defineEmits(['step'])

const formData = ref()

const checkStep = value => {
  emits('step', value)
}

const tickLabels = ref ({
  0: '1',
  1: '2',
  2: '3',
  3: '4',
  4: '5',
})

const inputData = ref(
  [
    {
      answer: [],
    },
    {
      answer: [{
        id: null,
        question_id: 18,
        sub_question_id: null,
        answer_descriptive: "",
      }],
    },
    {
      answer: [{
        id: null,
        question_id: 19,
        sub_question_id: null,
        answer_descriptive: "",
      }],
    },
    {
      answer: [{
        id: null,
        question_id: 20,
        sub_question_id: 24,
        answer_descriptive: "",
      }],
    },
    {
      answer: [{
        id: null,
        question_id: 20,
        sub_question_id: 25,
        answer_descriptive: "",
      }],
    },
    {
      answer: [{
        id: null,
        question_id: 20,
        sub_question_id: 26,
        answer_descriptive: "",
      }],
    },
  ],
)

const submit = async () => {
  const { valid } = await formData.value.validate()

  if (valid) {
    console.log(inputData.value) 
    checkStep(6)
  }
}
</script>

<template>
  <!-- Writing  -->
  <VCard>
    <VForm
      ref="formData"
      validate-on="input"
      fast-fail
      @submit.prevent="submit"
    >
      <VCardTitle class="mb-4">
        <h3>
          <strong>
            Writing
          </strong>
        </h3>
        <VDivider />
      </VCardTitle>
      <VCardText>
        <div class="bg-primary px-3 py-3 rounded">
          <h3 class="text-white mb-3">
            How well can you explain yourself through writing?
          </h3>
          <p class="mb-0">
            This area aims to prepare you on what will be expected of your university application essays, as they are the one way you get to show the university who you are beyond your academics—what your interests are, what your personality is like, and why you're a great fit for them.
          </p>
        </div>

        <ol
          type="1"
          class="ms-5"
        >
          <!-- Question 1 -->
          <li class="my-5">
            What writing activities do you most often do at school? Choose 3 options.
            <VSelect
              v-model="inputData[0].answer"
              label="Answer"
              density="compact"
              closable-chips
              chips
              multiple
              class="mt-3"
            />
          </li>

          <!-- Question 2  -->
          <li class="my-5">
            How confident are you in expressing yourself through non-academic writing (such as stories, journals)?
            <span style="color:red">*</span>
            <VRow>
              <VCol cols="4">
                <VSlider
                  v-model="inputData[1].answer[0].answer_descriptive"
                  :max="4"
                  :ticks="tickLabels"
                  show-ticks="always"
                  step="1"
                  tick-size="5"
                  class="mt-3"
                  :rules="rules.required"
                />
              </VCol>
            </VRow>
          </li>

          <!-- Question 3  -->
          <li class="my-5">
            How confident are you in expressing yourself through academic writing (such as essays and journals)?
            <span style="color:red">*</span>
            <VRow>
              <VCol cols="4">
                <VSlider
                  v-model="inputData[2].answer[0].answer_descriptive"
                  :max="4"
                  :ticks="tickLabels"
                  show-ticks="always"
                  step="1"
                  tick-size="5"
                  class="mt-3"
                  :rules="rules.required"
                />
              </VCol>
            </VRow>
          </li>

          <!-- Question 4  -->
          <li class="my-5">
            Have you done any of these activities related to writing?
            <ol
              type="I"
              class="ms-4"
            >
              <li class="my-3">
                Competitions
                <VTextarea
                  v-model="inputData[3].answer[0].answer_descriptive"
                  density="compact"
                  label="Answer"
                  class="mt-3"
                />
              </li>
              <li class="my-3">
                Workshops
                <VTextarea
                  v-model="inputData[4].answer[0].answer_descriptive"
                  density="compact"
                  label="Answer"
                  class="mt-3"
                />
              </li>
              <li class="my-3">
                Self-writing (journals, stories, etc.)
                <VTextarea
                  v-model="inputData[5].answer[0].answer_descriptive"
                  density="compact"
                  label="Answer"
                  class="mt-3"
                />
              </li>
            </ol>
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
          type="submit"
        >
          <span class="me-2">Submit</span>
          <VIcon icon="bx-chevron-right" />
        </VBtn>
      </VCardActions>
    </VForm>
  </VCard>
</template>
