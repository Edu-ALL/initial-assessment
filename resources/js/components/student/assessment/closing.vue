<script setup>
import ApiService from '@/services/ApiService'
import { watch } from 'vue'

const result = ref()

const getRank = async () => {
  try {
    const res = await ApiService.get('ranking')

    result.value = res
  } catch(error) {
    console.log(error)
  }
}

watch(() => {
  getRank()
})
</script>

<template>
  <!-- Intro  -->
  <VCard>
    <VCardText>
      <h2 class="mb-4">
        And thus the quiz has ended! 
      </h2>

      <p>
        Let’s see which path would best fit you, embark on your launchpad journey, earn a personalized report & earn the chance to join our Community Empowerment Program in Bali FOR FREE!
      </p>

      <p>
        Based on your answers, we have created a customized journey for you to follow:
      </p>

      <ul class="ms-5 mb-5">
        <li
          v-for="item, index in result"
          :key="index"
          class="my-3"
        >
          <span v-if="index==0">
            Embark first
          </span>
          <span v-if="index==1">
            Second, 
          </span>
          <span v-if="index==2">
            Third, 
          </span>
          <span v-if="index==3">
            Fourth, 
          </span>

          <span v-if="item.category=='Exploration'">
            to the <strong>exploration area!</strong>  Discover more about yourself and how it’ll be vital in shaping your future.
          </span>
          <span v-if="item.category=='Profile Building'">
            move on to find out more about the <strong>profile-building area!</strong> Identify what aspects you can hone to stand out more in an ever-growing competitive landscape.
          </span>
          <span v-if="item.category=='Academic'">
            change your course to the <strong>academic area!</strong> Consult your current scores and understand strategies on how to upgrade your academic profile.  
          </span>
          <span v-if="item.category=='Writing'">
            understand yourself better in the <strong>writing area!</strong> Delve deeper into what style of writing you’ll specifically need to master and what personal experiences you can utilize towards that goal.
          </span>
        </li>
        <li class="my-3">
          End the journey by refreshing your mind at one of our collaborator booths!
        </li>
      </ul>

      <p>
        As you take off on this journey of self-discovery, get the most out of each area by clicking each quest section below!
      </p>

      <div class="d-flex w-100 justify-center mt-10">
        <RouterLink :to="{name:'quest'}">
          <VBtn color="secondary">
            [Start Your Quest Here!]
          </VBtn>
        </RouterLink>
      </div>
    </VCardText>
  </VCard> 
</template>
