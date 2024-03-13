<script setup>
import { ref } from 'vue'

const mission = ref()
</script>

<template>
  <VExpansionPanel>
    <VExpansionPanelTitle>
      <VIcon
        icon="bx-check-circle"
        class="me-2"
        color="success"
      />
      Academic Area
    </VExpansionPanelTitle>
    <VExpansionPanelText>
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
          value="1"
        />
        <VRadio
          label="Consult your subjects to ensure your best fit! "
          value="2"
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
              Test

              <VRadioGroup>
                <VRadio
                  v-for="item in ['SAT', 'IELTS', 'TOEFL']"
                  :key="item"
                  :label="item"
                  :value="item"
                />
              </VRadioGroup>
            </li>
            <li>
              <p>
                When chosen, they can insert their score
              </p>
              
              <VTextField
                label="Score"
                density="compact"
                type="number"
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

              <VTextarea
                label="Answer"
                density="compact"
                class="mt-3"
              />
            </li>
          </ol>
        </li>
      </ol>

      <div class="w-100 d-flex justify-center mt-4">
        <VBtn color="secondary">
          Submit
        </VBtn>
      </div>
    </VExpansionPanelText>
  </VExpansionPanel>
</template>
