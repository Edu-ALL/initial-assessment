<script setup>
import { rules } from '@/helper/rules'
import { defineEmits } from 'vue'

const emits = defineEmits(['step'])

const formData = ref()

const radioData = ref({
  radio1: 'yes',
  radio2: 'yes',
})

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
  ],
)


const checkStep = value => {
  emits('step', value)
}

const submit = async () => {
  const { valid } = await formData.value.validate()

  if (valid) {
    console.log(inputData.value) 
    checkStep(5)
  }
}
</script>

<template>
  <!-- Academic  -->
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
              label="Answer"
              density="compact"
              closable-chips
              chips
              class="mt-3"
              :rules="rules.required"
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
              label="Answer"
              density="compact"
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

              <VRadioGroup v-model="radioData.radio1">
                <VRadio
                  label="Yes"
                  value="yes"
                />
                <VRadio
                  label="I don't know"
                  value="no"
                />
              </VRadioGroup>

              <VDivider class="my-3" />

              ---- Option Here ----
            </div>
          </li>

          <!-- Question 4  -->
          <li class="my-5">
            <div class="mb-3">
              Have you done any standardized tests?
              <span style="color:red">*</span>

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

              <VRow>
                <VCol cols="4">
                  <VTextField
                    type="number"
                    label="IELTS"
                    density="compact"
                    :disabled="radioData.radio2=='no'"
                  />
                </VCol>
                <VCol cols="4">
                  <VTextField
                    type="number"
                    label="TOEFL"
                    density="compact"
                    :disabled="radioData.radio2=='no'"
                  />
                </VCol>
                <VCol cols="4">
                  <VTextField
                    type="number"
                    label="SAT"
                    density="compact"
                    :disabled="radioData.radio2=='no'"
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

              <VRadioGroup :rules="rules.required">
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
          @click="checkStep(3)"
        >
          <VIcon icon="bx-chevron-left" />
          <span class="me-2">Profile Building</span>
        </VBtn>

        <VBtn
          variant="elevated"
          class="me-5 mb-1"
          type="submit"
        >
          <span class="me-2">Writing</span>
          <VIcon icon="bx-chevron-right" />
        </VBtn>
      </VCardActions>
    </VForm>
  </VCard>
</template>
