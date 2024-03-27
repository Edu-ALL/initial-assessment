<script setup>
import { confirmBeforeSubmit, showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import { verifyAuth } from '@/helper/verifyAuth'
import ApiService from '@/services/ApiService'
import UserService from '@/services/UserService'
import { ref, watch } from 'vue'

const done = ref(UserService.getUser().quest['Writing'])
const formData = ref()
const mission = ref(1)
const loading = ref(false)

const inputData = ref([
  {
    answer: [{
      id: null,
      question_id: 27,
      sub_question_id: 35,
      answer_descriptive: null,
      score: null,
    }],
  },
  {
    answer: [{
      id: null,
      question_id: 28,
      sub_question_id: 36,
      answer_descriptive: null,
      score: null,
    }],
  },
])


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
      const res = await ApiService.post('answer/8', inputData.value)
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
    inputData.value[1].answer[0].answer_descriptive = null
  } else {
    inputData.value[0].answer[0].answer_descriptive = null
  }
}

const getAnswer = async () => {
  try {
    const res = await ApiService.get('answer/8')

    if (res.success && res.data.length>0) {
      done.value = true
    } else {
      done.value = false
    }
  } catch (error) {
    console.error(error)
  }
}
</script>

<template>
  <VExpansionPanel>
    <VExpansionPanelTitle :class="done?'text-success':'text-secondary'">
      <VIcon
        :icon="done ? 'bx-check-circle' : 'bx-question-mark'"
        class="me-2"
      />
      Writing Area
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
              Find out what essay can get you accepted into exceptional universities!
              <strong>Choose your mission!</strong>
            </p>
          </VAlertTitle>
        </VAlert>

        <VRadioGroup
          v-model="mission"
          class="mt-3"
        >
          <VRadio
            label="Compare the US and UK/Asia essays"
            :value="1"
          />
          <VDivider class="my-2" />
          <VRadio
            label="Compare the AI and handmade essays"
            :value="2"
          />
        </VRadioGroup>
      
        <VDivider class="my-3" />

        <ol class="ms-5 my-3">
          <li v-if="mission==1">
            Compare the US and UK/Asia essays
            <ol
              type="I"
              class="ms-4 my-3"
            >
              <li class="mb-3">
                Tell us what makes both these essays different?
                <span style="color:red">*</span> 
                <VTextarea
                  v-model="inputData[0].answer[0].answer_descriptive"
                  label="Answer"
                  density="compact"
                  class="mt-3"
                  :rules="rules.required"
                />
              </li>
            </ol>
            <VDivider class="my-6" />
          </li>

          <li v-if="mission==2">
            Compare the AI and handmade essays
          
            <ol
              type="I"
              class="ms-4 my-3"
            >
              <li>
                Tell us what makes both these essays different?
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
      </vform>
    </VExpansionPanelText>
    <VExpansionPanelText v-if="done">
      <div class="bg-warning px-4 py-4 rounded">
        <h4>You have completed this mission!</h4>
      </div>
    </VExpansionPanelText>
  </VExpansionPanel>
</template>
