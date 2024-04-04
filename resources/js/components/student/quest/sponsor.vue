<script setup>
import { confirmBeforeSubmit, showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import { verifyAuth } from '@/helper/verifyAuth'
import ApiService from '@/services/ApiService'
import UserService from '@/services/UserService'
import { ref } from 'vue'

const done = ref(UserService.getUser().quest['Sponsor'])
const formData = ref()
const loading = ref(false)

const inputData = ref([
  {
    answer: [{
      id: null,
      question_id: 29,
      sub_question_id: null,
      answer_descriptive: null,
      score: null,
    }],
  },
])


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
  const confirmed = await confirmBeforeSubmit('Are you sure you have completed the mission?')
  if (confirmed) {
    // Lakukan pengiriman data
    loading.value = true
    try {
      const res = await ApiService.post('answer/9', inputData.value)
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
</script>

<template>
  <VExpansionPanel>
    <VExpansionPanelTitle :class="done?'text-success':'text-secondary'">
      <VIcon
        :icon="done ? 'bx-check-circle' : 'bx-question-mark'"
        class="me-2"
      />
      Industry Partners Area
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
              Just like the saying “work hard, play hard”, take time and refresh at our collaborator booths outside!
            </p>
          </VAlertTitle>
        </VAlert>

      
        <VDivider class="my-3" />

        <ol class="ms-5 my-3">
          <li>
            Tell us what booth you visited!
            <span style="color: rgb(var(--v-theme-error))">*</span> 
            <VTextarea
              v-model="inputData[0].answer[0].answer_descriptive"
              label="Answer"
              density="compact"
              class="mt-3"
              :rules="rules.required"
            />
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
              color="on-secondary"
              class="me-3"
            />
            Complete This Mission
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
