<script setup>
import Academic from '@/components/student/quest/academic.vue'
import Exploration from '@/components/student/quest/exploration.vue'
import ProfileBuilding from '@/components/student/quest/profile-building.vue'
import Sponsor from '@/components/student/quest/sponsor.vue'
import Writing from '@/components/student/quest/writing.vue'
import ApiService from '@/services/ApiService'
import { ref, watch } from 'vue'

const result = ref()
const loading = ref(false)

const getRank = async () => {
  loading.value = true
  try {
    const res = await ApiService.get('ranking')

    result.value = res
    loading.value = false
  } catch(error) {
    loading.value = false
    console.log(error)
  }
}

watch(() => {
  getRank()
})
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
    
    <!-- Skeleton  -->
    <div
      v-for="i in 4"
      :key="i"
      class="my-2"
    >
      <VSkeletonLoader
        v-if="loading"
        type="paragraph"
      />     
    </div> 
   
    
    <VExpansionPanels v-if="result && !loading">
      <div
        v-for="item, index in result"
        :key="index"
        class="w-100 my-1"
      >
        <Exploration v-if="item.category=='Exploration'" />
        <ProfileBuilding v-if="item.category=='Profile Building'" />
        <Academic v-if="item.category=='Academic'" />
        <Writing v-if="item.category=='Writing'" />
      </div>
      <Sponsor class="w-100 my-1" />
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
