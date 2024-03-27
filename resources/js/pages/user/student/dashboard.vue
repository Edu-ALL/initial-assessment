<script setup>
import ApiService from '@/services/ApiService'
import UserService from '@/services/UserService'
import illustrationJohnDark from '@images/cards/illustration-john-dark.png'
import illustrationJohnLight from '@images/cards/illustration-john-light.png'
import { ref } from 'vue'
import { useTheme } from 'vuetify'
import { VCardText } from 'vuetify/lib/components/index.mjs'

const { global } = useTheme()
const illustrationJohn = computed(() => global.name.value === 'dark' ? illustrationJohnDark : illustrationJohnLight)

const user = ref(UserService.getUser())

const downloadPdf = async () => {
  const id = user.value.client?.id

  window.open('/api/report/'+id, '_blank')
}
</script>

<template>
  <VRow>
    <!-- 👉 Congratulations -->
    <VCol
      cols="12"
      md="6"
    >
      <VCard
        v-if="user.client.took_initial_assessment"
        class="text-center text-sm-start mb-4"
      >
        <VRow no-gutters>
          <VCol
            cols="12"
            sm="8"
            order="2"
            order-sm="1"
          >
            <VCardItem>
              <h3>
                Congratulations {{ user.client.full_name }}! 🎉
              </h3>
            </VCardItem>

            <VCardText>
              <span>
                Thank you for completing the questionnaire. Check your results by clicking the button below.
              </span>
              <br>
              <VBtn
                variant="tonal"
                class="mt-4"
                size="small"
                @click="downloadPdf"
              >
                Download Result
              </VBtn>
            </VCardText>
          </VCol>

          <VCol
            cols="12"
            sm="1"
            order="1"
            order-sm="2"
            class="text-center"
          >
            <img
              :src="illustrationJohn"
              :height="$vuetify.display.xs ? '150' : '175'"
              :class="$vuetify.display.xs ? 'mt-6 mb-n2' : 'position-absolute mt-10'"
              class="john-illustration flip-in-rtl"
            >
          </VCol>
        </VRow>
      </VCard>

      <VCard>
        <VCardText>
          <h3>Notes</h3>
        </VCardText>
      </VCard>
    </VCol>

    <VCol
      cols="12"
      md="6"
    >
      <VCard style="background:blue">
        <VCardTitle class="my-2 text-white">
          <div class="d-flex justify-between align-center w-100">
            <span class="w-100">
              Your Quest
            </span>
            <div class="cursor-pointer text-white">
              <VTooltip
                activator="parent"
                location="start"
              >
                Download Quest Result
              </VTooltip>
              <VIcon icon="bx-download" />
            </div>
          </div>
        </VCardTitle>
        <VDivider />
        <VCardText
          class="text-dark"
          style="background:white"
        >
          <VTimeline
            align="start"
            side="end"
          >
            <VTimelineItem
              v-for="item,index in user.quest"
              :key="index"
              :dot-color="item ? 'success':'primary'"
              size="small"
            >
              <!-- Exploration -->
              <div class="d-flex">
                <strong class="me-4">
                  <VIcon
                    :icon="item ? 'bx-check':'bx-question-mark'"
                    :color="item ? 'success':'primary'"
                  />
                </strong>
                <div v-if="index=='Exploration'">
                  <strong>Exploration Area</strong>
                  <div class="text-caption">
                    Discover more about yourself and how it’ll be vital in shaping your future.
                  </div>
                </div>
                <div v-if="index=='Profile Building'">
                  <strong>Profile Building Area</strong>
                  <div class="text-caption">
                    Identify what aspects you can hone to stand out more in an ever-growing competitive landscape.
                  </div>
                </div>
                <div v-if="index=='Academic Profiling'">
                  <strong>Academic Profiling Area</strong>
                  <div class="text-caption">
                    Consult your current scores and understand strategies on how to upgrade your academic profile. 
                  </div>
                </div>
                <div v-if="index=='Writing'">
                  <strong>Writing Area</strong>
                  <div class="text-caption">
                    Delve deeper into what style of writing you’ll specifically need to master and what personal experiences you can utilize towards that goal.
                  </div>
                </div>

                <div v-if="index=='Sponsor'">
                  <strong>Sponsor Area</strong>
                  <div class="text-caption">
                    End the journey by refreshing your mind at one of our collaborator booths!
                  </div>
                </div>
              </div>
            </VTimelineItem>
          </VTimeline>          
        </VCardText>
      </VCard>
    </VCol>
  </VRow>
</template>
