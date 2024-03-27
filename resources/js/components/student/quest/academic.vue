<script setup>
import { confirmBeforeSubmit, showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import { verifyAuth } from '@/helper/verifyAuth'
import ApiService from '@/services/ApiService'
import UserService from '@/services/UserService'
import { ref, watch } from 'vue'

const done = ref(UserService.getUser().quest['Academic Profiling'])
const formData = ref()
const mission = ref(1)
const options = ref()
const loading = ref(false)

const inputData = ref([
  {
    answer: [],
  },
  {
    answer: [{
      id: null,
      question_id: 26,
      sub_question_id: null,
      answer_descriptive: null,
      score: null,
    }],
  },
])

const getOptions =  async() => {
  const endpoint = 'question/7'
  try {
    const res = await ApiService.get(endpoint)
    if (res.success) {
      options.value = res.data
    }
  } catch (error) {
    console.error(error)
  }
}

const submit = async () => {
  const { valid } = await formData.value.validate()

  if (valid) {
    handleSubmit()
  }
}

const handleSubmit = async () => {
  const confirmed = await confirmBeforeSubmit('Are you sure to submitting data?')
  if (confirmed) {
    // Lakukan pengiriman data
    loading.value = true
    resetRadio()
    try {
      const res = await ApiService.post('answer/7', inputData.value)
      if(res.success) {
        verifyAuth().checkMe()
        done.value = true
      } else {
        showNotif('error', res.message)
      }
      loading.value = false
    } catch (error) {
      console.error(error)
      loading.value = false
    }
  }
}

const resetRadio = () => {
  const mission_choosed = mission.value

  if(mission_choosed==1) {
    inputData.value[1].answer[0].score = null
  } else {
    inputData.value[0].answer = []
  }
}

watch(() => {
  getOptions()
})
</script>

<template>
  <VExpansionPanel>
    <VExpansionPanelTitle :class="done?'text-success':'text-secondary'">
      <VIcon
        :icon="done ? 'bx-check-circle' : 'bx-question-mark'"
        class="me-2"
      />
      Academic Area
    </VExpansionPanelTitle>
    <VExpansionPanelText v-if="!done">
      <VForm
        ref="formData"
        validate-on="input"
        fast-fail
        :disabled="loading"
        @submit.prevent="submit"
      >
        <VAlert color="warning">
          <VAlertTitle>
            <p class="my-0">
              Understand better what academic profile will suit your intended major!
              <strong>Choose your mission!</strong>
            </p>
          </VAlertTitle>
        </VAlert>

        <VRadioGroup
          v-model="mission"
          class="mt-3"
        >
          <VRadio
            label="Take a short SAT/IELTS/TOEFL diagnostic test to know what to improve!"
            :value="1"
          />
          <VDivider class="my-2" />
          <VRadio
            label="Consult your subjects to ensure your best fit! "
            :value="2"
          />
        </VRadioGroup>
      
        <VDivider class="my-3" />
        <ol class="ms-5 my-3">
          <li v-if="mission==1">
            <strong>
              Take a short SAT/IELTS/TOEFL diagnostic test 
            </strong>
            to know what to improve! 
            <ol
              type="I"
              class="ms-4 my-3"
            >
              <li class="mb-3">
                Choose one option
                <span style="color:red">*</span> 
                <VRadioGroup
                  v-model="inputData[0].answer[0]" 
                  :rules="rules.required"
                >
                  <VRadio
                    v-for="item in options['option25']"
                    :key="item"
                    :label="item.option_answer"
                    :value="item"
                  />
                </VRadioGroup>
              </li>
              <li v-if="inputData[0].answer[0]">
                When chosen, they can insert their score
                <span style="color:red">*</span> 

                <VTextField
                  v-model="inputData[0].answer[0].score"
                  class="mt-3"
                  label="Score"
                  density="compact"
                  type="number"
                  :rules="rules.required"
                />
              </li>
            </ol>
            <VDivider class="my-6" />
          </li>

          <li v-if="mission==2">
            <strong>
              Consult your subjects 
            </strong>
            to ensure your best fit! 
            <ol
              type="I"
              class="ms-4 my-3"
            >
              <li>
                What major are you planning to go to based on your consultation and your subject selection?
                <span style="color:red">*</span> 
                <VTextarea
                  v-model="inputData[1].answer[0].answer_descriptive"
                  label="Answer"
                  density="compact"
                  class="mt-3"
                  :rules="rules.required"
                />
              </li>
            </ol>
          </li>
        </ol>

        <div class="w-100 d-flex justify-center mt-4">
          <VBtn
            color="secondary"
            type="submit"
            :loading="loading"
          >
            <VIcon
              icon="bx-save"
              color="white"
              class="me-3"
            />
            Submit
          </VBtn>
        </div>
      </VForm>
    </VExpansionPanelText>
    <VExpansionPanelText v-if="done">
      <div class="bg-warning px-4 py-4 rounded">
        <h4>You have completed this mission!</h4>
      </div>
    </VExpansionPanelText>
  </VExpansionPanel>
</template>
