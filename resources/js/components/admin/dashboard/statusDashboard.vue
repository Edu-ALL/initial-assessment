<script setup>
import student from '@images/cards/student.png'
import assessment from '@images/cards/assessment.png'
import quest from '@images/cards/quest.png'
</script>

<template>
  <VRow>
    <VCol
      md="12"
      cols="12"
    >
      <VCard>
        <VCardText>
          <div class="d-flex justify-between align-center">
            <div class="title w-100">
              <h3 class="mb-3 text-disabled">
                Student Total
              </h3>
              <h1>120</h1>
            </div>
    
            <img
              :src="student"
              class="text-end"
              width="50px"
            >
          </div>
        </VCardText>
      </VCard>
    </VCol>
    <VCol
      md="6"
      cols="12"
    >
      <VCard>
        <VCardText>
          <div class="d-flex justify-between align-center">
            <div class="title w-100">
              <h3 class="mb-3 text-disabled">
                Initial Assessment
              </h3>
              <h1>120</h1>
            </div>
    
            <img
              :src="assessment"
              class="text-end"
              width="50px"
            >
          </div>
        </VCardText>
      </VCard>
    </VCol>
    <VCol
      md="6"
      cols="12"
    >
      <VCard>
        <VCardText>
          <div class="d-flex justify-between align-center">
            <div class="title w-100">
              <h3 class="mb-3 text-disabled">
                Take a Quest
              </h3>
              <h1>120</h1>
            </div>
    
            <img
              :src="quest"
              class="text-end"
              width="50px"
            >
          </div>
        </VCardText>
      </VCard>
    </VCol>
  </VRow>
</template>
