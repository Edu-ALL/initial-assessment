
<script setup>
import Academic from "@/components/student/assessment/academic.vue";
import Closing from "@/components/student/assessment/closing.vue";
import Exploration from "@/components/student/assessment/exploration.vue";
import Intro from "@/components/student/assessment/intro.vue";
import ProfileBuilding from "@/components/student/assessment/profile-building.vue";
import Writing from "@/components/student/assessment/writing.vue";
import UserService from "@/services/UserService";
import { onMounted, ref } from "vue";

const step = ref(1);

const loading = ref(true);

const checkStep = (value) => {
  step.value = value;
};

const checkEmit = (value) => {
  checkStep(value);
};

onMounted(() => {
  setTimeout(() => {
    if (UserService.getUser().client?.took_initial_assessment == 1) {
      step.value = 6;
    }

    loading.value = false;
  }, 500);
});
</script> 


<template>
  <div id="assessment">
    <section v-if="!loading">
      <!-- Intro  -->
      <Intro v-if="step == 1" @step="checkEmit" />

      <!-- Exploration  -->
      <Exploration v-if="step == 2" @step="checkEmit" />

      <!-- Profile Building  -->
      <ProfileBuilding v-if="step == 3" @step="checkEmit" />

      <!-- Academic  -->
      <Academic v-if="step == 4" @step="checkEmit" />

      <!-- Writing  -->
      <Writing v-if="step == 5" @step="checkEmit" />

      <!-- Closing  -->
      <Closing v-if="step == 6" @step="checkEmit" />
    </section>
    <section v-if="loading">
      <div class="my-2">
        <VSkeletonLoader type="card, paragraph, paragraph" />
      </div>
    </section>
  </div>
</template>

<style lang="scss">
html {
  scroll-behavior: smooth;
}

ol li {
  margin-bottom: 5px;
}

ol[type="A"] {
  margin-left: 0px !important;
  font-size: 14px !important;
  margin-top: -10px !important;
}

.v-label {
  color: rgb(var(--v-theme-grey-500)) !important;
}

ol[type="A"] li::marker,
ol[type="A"] li label {
  color: rgb(var(--v-theme-primary));
}

// ol[type="A"] div {
//   color: rgb(var(--v-theme-primary));
// }
</style>
