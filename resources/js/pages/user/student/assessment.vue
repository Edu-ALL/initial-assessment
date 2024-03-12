
<script setup>
import Academic from '@/components/student/assessment/academic.vue'
import Closing from '@/components/student/assessment/closing.vue'
import Exploration from '@/components/student/assessment/exploration.vue'
import Intro from '@/components/student/assessment/intro.vue'
import ProfileBuilding from '@/components/student/assessment/profile-building.vue'
import Writing from '@/components/student/assessment/writing.vue'

const step = ref(3)

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
    <Intro
      v-if="step==1"
      @step="checkEmit"
    />

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

  <!-- Closing  -->
  <Closing
    v-if="step==6"
    @step="checkEmit"
  />
</template>
