<script setup>
import { showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import ApiService from '@/services/ApiService'
import { defineEmits, ref, watch } from 'vue'

const emits = defineEmits(['step'])

const formData = ref()
const options = ref()
const loading = ref(false)

const inputData = ref(
  [
    {
      answer: [],
    },
    {
      answer: [],
    },
    {
      answer: [],
    },
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
          question_id: 5,
          sub_question_id: 3,
          answer_descriptive: "",
        }, 
      ],
    },
    {
      answer: [
        {
          id: null,
          question_id: 5,
          sub_question_id: 4,
          answer_descriptive: "",
        },
      ],
    },
    {
      answer: [],
    },
    {
      answer: [{
        id: null,
        question_id: 7,
        sub_question_id: null,
        answer_descriptive: "",
      }],
      
    },
  ],
)

const getOptions =  async() => {
  const endpoint = 'question/1'
  try {
    const res = await ApiService.get(endpoint)
    if (res.success) {
      options.value = res.data
    }
  } catch (error) {
    console.error(error)
  }
}

const otherField  = ref({
  field1: false,
  field2: false,
})

const checkStep = value => {
  emits('step', value)
}

const getAnswer = async () => {
  try {
    const res = await ApiService.get('answer/1')

    if (res.success && res.data.length>0) {
      inputData.value = res.data

      // cek checkOtherOption 
      checkOtherOption(3, 1)
      checkOtherOption(4, 2)
    }
  } catch (error) {
    console.error(error)
  }
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
  try {
    const res = await ApiService.post('answer/1', inputData.value)
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

const checkOtherOption = (i, field) => { // i dari index answer | field dari otherField 
  let data = inputData.value[i].answer
  let index = data.findIndex(item => item.option_answer === "Others (long answer)")

  if (index !== -1) {
    otherField.value['field'+field] = index
  } else {
    otherField.value['field'+field] = null
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
  <!-- Exploration  -->
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
            Interest Exploration
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
              How thoroughly have you engaged in self-exploration? 
            </h3>
            <p class="mb-0">
              This part is all about getting a good handle on what makes you tick—your personality, values, interests, and talents. It's key for figuring out a career path that feels right and making smart moves for your future.
            </p>
          </VCardText>
        </VCard>
        <ol
          type="1"
          class="ms-5"
        >
          <!-- Question 1 -->
          <li>
            <div class="mb-3">
              What are your current interests?
              <span style="color: rgb(var(--v-theme-error))">*</span>
            </div>
            <ol
              type="A"
              class="ms-5"
            >
              <li class="mb-3">
                <label>
                  Academic interests (You can pick more than one)
                  <span style="color: rgb(var(--v-theme-error))">*</span>
                </label>
                <VAutocomplete
                  ref="academic"
                  v-model="inputData[0].answer"
                  :item-props="itemProps"
                  :items="options && options['option1-1'] ? options['option1-1'] : ''"
                  label="Answer"
                  density="compact"
                  closable-chips
                  chips
                  multiple
                  class="my-3"
                  :rules="[...rules.required, ...rules.maxLength_3]"
                />
              </li>
              <li class="mb-3">
                <label>
                  Non-academic interests (You can pick more than one)
                  <span style="color: rgb(var(--v-theme-error))">*</span>
                </label>
                <VAutocomplete
                  v-model="inputData[1].answer"
                  :item-props="itemProps"
                  :items="options && options['option1-2'] ? options['option1-2'] : ''"
                  label="Answer"
                  density="compact"
                  closable-chips
                  chips
                  multiple
                  class="my-3"
                  :rules="[...rules.required, ...rules.maxLength_3]"
                />
              </li>
            </ol>
          </li>

          <!-- Question 2 -->
          <li>
            <div class="mb-3">
              What is your daily schedule? (You can pick more than one)
              <span style="color: rgb(var(--v-theme-error))">*</span>
            </div>
            <VAutocomplete
              v-model="inputData[2].answer"
              :item-props="itemProps"
              :items="options && options['option2'] ? options['option2'] : ''"
              label="Answer"
              density="compact"
              closable-chips
              chips
              multiple
              class="my-3"
              :rules="[...rules.required]"
            />
          </li>
        
          <!-- Question 3 -->
          <li>
            <div class="mb-3">
              What do you identify as your strengths? (You can pick more than one) 
              <span style="color: rgb(var(--v-theme-error))">*</span>
            </div>
            
            <VAutocomplete
              v-model="inputData[3].answer"
              :item-props="itemProps"
              :items="options && options['option3'] ? options['option3'] : ''"
              label="Answer"
              density="compact"
              closable-chips
              chips
              multiple
              class="my-3"
              :rules="[...rules.required]"
              @update:model-value="checkOtherOption(3, 1)"
            />
            <VTextField
              v-if="otherField.field1"
              v-model="inputData[3].answer[otherField.field1].answer_descriptive"
              label="Separated by comma"
              density="compact"
              class="my-5"
            />
          </li>
     
          <!-- Question 4 -->
          <li>
            <div class="mb-3">
              What do you identify as your weaknesses? (You can pick more than one)
              <span style="color: rgb(var(--v-theme-error))">*</span>
            </div>
            <VAutocomplete
              v-model="inputData[4].answer"
              :item-props="itemProps"
              :items="options && options['option4'] ? options['option4'] : ''"
              label="Answer"
              density="compact"
              closable-chips
              chips
              multiple
              class="my-3"
              :rules="[...rules.required]"
              @update:model-value="checkOtherOption(4, 2)"
            />
            <VTextField
              v-if="otherField.field2"
              v-model="inputData[4].answer[otherField.field2].answer_descriptive"
              label="Separated by comma"
              density="compact"
              class="my-5"
            />
          </li>
        
          <!-- Question 5 -->
          <li>
            <div class="mb-3">
              What are your goals?
            </div>
            <ol
              type="A"
              class="ms-5"
            >
              <li class="mb-3">
                <label>
                  Academic (for example: achieve a minimum A-level score of AAB)
                </label>
                <VTextarea
                  v-model="inputData[5].answer[0].answer_descriptive"
                  label="Answer"
                  class="my-3"
                />
              </li>
              <li class="mb-3">
                <label>
                  Personal (for example: your dream job)
                </label>
                <VTextarea
                  v-model="inputData[6].answer[0].answer_descriptive"
                  label="Answer"
                  class="my-3"
                />
              </li>
            </ol>
          </li>
        
          <!-- Question 6 -->
          <li>
            <div class="mb-3">
              Where is your dream country to study in? (You can pick more than one)
            </div>
            <VAutocomplete
              v-model="inputData[7].answer"
              :item-props="itemProps"
              :items="options && options['option6'] ? options['option6'] : ''"
              label="Answer"
              density="compact"
              closable-chips
              chips
              multiple
              class="my-3"
            />
          </li>
        
          <!-- Question 7 -->
          <li>
            <div class="mb-3">
              What is your dream university?
            </div>
            <VTextarea
              v-model="inputData[8].answer[0].answer_descriptive"
              label="Answer"
              class="my-3"
            />
          </li>
        </ol>
      </VCardText>
      
      <VCardActions class="justify-space-between">
        <VBtn
          variant="elevated"
          class="ms-3 mb-1 bg-warning"
          :disabled="loading"
          @click="checkStep(1)"
        >
          <VIcon icon="bx-chevron-left" />
          <span class="me-2">Back</span>
        </VBtn>

        <VBtn
          variant="elevated"
          color="secondary"
          class="me-5 mb-1"
          type="submit"
          :loading="loading"
        >
          <span class="me-1">Profile Building</span>
          <VIcon icon="bx-chevron-right" />
        </VBtn>
      </VCardActions>
    </VForm>
  </VCard>
</template>
