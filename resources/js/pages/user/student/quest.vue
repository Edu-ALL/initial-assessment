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
import { onMounted, ref, watch } from 'vue'
import illustrationJohn from '@images/cards/illustration-john-light.png'

const result = ref()
const loading = ref(false)
const user = ref(UserService.getUser())
const is_completed = ref(false)

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
        await verifyAuth().checkMe()

        window.location.reload()
      } else {
        showNotif('error', res.message)
      }
    } catch (error) {
      console.error(error)
    }
  }
}

const checkQuest = () => {
  const quest = user.value.quest
  
  is_completed.value = Object.values(quest).every(value => value === true)
}

const downloadPdf = () => {
  const id = user.value.client?.id

  window.open('/api/report_quest/'+id, '_blank')
}

watch(() => {
  checkQuest()
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
   
    <section v-if="result && !loading && user.client?.took_quest==0">
      <VCard
        style="border-bottom:10px solid #0000FF"
        class="mb-3"
      >
        <VCardTitle class="mb-4">
          <h3 class="text-wrap text-xl text-md-h5 mt-4 mb-2">
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
          <Exploration
            v-if="item.category=='Exploration'"
            style="border-left:4px solid #0000FF"
          />
          <ProfileBuilding
            v-if="item.category=='Profile Building'"
            style="border-left:4px solid #0000FF"
          />
          <Academic
            v-if="item.category=='Academic'"
            style="border-left:4px solid #0000FF"
          />
          <Writing
            v-if="item.category=='Writing'"
            style="border-left:4px solid #0000FF"
          />
        </div>
        <Sponsor
          class="w-100 my-1"
          style="border-left:4px solid #0000FF"
        />
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
    
    <section v-if="result && !loading && user.client?.took_quest==1">
      <VCard
        class="position-relative overflow-hidden"
        style="border-bottom:10px solid #0000FF"
      >
        <VCardText>
          <h2
            class="mb-md-8 mb-5"
            style="line-height:1.2;"
          >
            {{ is_completed ? 'Congratulations on finishing ALL the quest missions!' : 'Congratulations on Completing the Quest.' }}
          </h2>
          <p v-if="!is_completed">
            Claim your reward now! 
          </p>
          <VBtn
            v-if="!is_completed"
            color="secondary"
            class="mb-md-7 mb-5"
            @click="downloadPdf"
          >
            Get Your Free Personalized Report
          </VBtn>
          
          <div :style="$vuetify.display.xs ? 'max-width:70%' :'max-width:60%'">
            <h3 class="mb-2">
              What’s Next?
            </h3>
            <p v-if="is_completed">
              Head over to the EduALL booth to earn:
              <ul class="ms-5">
                <li class="my-2">
                  Your own personalized uni application progress report
                </li>
                <li class="my-2">
                  Quest completer exclusive prize (limited)
                </li>
                <li class="my-2">
                  Expert guidance from our mentors
                </li>
                <li class="my-2">
                  Raffle ticket to win EduALL Community Empowerment Program in Bali
                </li>
              </ul>
            </p>
            <p v-else>
              If you need further assistance in understanding your report, 
              stop by the EduALL booth to receive expert guidance from our mentors!
            </p>
          </div>

          <img
            :src="illustrationJohn"
            alt="EduALL Quest"
            class="position-absolute"
            :width="$vuetify.display.xs ? '55%' : '28%'"
            style="bottom:-5%; right:-10%"
          >
        </VCardText>
      </VCard>
    </section>
  </div>
</template>

<style lang="scss">
ol li {
  margin-bottom: 5px;
}

ol[type="I"] {
  margin-left: 0px !important;
  font-size: 14px !important;
}

ol[type="A"] li {
  color: blue;
}

ol[type="A"] div {
  color: rgb(75, 75, 75);
}
</style>
