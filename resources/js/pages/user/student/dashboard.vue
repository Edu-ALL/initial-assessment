<script setup>
import { verifyAuth } from "@/helper/verifyAuth"
import ApiService from "@/services/ApiService"
import UserService from "@/services/UserService"
import illustrationJohnDark from "@images/cards/illustration-john-dark.png"
import illustrationJohnLight from "@images/cards/illustration-john-light.png"
import cepBanner from "@images/eduall/2024_POSTER QUEST_CEP BALI-02.webp"
import { ref } from "vue"
import { useTheme } from "vuetify"
import { VCardText } from "vuetify/lib/components/index.mjs"

const { global } = useTheme()

const illustrationJohn = computed(() =>
  global.name.value === "dark" ? illustrationJohnDark : illustrationJohnLight,
)

const user = ref(UserService.getUser())

const downloadPdf = async type => {
  const id = user.value.client?.id
  if (type == "result") {
    window.open("/api/report/" + id, "_blank")
  } else {
    window.open("/api/report/" + id + "/summary", "_blank")
  }
}

const downloadQuestPdf = async () => {
  const id = user.value.client?.id

  window.open("/api/report_quest/" + id, "_blank")
}

onMounted(() => {
  verifyAuth().checkMe()
  user.value = UserService.getUser()
})
</script>

<template>
  <VRow>
    <!-- 👉 Congratulations -->
    <VCol
      cols="12"
      md="6"
    >
      <VCard
        v-if="user.client?.took_initial_assessment == 1"
        class="text-center text-sm-start mb-1"
      >
        <VRow no-gutters>
          <VCol
            cols="12"
            sm="8"
            order="2"
            order-sm="1"
          >
            <VCardItem>
              <h3>Congratulations {{ user.client?.full_name }}! 🎉</h3>
            </VCardItem>

            <VCardText>
              <span>
                Thank you for completing the assessment. Check your results by
                clicking the button below.
              </span>
              <br>
              <br>
              <VBtn
                class="my-1 me-2"
                size="small"
                @click="downloadPdf('result')"
              >
                Your Personalized Report
              </VBtn>
              <!--
                <VBtn
                color="secondary"
                class="my-1"
                size="small"
                @click="downloadPdf('recap')"
                >
                Your Answers
                </VBtn> 
              -->
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
              :class="
                $vuetify.display.xs ? 'mt-6 mb-n2' : 'position-absolute mt-10'
              "
              class="john-illustration flip-in-rtl"
            >
          </VCol>
        </VRow>
      </VCard>

      <a
        href="https://community-empowerment.edu-all.com/"
        target="_blank"
      >
        <img
          :src="cepBanner"
          class="w-100 rounded shadow"
          :class="$vuetify.display.xs ? 'd-none' : 'd-block mt-5'"
        >
      </a>
    </VCol>

    <VCol
      cols="12"
      md="6"
    >
      <VCard style="border-bottom: 5px solid #1414ff">
        <VCardTitle class="my-1">
          <div class="d-flex justify-between align-center w-100">
            <span class="w-100"> Report Activity </span>

            <VBtn
              v-if="user.client?.took_quest == 1"
              density="compact"
              color="primary"
              class="px-2"
              style="min-width: 10px !important"
              @click="downloadQuestPdf"
            >
              <VTooltip
                activator="parent"
                location="start"
              >
                Download
              </VTooltip>
              <VIcon
                icon="bx-download"
                class="py-1"
              />
            </VBtn>
          </div>
        </VCardTitle>
        <VDivider />
        <VCardText class="text-dark">
          <VTimeline
            align="start"
            side="end"
          >
            <VTimelineItem
              v-for="(item, index) in user.quest"
              :key="index"
              :dot-color="item ? 'success' : 'primary'"
              size="small"
            >
              <!-- Exploration -->
              <div class="d-flex">
                <strong class="me-4">
                  <VIcon
                    :icon="item ? 'bx-check' : 'bx-question-mark'"
                    :color="item ? 'success' : 'primary'"
                  />
                </strong>
                <div v-if="index == 'Exploration'">
                  <strong>Interest Exploration Area</strong>
                  <div class="text-caption">
                    Discover more about yourself and how it’ll be vital in
                    shaping your future.
                  </div>
                </div>
                <div v-if="index == 'Profile Building'">
                  <strong>Profile-Building Area</strong>
                  <div class="text-caption">
                    Identify what aspects you can hone to stand out more in an
                    ever-growing competitive landscape.
                  </div>
                </div>
                <div v-if="index == 'Academic Profiling'">
                  <strong>Academic Enrichment Area</strong>
                  <div class="text-caption">
                    Consult your current scores and understand strategies on how
                    to upgrade your academic profile.
                  </div>
                </div>
                <div v-if="index == 'Writing'">
                  <strong>Essay Writing Area</strong>
                  <div class="text-caption">
                    Delve deeper into what style of writing you’ll specifically
                    need to master and what personal experiences you can utilize
                    towards that goal.
                  </div>
                </div>

                <div v-if="index == 'Sponsor'">
                  <strong>Industry Partners Area</strong>
                  <div class="text-caption">
                    End the journey by refreshing your mind at one of our
                    collaborator booths!
                  </div>
                </div>
              </div>
            </VTimelineItem>
          </VTimeline>
        </VCardText>
      </VCard>

      <a
        href="https://community-empowerment.edu-all.com/"
        target="_blank"
      >
        <img
          :src="cepBanner"
          class="w-100 rounded shadow"
          :class="$vuetify.display.xs ? 'd-block mt-5' : 'd-none'"
        >
      </a>
    </VCol>
  </VRow>
</template>
