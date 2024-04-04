<script setup>
import { showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import ApiService from '@/services/ApiService'
import { defineEmits, watch } from 'vue'
import { VDivider } from 'vuetify/lib/components/index.mjs'

const emits = defineEmits(['step'])

const formData = ref()
const options = ref()
const loading = ref(false)

const radioData = ref({
  'radio1': 'yes',
  'radio2': 'yes',
})

const inputData = ref(
  [
    // Question 1 
    {
      answer: [
        {
          id: null,
          question_id: 8,
          sub_question_id: 5,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 5,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 5,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 5,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 8,
          sub_question_id: 6,
          answer_descriptive: "",
          score: '',
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 6,
          answer_descriptive: "",
          score: '',
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 8,
          sub_question_id: 7,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 7,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 7,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 7,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 8,
          sub_question_id: 8,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 8,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 8,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 8,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 8,
          sub_question_id: 9,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 9,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 9,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 9,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 8,
          sub_question_id: 10,
          answer_descriptive: "",
        },
        {
          id: null,
          question_id: 8,
          sub_question_id: 10,
          answer_descriptive: "",
        },
      ],
    },

    // Question 2 
    {
      answer: [
        {
          id: null,
          question_id: 9,
          sub_question_id: 11,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: 
        [{
          id: null,
          question_id: 9,
          sub_question_id: 12,
          answer_descriptive: "",
        }],
    },
    {
      answer: 
        [{
          id: null,
          question_id: 9,
          sub_question_id: 13,
          answer_descriptive: "",
        }],
    },
    {
      answer: 
       [ {
         id: null,
         question_id: 9,
         sub_question_id: 14,
         answer_descriptive: "",
       }],
    },

    // Question 3 
    {
      answer: [
        {
          id: null,
          question_id: 10,
          sub_question_id: 15,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 10,
          sub_question_id: 16,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 10,
          sub_question_id: 17,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 10,
          sub_question_id: 18,
          answer_descriptive: "",
        },
      ],
    },
  ],
)

const getOptions =  async() => {
  const endpoint = 'question/2'
  try {
    const res = await ApiService.get(endpoint)
    if (res.success) {
      options.value = res.data
    }
  } catch (error) {
    console.error(error)
  }
}

const getAnswer = async () => {
  try {
    const res = await ApiService.get('answer/2')

    if (res.success && res.data.length>0) {
      inputData.value = res.data
      
      // check radio 1 & radio 2
      radioData.value.radio1 = inputData.value[6].answer[0].answer_descriptive ? 'yes': 'no'
      radioData.value.radio2 = inputData.value[10].answer[0].answer_descriptive ? 'yes': 'no'
    }
  } catch (error) {
    console.error(error)
  }
}

const checkStep = value => {
  emits('step', value)
}

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
  loading.value = true
  resetRadio('radio1')
  resetRadio('radio2')
  try {
    const res = await ApiService.post('answer/2', inputData.value)
    if(res.success) {
      checkStep(4)
    } else {
      showNotif('error', res.message, 'bottom-end')
    }
    loading.value = false
  } catch (error) {
    showNotif('error', error, 'bottom-end')
    loading.value = false
  }
}

const resetRadio = radio => {
  let val = radioData.value[radio]
  if(radio=='radio1') {
    if(val=='yes') {
      inputData.value[8].answer[0].answer_descriptive = null
      inputData.value[9].answer[0].answer_descriptive = null
    } else {
      inputData.value[6].answer[0].answer_descriptive = null
      inputData.value[7].answer[0].answer_descriptive = null
    }
  } else {
    if(val=='yes') {
      inputData.value[12].answer[0].answer_descriptive = null
      inputData.value[13].answer[0].answer_descriptive = null
    } else {
      inputData.value[10].answer[0].answer_descriptive = null
      inputData.value[11].answer[0].answer_descriptive = null
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
  <!-- Profile Building  -->
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
            Profile Building
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
              Let’s see how many activities you’ve joined!
            </h3>
            <p class="mb-0">
              This area aims to educate you on the importance of building your unique strengths and accumulating experiences, making you stand out in a competitive landscape and setting the stage for your success beyond high school! 
            </p>
          </VCardText>
        </VCard>

        <ol
          type="1"
          class="ms-5"
        >
          <!-- Question 1 -->
          <li class="my-5">
            <div class="mb-3">
              What activities have you done?
            </div>
            <ol
              type="A"
              class="ms-5"
            >
              <!-- Sub 1  -->
              <li class="mb-3">
                <label>
                  List the competitions you won or participated in. Please specify the level (international, national, school)
                </label>
                <VRow
                  v-for="i in inputData[0].answer"
                  :key="i"
                  class="mt-1 mb-2"
                >
                  <VCol
                    md="9"
                    cols="12"
                    style="padding:5px !important"
                  >
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Competition Name"
                    />
                  </VCol>
                  <VCol
                    md="3"
                    cols="12"
                    style="padding:5px !important"
                  >
                    <VAutocomplete
                      v-model="i.id"
                      :item-props="itemProps"
                      :items="options && options['option8-5'] ? options['option8-5'] : ''"
                      item-value="id"
                      label="Level"
                      density="compact"
                      chips
                      closable-chips
                      :rules="i.answer_descriptive ? rules.required : ''"
                    />
                  </VCol>
                </VRow>
              </li>
              <!-- Sub 2  -->
              <li class="mb-3">
                <label>
                  List the internships you have participated in. Please state the duration of your internship.
                </label>
                <VRow
                  v-for="i in inputData[1].answer"
                  :key="i"
                  class="mt-1 mb-2"
                >
                  <VCol
                    style="padding:5px !important"
                    cols="12"
                    md="9"
                  >
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Company Name"
                    />
                  </VCol>
                  <VCol
                    style="padding:5px !important"
                    cols="12"
                    md="3"
                  >
                    <VTextField
                      v-model="i.score"
                      type="number"
                      density="compact"
                      label="Total Hours"
                      :rules="i.answer_descriptive ? rules.required : ''"
                    />
                  </VCol>
                </VRow>
              </li>
              <!-- Sub 3  -->
              <li class="mb-3">
                <label>
                  List the volunteering opportunities you have participated in.
                </label>
                <VRow class="my-2">
                  <VCol
                    v-for="i in inputData[2].answer"
                    :key="i"
                    md="6"
                    cols="12" 
                    style="padding:5px !important"
                  >
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Company/Organization Name"
                    />
                  </VCol>
                </VRow>
              </li>
              <!-- Sub 4 -->
              <li class="mb-3">
                <label>
                  List the school clubs you have participated in.
                </label>
                <VRow class="my-2">
                  <VCol
                    v-for="i in inputData[3].answer"
                    :key="i"
                    md="6"
                    cols="12" 
                    style="padding:5px !important"
                  >
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Club Name"
                    />
                  </VCol>
                </VRow>
              </li>
              <!-- Sub 5  -->
              <li class="mb-3">
                <label>
                  List any out-of-school activities you do. (e.g coding/robotic/ cooking classes)
                </label>
                <VRow class="my-2">
                  <VCol
                    v-for="i in inputData[4].answer"
                    :key="i"
                    md="6"
                    cols="12" 
                    style="padding:5px !important"
                  >
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Activity"
                    />
                  </VCol>
                </VRow>
              </li>
              <!-- Sub 6  -->
              <li class="mb-3">
                <label>
                  List any summer/winter programs you have attended.
                </label>
                <VRow class="my-2">
                  <VCol
                    v-for="i in inputData[5].answer"
                    :key="i"
                    md="6"
                    cols="12" 
                    style="padding:5px !important"
                  >
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Program Name"
                    />
                  </VCol>
                </VRow>
              </li>
            </ol>
          </li>

          <!-- Question 2 -->
          <li class="my-5">
            <div class="mb-3">
              Have you ever created a personal project? 
              <span style="color: rgb(var(--v-theme-error))">*</span> <br>
              <small>
                A personal project <b>combines your passion and the skills</b> you've honed over the years, where you dedicate time and effort to achieve a goal, whether it's launching a business, writing a book, creating art, making a website, etc.
              </small>

              <VRadioGroup v-model="radioData.radio1">
                <VRadio
                  label="Yes"
                  value="yes"
                />
                <VRadio
                  label="No"
                  value="no"
                />
              </VRadioGroup>

              <VDivider class="my-3" />

              <ol
                type="A"
                class="ms-4"
              >
                <li v-if="radioData.radio1=='yes'">
                  <label>
                    In what field was your personal project in?
                  </label>
                  <span style="color: rgb(var(--v-theme-error))">*</span>
                  <VTextarea
                    v-model="inputData[6].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                    :rules="rules.required"
                  />
                </li>
                <li v-if="radioData.radio1=='yes'">
                  <label>
                    Please provide a brief description*
                  </label>
                  <span style="color: rgb(var(--v-theme-error))">*</span>
                  <VTextarea
                    v-model="inputData[7].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                    :rules="rules.required"
                  />
                </li>
                <li v-if="radioData.radio1=='no'">
                  <label>
                    Are you interested in conducting one?
                  </label>

                  <VRadioGroup v-model="inputData[8].answer[0].answer_descriptive">
                    <VRadio
                      label="Yes"
                      value="yes"
                    />
                    <VRadio
                      label="No"
                      value="no"
                    />
                  </VRadioGroup>
                </li>
                <li v-if="radioData.radio1=='no'">
                  <label>
                    If yes, in what topic do you want to develop a project?
                  </label>
                  <VTextarea
                    v-model="inputData[9].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                  />
                </li>
              </ol>
            </div>
          </li>
        
          <!-- Question 3 -->
          <li class="my-5">
            <div class="mb-3">
              Have you ever conducted a research project?
              <span style="color: rgb(var(--v-theme-error))">*</span> <br>
              <small>
                A research project is <b>a detailed study where you look closely at a specific topic, question, or problem</b>  to learn more about it. You gather information, analyze it, and share your findings, for example a journal or essay.
              </small>

              <VRadioGroup v-model="radioData.radio2">
                <VRadio
                  label="Yes"
                  value="yes"
                />
                <VRadio
                  label="No"
                  value="no"
                />
              </VRadioGroup>

              <VDivider class="my-3" />

              <ol
                type="A"
                class="ms-4"
              >
                <li v-if="radioData.radio2 == 'yes'">
                  <label>
                    In what field was your research project in?
                  </label>
                  <span style="color: rgb(var(--v-theme-error))">*</span>
                  <VTextarea
                    v-model="inputData[10].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                    :rules="rules.required"
                  />
                </li>
                <li v-if="radioData.radio2 == 'yes'">
                  <label>
                    Please provide a brief description*
                  </label>
                  <span style="color: rgb(var(--v-theme-error))">*</span>
                  <VTextarea
                    v-model="inputData[11].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                    :rules="rules.required"
                  />
                </li>
                <li v-if="radioData.radio2 == 'no'">
                  <label>
                    Are you interested in conducting one?
                  </label>
                
                  <VRadioGroup v-model="inputData[12].answer[0].answer_descriptive">
                    <VRadio
                      label="Yes"
                      value="yes"
                    />
                    <VRadio
                      label="No"
                      value="no"
                    />
                  </VRadioGroup>
                </li>
                <li v-if="radioData.radio2 == 'no'">
                  <label>
                    If yes, in what topic do you want to develop a project?
                  </label>
                  <VTextarea
                    v-model="inputData[13].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                  />
                </li>
              </ol>
            </div>
          </li>
        </ol>
      </VCardText>
      <VCardActions class="justify-space-between">
        <VBtn
          variant="elevated"
          class="ms-3 mb-1 bg-warning"
          :disabled="loading"
          @click="checkStep(2)"
        >
          <VIcon icon="bx-chevron-left" />
          <span class="me-2">Exploration</span>
        </VBtn>

        <VBtn
          variant="elevated"
          color="secondary"
          class="me-5 mb-1"
          type="submit"
        >
          <span class="me-2">Academic</span>
          <VIcon icon="bx-chevron-right" />
        </VBtn>
      </VCardActions>
    </VForm>
  </VCard>
</template>
