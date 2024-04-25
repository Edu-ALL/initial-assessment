<script setup>
import ApiService from "@/services/ApiService";
import cepBanner from "@images/eduall/2024_POSTER QUEST_CEP BALI-01.webp";
import { watch } from "vue";

const result = ref();

const getRank = async () => {
  try {
    const res = await ApiService.get("ranking");

    result.value = res;
  } catch (error) {
    console.log(error);
  }
};

watch(() => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
  getRank();
});
</script>

<template>
  <!-- Intro  -->
  <VCard style="border-top: 10px solid rgb(var(--v-theme-primary))">
    <VCardText>
      <h2 class="mb-4">And thus the quiz has ended!</h2>

      <p>
        Let’s see which path would best fit you, embark on your launchpad
        journey, earn a personalized report & earn the chance to join our
        Community Empowerment Program in Bali FOR FREE!
      </p>

      <img :src="cepBanner" class="w-100 rounded shadow" />

      <div
        class="px-5 mt-8"
        style="border-left: 5px solid rgb(var(--v-theme-warning))"
      >
        <h2 class="mb-3">How to get it?</h2>
        <p>
          Based on your answers, we have created a customized journey for you to
          follow:
        </p>

        <ol class="ms-5 mb-5">
          <li v-for="(item, index) in result" :key="index" class="my-3">
            <span v-if="item.category == 'Exploration'">
              <div
                class="text-secondary text-decoration-underline font-weight-bold"
              >
                Interest Exploration Area
              </div>
              Discover more about yourself.
            </span>
            <span v-if="item.category == 'Profile Building'">
              <div
                class="text-secondary text-decoration-underline font-weight-bold"
              >
                Portfolio-Building Area
              </div>
              Identify what aspects you can hone.
            </span>
            <span v-if="item.category == 'Academic'">
              <div
                class="text-secondary text-decoration-underline font-weight-bold"
              >
                Academic Enrichment Area
              </div>
              Consult your current scores.
            </span>
            <span v-if="item.category == 'Writing'">
              <div
                class="text-secondary text-decoration-underline font-weight-bold"
              >
                Essay Writing Area
              </div>
              Delve deeper into what style of writing you’ll specifically need.
            </span>
          </li>
          <li class="my-3">
            <div
              class="text-secondary text-decoration-underline font-weight-bold"
            >
              Industry Partners Area
            </div>
            End your journey in a fun way with one of our collaborators.
          </li>
        </ol>
      </div>

      <p>
        As you take off on this journey of self-discovery, get the most out of
        each area by clicking each quest section below!
      </p>

      <div class="d-flex w-100 justify-center mt-10">
        <RouterLink :to="{ name: 'quest' }">
          <VBtn color="primary"> Start Your Quest Here! </VBtn>
        </RouterLink>
      </div>
    </VCardText>
  </VCard>
</template>
