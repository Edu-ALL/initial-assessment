<script setup>
import { confirmBeforeSubmit, showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import { verifyAuth } from '@/helper/verifyAuth'
import ApiService from '@/services/ApiService'
import UserService from '@/services/UserService'
import { ref, watch } from 'vue'

const done = ref(UserService.getUser().quest['Exploration'])
const formData = ref()
const mission = ref(1)
const options = ref()
const loading = ref(false)

const inputData = ref([
  {
    answer: [],
  },
  {
    answer: [],
  },
])

const getOptions =  async() => {
  const endpoint = 'question/5'
  try {
    const res = await ApiService.get(endpoint)
    if (res.success) {
      options.value = res.data
      inputData.value[0].answer = options.value['option21-28']
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
      const res = await ApiService.post('answer/5', inputData.value)
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
    inputData.value[1].answer = []
  } else {
    for (let index = 0; index < 6; index++) {
      inputData.value[0].answer[index].score = null      
    }
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
      Exploration Area
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
              Develop your career plan and decide what is best for your future!
              <strong>Choose your mission!</strong>
            </p>
          </VAlertTitle>
        </VAlert>
        <VRadioGroup
          v-model="mission"
          class="mt-3"
        >
          <VRadio
            label="Take the 5 minute ONE*T test to find out which jobs woold fit you! "
            :value="1"
          />
          <VRadio
            label="Get to understand more about your dreams! Participate in a sharing session!"
            :value="2"
          />
        </VRadioGroup>
      
        <VDivider class="my-3" />
        <ol class="ms-5 my-3">
          <li v-if="mission==1">
            <strong>
              Take the 5 minute ONE*T test
            </strong>
            to find out which jobs woold fit you! 
            <ol
              type="I"
              class="ms-4 my-3"
            >
              <li class="mb-3">
                Please visit <a
                  href="https://www.mynextmove.org/explore/ip"
                  target="_blank"
                  rel="noopener noreferrer"
                >ONE*T test.</a>  <span style="color:red">*</span> 
              </li>
              <li>
                After finishing you have to write your score!
                <span style="color:red">*</span> 
                <VRow class="mt-3">
                  <VCol
                    v-for="item, index in inputData[0].answer"
                    :key="index"
                    cols="4"
                  >
                    <VTextField
                      v-model="inputData[0].answer[index].score"
                      :label="item.option_answer"
                      :rules="rules.required"
                      density="compact"
                    />
                  </VCol>
                </VRow>
              </li>
            </ol>
            <VDivider class="my-6" />
          </li>

          <li v-if="mission==2">
            <strong>
              Get to understand more about your dreams! 
            </strong>
            Participate in a sharing session!
            <ol
              type="I"
              class="ms-4 my-3"
            >
              <li class="mb-3">
                Speaker Name <span style="color:red">*</span>
                <VRadioGroup
                  v-model="inputData[1].answer[0]" 
                  :rules="rules.required"
                >
                  <VRadio
                    v-for="item in options['option22-29']"
                    :key="item"
                    :value="item"
                    :label="item.option_answer"
                  />
                </VRadioGroup>
              </li>
              <li v-if="inputData[1].answer[0]">
                Reflect on what you just learned! Let us know what was the most valuable lesson you obtained from them?
                <span style="color:red">*</span>
                <VTextarea
                  v-model="inputData[1].answer[0].answer_descriptive"
                  label="Reflection"
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
        <h4>You have successfully submitted this data</h4>
      </div>
    </VExpansionPanelText>
  </VExpansionPanel>
</template>
