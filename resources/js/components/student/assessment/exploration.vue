<script setup>
import { rules } from '@/helper/rules'
import ApiService from '@/services/ApiService'
import { defineEmits, watch } from 'vue'

const emits = defineEmits(['step'])

const formData = ref()
const options = ref()

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
    console.log(inputData.value) 
    checkStep(3)
  }
}


watch(() => {
  getOptions()
})
</script>

<template>
  <!-- Exploration  -->
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
            Exploration
          </strong>
        </h3>
        <VDivider />
      </VCardTitle>
      <VCardText>
        <div class="bg-primary px-3 py-3 rounded mb-5">
          <h3 class="text-white mb-3">
            How well have you explored yourself? 
          </h3>
          <p class="mb-0">
            This area aims to understand your personality, values, interests, and skills/aptitudes that will help you develop your career plan and decide what is best for your future!
          </p>
        </div>

        <ol
          type="1"
          class="ms-5"
        >
          <!-- Question 1 -->
          <li>
            <div class="mb-3">
              What are your current interests?
              <span style="color:red">*</span>
            </div>
            <ol
              type="A"
              class="ms-5"
            >
              <li class="mb-3">
                <label>
                  Academic (general majors)
                  <span style="color:red">*</span>
                </label>
                <VSelect
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
                  Non-academic
                  <span style="color:red">*</span>
                </label>
                <VSelect
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
              What is your daily schedule? (can pick more than one)
              <span style="color:red">*</span>
            </div>
            <VSelect
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
              What do you identify as your strengths? (can pick more than one) 
              <span style="color:red">*</span>
            </div>
            <VSelect
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
            />
          </li>
     
          <!-- Question 4 -->
          <li>
            <div class="mb-3">
              What do you identify as your weaknesses? (can pick more than one)
              <span style="color:red">*</span>
            </div>
            <VSelect
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
                  Academic
                </label>
                <VTextarea
                  v-model="inputData[5].answer[0].answer_descriptive"
                  label="Answer"
                  class="my-3"
                />
              </li>
              <li class="mb-3">
                <label>
                  Personal (for example your dream job)
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
              Where is your dream country to study in? (Can pick more than one)
            </div>
            <VSelect
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
          @click="checkStep(1)"
        >
          <VIcon icon="bx-chevron-left" />
          <span class="me-2">Back</span>
        </VBtn>

        <VBtn
          variant="elevated"
          class="me-5 mb-1"
          type="submit"
        >
          <span class="me-1">Profile Building</span>
          <VIcon icon="bx-chevron-right" />
        </VBtn>
      </VCardActions>
    </VForm>
  </VCard>
</template>

<style>
ol li {
  margin-bottom: 5px;
}
</style>
