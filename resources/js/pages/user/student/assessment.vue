
<script setup>
import Exploration from '@/components/student/assessment/exploration.vue'
import ProfileBuilding from '@/components/student/assessment/profile-building.vue'
import Academic from '@/components/student/assessment/academic.vue'
import Writing from '@/components/student/assessment/writing.vue'

const step = ref(1)

const checkStep = value => {
  step.value = value
}

const checkEmit = value => {
  checkStep(value)
}
</script> 


<template>
  <div id="assessment">
    <!-- Intro  -->
    <VCard
      v-if="step==1"
      color="primary"
    >
      <VCardTitle class="mb-4">
        <h3 class="text-white">
          <strong>
            Initial Assessment
          </strong>
        </h3>
        <VDivider />
      </VCardTitle>
      <VCardText>
        <p>
          Do you have what it takes to get into your uni of choice? Let's find out!
        </p>
        <p>
          Hey there! 🎓  Wondering if you're all set for the long university application journey? You're in the right spot! We're here to help you figure out if you're ready to dive in. This isn't your typical quiz. It's more like a fun, no-pressure check-in to see how ready you are.
        </p>
        <p>
          Take a moment to think about where you stand with your schoolwork, hobbies, profile-building and how confident you feel about expressing your ideas on paper as each aspect will be important for admissions!
          Here's how it goes:
        </p>
        <ul class="ps-5 mb-3">
          <li>
            Chill and read each question at your own pace.
          </li>
          <li>
            Be super honest with your answers – just go with what feels right.
          </li>
          <li>
            If you hit a question that makes you go 🤔, pick the answer that's closest to your gut feeling.
          </li>
        </ul>
        <p>
          This quiz is your personal launchpad to getting university-ready. So, let's find out what you're rocking at and where you can level up. Ready to explore? Let’s get started!
        </p>
      </VCardText>
      <VCardActions class="justify-end">
        <VBtn
          variant="elevated"
          class="me-5 mb-1 bg-success"
          @click="step=2"
        >
          <span class="me-2">Next</span>
          <VIcon icon="bx-chevron-right" />
        </VBtn>
      </VCardActions>
    </VCard> 
   
    <!-- Exploration  -->
    <Exploration
      v-if="step==2"
      @step="checkEmit"
    />

    <!-- Profile Building  -->
    <ProfileBuilding
      v-if="step==3"
      @step="checkEmit"
    />

    <!-- Academic  -->
    <Academic
      v-if="step==4"
      @step="checkEmit"
    />

    <!-- Writing  -->
    <Writing
      v-if="step==5"
      @step="checkEmit"
    />
  </div>
</template>
