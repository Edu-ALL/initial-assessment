<script setup>
import { confirmBeforeSubmit, showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import ApiService from '@/services/ApiService'
import { defineEmits, watch } from 'vue'

const emits = defineEmits(['step'])

const options = ref()
const formData = ref()
const loading = ref(false)

const checkStep = value => {
  emits('step', value)
}

const getAnswer = async () => {
  try {
    const res = await ApiService.get('answer/4')

    if (res.success && res.data.length>0) {
      inputData.value = res.data
    }
  } catch (error) {
    console.error(error)
  }
}

const getOptions =  async() => {
  const endpoint = 'question/4'
  try {
    const res = await ApiService.get(endpoint)
    if (res.success) {
      options.value = res.data
    }
  } catch (error) {
    console.error(error)
  }
}

const tickLabels = ref ({
  0: '0',
  1: '1',
  2: '2',
  3: '3',
  4: '4',
  5: '5',
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
        score: null,
      }],
    },
    {
      answer: [{
        id: null,
        question_id: 19,
        sub_question_id: null,
        answer_descriptive: "",
        score: null,
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

const itemProps = item => {
  return {
    title: item.option_answer,
    subtitle: item.title_of_answer,
  }
}

const submit = async () => {
  const { valid, errors } = await formData.value.validate()

  if (valid) {
    handleSubmit()
  } else {
    const element = document.getElementById(errors[0].id)
    
    element.focus()
  }
}

const handleSubmit = async () => {
  const confirmed = await confirmBeforeSubmit('Are you sure you want to submit your answers?')
  if(confirmed) {
    loading.value = true
    try {
      const res = await ApiService.post('answer/4', inputData.value)
      if(res.success) {
        checkStep(6)
      } else {
        showNotif('error', res.message, 'bottom-end')
      }
      loading.value = false
    } catch (error) {
      showNotif('error', error, 'bottom-end')
      loading.value = false
    }
  }
}

watch(() => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  })
  getOptions()
  getAnswer()
})
</script>

<template>
  <!-- Writing  -->
  <VCard>
    <VForm
      ref="formData"
      validate-on="input"
      fast-fail
      :disabled="loading"
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
        <VCard
          style="border-left:4px solid rgb(var(--v-theme-primary))"
          class="mb-4"
        >
          <VCardText>
            <h3 class="mb-3">
              How well can you explain yourself through writing?
            </h3>
            <p class="mb-0">
              This area aims to prepare you on what will be expected of your university application essays, as they are the one way you get to show the university who you are beyond your academics—what your interests are, what your personality is like, and why you're a great fit for them.
            </p>
          </VCardText>
        </VCard>

        <ol
          type="1"
          class="ms-5"
        >
          <!-- Question 1 -->
          <li class="my-5">
            What writing activities do you most often do at school? Choose 3 options.
            <VSelect
              v-model="inputData[0].answer"
              :item-props="itemProps"
              :items="options && options['option17'] ? options['option17'] : ''"
              label="Answer"
              density="compact"
              closable-chips
              chips
              multiple
              class="mt-3"
              :rules="rules.maxLength_3"
            />
          </li>

          <!-- Question 2  -->
          <li class="my-5">
            How confident are you in expressing yourself through <b>non-academic writing</b> (such as stories, journals)?
            <span style="color: rgb(var(--v-theme-error))">*</span>
            <VRow>
              <VCol
                md="5"
                cols="12"
              >
                <VSlider
                  v-model="inputData[1].answer[0].score"
                  :max="5"
                  :ticks="tickLabels"
                  show-ticks="always"
                  step="1"
                  tick-size="5"
                  class="mt-3"
                />
              </VCol>
            </VRow>
          </li>

          <!-- Question 3  -->
          <li class="my-5">
            How confident are you in expressing yourself through <b>academic writing</b> (such as essays and journals)?
            <span style="color: rgb(var(--v-theme-error))">*</span>
            <VRow>
              <VCol
                md="5"
                cols="12"
              >
                <VSlider
                  v-model="inputData[2].answer[0].score"
                  :max="5"
                  :ticks="tickLabels"
                  show-ticks="always"
                  step="1"
                  tick-size="5"
                  class="mt-3"
                />
              </VCol>
            </VRow>
          </li>

          <!-- Question 4  -->
          <li class="my-5">
            Have you done any of these activities related to writing?
            <ol
              type="A"
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
          :disabled="loading"
          @click="checkStep(4)"
        >
          <VIcon icon="bx-chevron-left" />
          <span class="me-2">Academic</span>
        </VBtn>

        <VBtn
          variant="elevated"
          class="me-5 mb-1"
          type="submit"
          :loading="loading"
        >
          <span class="me-2">Submit</span>
          <VIcon icon="bx-chevron-right" />
        </VBtn>
      </VCardActions>
    </VForm>
  </VCard>
</template>
