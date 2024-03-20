<script setup>
import { showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import ApiService from '@/services/ApiService'
import { defineEmits, watch } from 'vue'

const emits = defineEmits(['step'])

const formData = ref()
const options = ref()
const sub_option = ref()
const loading = ref(false)

const radioData = ref({
  radio1: 'yes',
})

const getAnswer = async () => {
  try {
    const res = await ApiService.get('answer/3')

    if (res.success && res.data.length>0) {
      inputData.value = res.data

      // check radio standardized test 
      if(inputData.value[3].answer[0].score==null && 
        inputData.value[4].answer[0].score==null && 
        inputData.value[5].answer[0].score==null) {
        radioData.value.radio1 = 'no'
      }
    }
  } catch (error) {
    console.error(error)
  }
}

const getOptions =  async() => {
  const endpoint = 'question/3'
  try {
    const res = await ApiService.get(endpoint)
    if (res.success) {
      options.value = res.data
    }
  } catch (error) {
    console.error(error)
  }
}

const getSubOption  = async ()  => {
  // Reset Answer 
  inputData.value[1].answer = []

  const id = inputData.value[0].answer[0].id

  const endpoint = 'sub_option/' + id
  try {
    const res = await ApiService.get(endpoint)
    if (res.success) {
      sub_option.value = res.data.sub_option
    }
  } catch (error) {
    console.error(error)
  }
}

const inputData = ref(
  [
    {
      answer: [],
    },
    {
      answer: [],
    },
    {
      answer: [
        {
          id: null,
          question_id: 13,
          sub_question_id: 20,
          answer_descriptive: null,
          score: null,
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 14,
          sub_question_id: 21,
          answer_descriptive: null,
          score: null,
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 14,
          sub_question_id: 22,
          answer_descriptive: null,
          score: null,
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 14,
          sub_question_id: 23,
          answer_descriptive: null,
          score: null,
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 15,
          sub_question_id: null,
          answer_descriptive: null,
          score: null,
        },
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 16,
          sub_question_id: null,
          answer_descriptive: null,
          score: null,
        },
      ],
    },
  ],
)


const checkStep = value => {
  emits('step', value)
}

const itemProps = item => {
  return {
    title: item.option_answer,
    subtitle: item.title_of_answer,
  }
}

const resetRadio = radio => {
  let val = radioData.value[radio]
  inputData.value[3].answer[0].score = val == 'yes' ? val : null
  inputData.value[4].answer[0].score = val == 'yes' ? val : null
  inputData.value[5].answer[0].score = val == 'yes' ? val : null
}


const submit = async () => {
  const { valid } = await formData.value.validate()

  if (valid) {
    handleSubmit()
  }
}

const handleSubmit = async () => {
  loading.value = true
  try {
    const res = await ApiService.post('answer/3', inputData.value)
    if(res.success) {
      checkStep(5)
    } else {
      showNotif('error', res.message, 'bottom-end')
    }
    loading.value = false
  } catch (error) {
    showNotif('error', error, 'bottom-end')
    loading.value = false
  }
}

watch(() => {
  getOptions()
  getAnswer()
})
</script>

<template>
  <!-- Academic  -->
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
            Academic
          </strong>
        </h3>
        <VDivider />
      </VCardTitle>
      <VCardText>
        <div class="bg-primary px-3 py-3 rounded mb-5">
          <h3 class="text-white mb-3">
            What subjects will be beneficial for your intended major?
          </h3>
          <p class="mb-0">
            This area aims to understand better what academic profile you will need when applying to university, as they measure your understanding and analytical skill in specific subjects such as language, mathematics, science, social science, etc.
          </p>
        </div>

        <ol
          type="1"
          class="ms-5"
        >
          <!-- Question 1 -->
          <li class="my-5">
            What curriculum does your school use?
            <span style="color:red">*</span>
            <VSelect
              v-model="inputData[0].answer[0]"
              :item-props="itemProps"
              :items="options && options['option11'] ? options['option11'] : ''"
              label="Answer"
              density="compact"
              class="mt-3"
              :rules="rules.required"
              @update:model-value="getSubOption"
            />
          </li>

          <!-- Question 2  -->
          <li class="my-5">
            What is your current subject selection?
            <span style="color:red">*</span> <br>
            <small>
              The curriculum that appears refers to the answer in question number 1
            </small>
            <VSelect
              v-model="inputData[1].answer"
              label="Answer"
              density="compact"
              :item-props="itemProps"
              :items="sub_option"
              closable-chips
              chips
              class="mt-3"
              multiple
              :rules="rules.required"
            />
          </li>

          <!-- Question 3  -->
          <li class="my-5">
            <div class="mb-3">
              What were your last report grades?
              <span style="color:red">*</span>

              <VRadioGroup v-model="inputData[2].answer[0].sub_question_id">
                <VRadio
                  label="Yes"
                  :value="20"
                />
                <VRadio
                  label="I don't know"
                  :value="19"
                />
              </VRadioGroup>

              <VDivider class="my-3" />

              <!-- Detail Score  -->
              <!-- If Answer I Know  -->
              <section v-if="inputData[2].answer[0].sub_question_id==20">
                <VRow
                  v-for="item in inputData[1].answer"
                  :key="item"
                >
                  <VCol :cols="inputData[0].answer[0].id == 122 ? 8: 10">
                    <VTextField
                      v-model="item.option_answer"
                      label="Subject"
                      density="compact"
                      readonly
                    />
                  </VCol>
                  <VCol
                    v-if="inputData[0].answer[0].id == 122"
                    cols="2"
                  >
                    <VSelect
                      v-model="item.answer_descriptive"
                      label="Level"
                      density="compact"
                      :items="['HL','SL']"
                    />
                  </VCol>
                  <VCol cols="2">
                    <VTextField
                      v-model="item.score"
                      density="compact"
                      label="Score"
                    />
                  </VCol>
                </VRow>
              </section>

              <!-- If Answer I Dont Know  -->
              <section v-if="inputData[2].answer[0].sub_question_id==19">
                <VTextField
                  v-model="inputData[2].answer[0].score"
                  label="Average Score"
                  density="compact"
                />
              </section>
            </div>
          </li>

          <!-- Question 4  -->
          <li class="my-5">
            <div class="mb-3">
              Have you done any standardized tests?
              <span style="color:red">*</span>

              <VRadioGroup
                v-model="radioData.radio1"
                @change="resetRadio"
              >
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
              <VRow>
                <VCol cols="4">
                  <small>
                    The maximum score is 9
                  </small>
                  <VTextField
                    v-model="inputData[3].answer[0].score"
                    type="number"
                    label="IELTS"
                    density="compact"
                    min="0"
                    max="9"
                    class="mt-3"
                    :rules="rules.maxScore_9"
                    :disabled="radioData.radio1=='no'"
                  />
                </VCol>
                <VCol cols="4">
                  <small>
                    The maximum score is 120
                  </small>
                  <VTextField
                    v-model="inputData[4].answer[0].score"
                    type="number"
                    label="TOEFL"
                    density="compact"
                    min="0"
                    max="120"
                    class="mt-3"
                    :rules="rules.maxScore_120"
                    :disabled="radioData.radio1=='no'"
                  />
                </VCol>
                <VCol cols="4">
                  <small>
                    The maximum score is 1600
                  </small>
                  <VTextField
                    v-model="inputData[5].answer[0].score"
                    type="number"
                    label="SAT"
                    density="compact"
                    min="400"
                    max="1600"
                    class="mt-3"
                    :rules="rules.maxScore_1600"
                    :disabled="radioData.radio1=='no'"
                  />
                </VCol>
              </VRow>
            </div>
          </li>

          <!-- Question 5  -->
          <li class="my-5">
            <div class="mb-3">
              Do you feel like you need help in your academics?
              <span style="color:red">*</span>

              <VRadioGroup
                v-model="inputData[6].answer[0].answer_descriptive"
                :rules="rules.required"
              >
                <VRadio
                  label="Yes"
                  value="yes"
                />
                <VRadio
                  label="No"
                  value="no"
                />
              </VRadioGroup>
            </div>
          </li>

          <!-- Question 6  -->
          <li class="my-5">
            <div class="mb-3">
              In which area do you need help in your academics?

              <VTextarea
                v-model="inputData[7].answer[0].answer_descriptive"
                label="Answer"
                density="compact"
                class="mt-3"
              />
            </div>
          </li>
        </ol>
      </VCardText>
      <VCardActions class="justify-space-between">
        <VBtn
          variant="elevated"
          class="ms-3 mb-1 bg-warning"
          :disabled="loading"
          @click="checkStep(3)"
        >
          <VIcon icon="bx-chevron-left" />
          <span class="me-2">Profile Building</span>
        </VBtn>

        <VBtn
          variant="elevated"
          class="me-5 mb-1"
          type="submit"
          :loading="loading"
        >
          <span class="me-2">Writing</span>
          <VIcon icon="bx-chevron-right" />
        </VBtn>
      </VCardActions>
    </VForm>
  </VCard>
</template>
