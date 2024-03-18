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
  const { valid } = await formData.value.validate()

  if (valid) {
    handleSubmit()
  }
}

const handleSubmit = async () => {
  console.log(inputData.value)
  loading.value = true
  try {
    const res = await ApiService.post('answer/2', inputData.value)
    if(res.success) {
      checkStep(3)
    } else {
      showNotif('error', res.message)
    }
    loading.value = false
  } catch (error) {
    console.error(error)
    loading.value = false
  }
}

watch(() => {
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
        <div class="bg-primary px-3 py-3 rounded">
          <h3 class="text-white mb-3">
            Let’s see how many activities you’ve joined!
          </h3>
          <p class="mb-0">
            This area aims to educate you on the importance of building your unique strengths and accumulating experiences, making you stand out in a competitive landscape and setting the stage for your success beyond high school! 
          </p>
        </div>

        <ol
          type="1"
          class="ms-5"
        >
          <!-- Question 1 -->
          <li class="my-5">
            <div class="mb-3">
              What activities have you done?
              <span style="color:red">*</span>
            </div>
            <ol
              type="A"
              class="ms-5"
            >
              <!-- Sub 1  -->
              <li class="mb-3">
                <label>
                  How many competitions have you won or participated in? 
                </label>
                <VRow
                  v-for="i in inputData[0].answer"
                  :key="i"
                  class="mt-1"
                >
                  <VCol md="9">
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Competition Name"
                    />
                  </VCol>
                  <VCol md="3">
                    <VSelect
                      v-model="i.id"
                      :item-props="itemProps"
                      :items="options && options['option8-5'] ? options['option8-5'] : ''"
                      item-value="id"
                      label="Level"
                      density="compact"
                      :rules="i.answer_descriptive ? rules.required : ''"
                    />
                  </VCol>
                </VRow>
              </li>
              <!-- Sub 2  -->
              <li class="mb-3">
                <label>
                  How many internships have you participated in? Please state the duration of your internship.
                </label>
                <VRow
                  v-for="i in inputData[1].answer"
                  :key="i"
                  class="mt-1"
                >
                  <VCol md="9">
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Company Name"
                    />
                  </VCol>
                  <VCol md="3">
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
                  How many volunteering opportunities have you joined?
                </label>
                <VRow class="mt-2">
                  <VCol
                    v-for="i in inputData[2].answer"
                    :key="i"
                    md="6"
                  >
                    <VTextField
                      v-model="i.answer_descriptive"
                      density="compact"
                      label="Company Name"
                    />
                  </VCol>
                </VRow>
              </li>
              <!-- Sub 4 -->
              <li class="mb-3">
                <label>
                  How many school clubs have you done?
                </label>
                <VRow class="mt-2">
                  <VCol
                    v-for="i in inputData[3].answer"
                    :key="i"
                    md="6"
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
                  How many out-of-school activities have you done? (e.g coding/robotic/ cooking classes)
                </label>
                <VRow class="mt-2">
                  <VCol
                    v-for="i in inputData[4].answer"
                    :key="i"
                    md="6"
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
                  How many summer/winter programs have you attended?
                </label>
                <VRow class="mt-2">
                  <VCol
                    v-for="i in inputData[5].answer"
                    :key="i"
                    md="6"
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
              <span style="color:red">*</span> <br>
              <small>
                A personal project combines your passion and the skills you've honed over the years, where you dedicate time and effort to achieve a goal, whether it's launching a business, writing a book, creating art, making a website, etc.
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
                  In what field was your personal project in?
                  <span style="color:red">*</span>
                  <VTextarea
                    v-model="inputData[6].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                    :rules="rules.required"
                  />
                </li>
                <li v-if="radioData.radio1=='yes'">
                  Please provide a brief description*
                  <span style="color:red">*</span>
                  <VTextarea
                    v-model="inputData[7].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                    :rules="rules.required"
                  />
                </li>
                <li v-if="radioData.radio1=='no'">
                  Are you interested in conducting one?

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
                  If yes, in what topic do you want to develop a project?
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
              <span style="color:red">*</span> <br>
              <small>
                A research project is a detailed study where you look closely at a specific topic, question, or problem to learn more about it. You gather information, analyze it, and share your findings, for example a journal or essay.
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
                  In what field was your research project in?
                  <span style="color:red">*</span>
                  <VTextarea
                    v-model="inputData[10].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                    :rules="rules.required"
                  />
                </li>
                <li v-if="radioData.radio2 == 'yes'">
                  Please provide a brief description*
                  <span style="color:red">*</span>
                  <VTextarea
                    v-model="inputData[11].answer[0].answer_descriptive"
                    label="Answer"
                    class="my-3"
                    :rules="rules.required"
                  />
                </li>
                <li v-if="radioData.radio2 == 'no'">
                  Are you interested in conducting one?
                
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
                  If yes, in what topic do you want to develop a project?
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
