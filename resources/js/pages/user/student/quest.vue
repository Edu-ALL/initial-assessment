<script setup>
import Academic from '@/components/student/quest/academic.vue'
import Exploration from '@/components/student/quest/exploration.vue'
import ProfileBuilding from '@/components/student/quest/profile-building.vue'
import Sponsor from '@/components/student/quest/sponsor.vue'
import Writing from '@/components/student/quest/writing.vue'
import { confirmBeforeSubmit } from '@/helper/notification'
import { verifyAuth } from '@/helper/verifyAuth'
import ApiService from '@/services/ApiService'
import UserService from '@/services/UserService'
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

const submitQuest = async () => {
  const confirmed = await confirmBeforeSubmit('Are you sure to finishing the Quest?')
  if (confirmed) {
    // Lakukan pengiriman data
    try {
      const res = await ApiService.post('took_quest', {
        took_quest: 1,
      })

      if(res.success) {
        verifyAuth().checkMe()
        window.location.reload()
      } else {
        showNotif('error', res.message)
      }
    } catch (error) {
      console.error(error)
    }
  }
}

watch(() => {
  getRank()
})
</script>

<template>
  <div id="quest">
    <!-- Skeleton  -->
    <section v-if="loading">
      <VSkeletonLoader
        type="card"
        class="mb-5"
      />
      
      <div
        v-for="i in 4"
        :key="i"
        class="my-2"
      >
        <VSkeletonLoader type="paragraph" />     
      </div> 
    </section>
   
    <section v-if="result && !loading && UserService.getUser().client.took_quest==0">
      <VCard
        color="primary"
        class="mb-3"
      >
        <VCardTitle class="mb-4">
          <h3 class="text-white text-wrap text-xl text-md-h5 mt-4">
            <strong>
              Welcome to EduALL Quest: Your Path, Your Choice!
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
      <VExpansionPanels>
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
        <VBtn
          color="primary"
          @click="submitQuest"
        >
          I have finished the quest!
        </VBtn>
      </div>
    </section>

    <section v-if="result && !loading && UserService.getUser().client.took_quest==1">
      <VCard color="primary">
        <VCardText>
          <h2 class="mb-5 text-white">
            Congratulations,
          </h2>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident, dicta minus veritatis atque perferendis, libero cumque numquam tenetur consequuntur magnam adipisci sed, voluptates hic obcaecati. Maiores exercitationem asperiores excepturi facilis?
          </p>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam dolorem, molestias, dolore eum fugiat voluptatem ducimus facere alias qui rem vero dicta consequuntur quis porro eveniet at odio debitis nam.
          </p>
        </VCardText>
      </VCard>
    </section>
  </div>
</template>
