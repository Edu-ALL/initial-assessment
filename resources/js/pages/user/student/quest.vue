<script setup>
import Exploration from '@/components/student/quest/exploration.vue'
import ProfileBuilding from '@/components/student/quest/profile-building.vue'
import Academic from '@/components/student/quest/academic.vue'
import Writing from '@/components/student/quest/writing.vue'
import Sponsor from '@/components/student/quest/sponsor.vue'
</script>

<template>
  <div id="quest">
    <VCard
      color="primary"
      class="mb-3"
    >
      <VCardTitle class="mb-4">
        <h3 class="text-white">
          <strong>
            🌟 Welcome to EduALL Quest: Your Path, Your Choice! 🌟
          </strong>
        </h3>
        <VDivider />
      </VCardTitle>
      <VCardText>
        <p>
          Dive into the adventure of learning with EduALL Quest, where YOU get to choose your path to success! It's all about choosing what you like. You get two cool choices for every activity, so you can learn your way. Whether you're a creative thinker, a problem solver, or a mix of both, there's a path waiting for you. Pick what you love and see how fun learning can be!
        </p>
      </VCardText>
    </VCard>
    <VExpansionPanels variant="popout">
      <Exploration />
      <ProfileBuilding />
      <Academic />
      <Writing />
      <Sponsor />
    </VExpansionPanels>

    <div class="w-100 d-flex justify-center mt-8">
      <RouterLink :to="{name:'quest'}">
        <VBtn color="primary">
          I have finished the quest!
        </VBtn>
      </RouterLink>
    </div>
  </div>
</template>
