<script setup>
import { confirmBeforeSubmit, showNotif } from '@/helper/notification'
import { rules } from '@/helper/rules'
import { verifyAuth } from '@/helper/verifyAuth'
import ApiService from '@/services/ApiService'
import UserService from '@/services/UserService'
import { ref, watch } from 'vue'

const done = ref(UserService.getUser().quest['Profile Building'])
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
      question_id: 23,
      sub_question_id: 32,
      answer_descriptive: "",
    }],
  },
  {
    answer: [],
  },
  {
    answer: [],
  },
])

const getOptions =  async() => {
  const endpoint = 'question/6'
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
  console.log(inputData.value)

  const confirmed = await confirmBeforeSubmit('Are you sure to submitting data?')
  if (confirmed) {
    // Lakukan pengiriman data
    loading.value = true
    try {
      const res = await ApiService.post('answer/6', inputData.value)
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

const changeRadio = () => {
  const mission_choosed = mission.value

  if(mission_choosed==1) {
    inputData.value[1].answer = [{
      id: null,
      question_id: 23,
      sub_question_id: 32,
      answer_descriptive: "",
    }]
    inputData.value[2].answer = []
    inputData.value[3].answer = []
  } else {
    inputData.value[0].answer = []
    inputData.value[1].answer = []
    inputData.value[3].answer = [{
      id: null,
      question_id: 24,
      sub_question_id: 34,
      answer_descriptive: "",
    }]
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
      Profile Building Area
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
              Set the stage for your success beyond high school and understand how to stand out in a competitive landscape!
              <strong>Choose your mission!</strong>
            </p>
          </VAlertTitle>
        </VAlert>

        <VRadioGroup
          v-model="mission"
          class="mt-3"
          @change="changeRadio"
        >
          <VRadio
            label="Visit an NGO booth and be inspired to help out (encourage NGO to also create a small activity)"
            :value="1"
          />
          <VDivider class="my-2" />
          <VRadio
            label="Participate in STEM+ activities to gauge what interests you!"
            :value="2"
          />
        </VRadioGroup>
        <VDivider class="my-3" />

        <ol class="ms-5 my-3">
          <li v-if="mission==1">
            <strong>
              Visit an NGO booth 
            </strong>
            and be inspired to help out (encourage NGO to also create a small activity)
            <ol
              type="I"
              class="ms-4 my-3"
            >
              <li class="mb-3">
                Which NGO representative did you meet? 
                <span style="color:red">*</span> 

                <VRadioGroup
                  v-model="inputData[0].answer[0]" 
                  :rules="rules.required"
                >
                  <VRadio
                    v-for="item in options['option23-31']"
                    :key="item"
                    :value="item"
                    :label="item.option_answer"
                  />
                </VRadioGroup>
              </li>
              <li>
                How do you think you can use your skills and/or interests to contribute to their causes?
                <span style="color:red">*</span> 
                <VTextarea
                  v-model="inputData[1].answer[0].answer_descriptive"
                  label="Description"
                  density="compact"
                  class="mt-3"
                  :rules="rules.required"
                />
              </li>
            </ol>
            <VDivider class="my-6" />
          </li>

          <li v-if="mission==2">
            <strong>
              Participate in STEM+ activities 
            </strong> 
            to gauge what interests you! 

            <ol
              type="I"
              class="ms-4 my-3"
            >
              <li class="mb-3">
                What topic did you learn about in this area?
                <span style="color:red">*</span> 
                <VRadioGroup
                  v-model="inputData[2].answer[0]" 
                  :rules="rules.required"
                >
                  <VRadio
                    v-for="item in options['option24-33']"
                    :key="item"
                    :value="item"
                    :label="item.option_answer"
                  />
                </VRadioGroup>
              </li>
              <li>
                From your observation, what potential project can you think of?
                <span style="color:red">*</span> 
                <VTextarea
                  v-model="inputData[3].answer[0].answer_descriptive"
                  label="Description"
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
  