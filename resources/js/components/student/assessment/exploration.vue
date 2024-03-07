<script setup>
import ApiService from '@/services/ApiService'
import { defineEmits, onMounted } from 'vue'

const emits = defineEmits(['step'])

const inputData = ref()

const questions = ref()

const getQuestion =  async() => {
  const endpoint = 'response'
  try {
    const res = await ApiService.get(endpoint)
    if (res.success) {
      questions.value = res.data[1]['Exploration']
    }
    console.log(res)
  } catch (error) {
    console.error(error)
  }
}

const checkStep = value => {
  emits('step', value)
}

const itemProps = item => {
  return {
    title: item.option_answer,
    subtitle: item.title_of_answer,
  }
}


onMounted(() => {
  getQuestion()
})
</script>

<template>
  <!-- Exploration  -->
  <VCard>
    <VCardTitle class="mb-4">
      <h3>
        <strong>
          Exploration
        </strong>
      </h3>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <p>
        <strong>
          How well have you explored yourself?
        </strong>
        This area aims to understand your personality, values, interests, and skills/aptitudes that will help you develop your career plan and decide what is best for your future!
      </p>
    </VCardText>
    <VCardText>
      <div
        v-for="item in questions"
        :key="item"
        class=""
      >
        <!-- Main Question  -->
        <section>
          <p>
            <span class="text-primary">
              {{ item.title }}
            </span>
            <span
              v-if="item?.question_type=='mandatory'"
              style="color: red;"
              class="ms-3"
            >*</span>
          </p>
          <small>{{ item.description }}</small>

          <!-- Sub Question  -->
          <section v-if="item?.sub_question">
            <div
              v-for="sub_item in item.sub_question"
              :key="sub_item"
              class=""
            >
              <p>
                <span>
                  {{ sub_item.title }}
                </span>
                <span
                  v-if="sub_item.question_type=='mandatory'"
                  style="color: red;"
                  class="ms-3"
                >*</span>
              </p>
              <section
                v-if="sub_item?.options"
                class="mb-5"
              >
                <VSelect
                  v-model="data.answer"
                  :item-props="itemProps"
                  :items="sub_item.options"
                  item-value="id"
                  label="'Choose the option"
                  closable-chips="true"
                  :counter="sub_item.maximum_answer"
                  chips
                  multiple
                />
              </section>
            </div>
          </section>
        </section>
      </div>
    </VCardText>
    <VCardActions class="justify-space-between">
      <VBtn
        variant="elevated"
        class="ms-3 mb-1 bg-warning"
        @click="checkStep(1)"
      >
        <VIcon icon="bx-chevron-left" />
        <span class="me-2">Back</span>
      </VBtn>

      <VBtn
        variant="elevated"
        class="me-5 mb-1"
        @click="checkStep(3)"
      >
        <span class="me-2">Profile Building</span>
        <VIcon icon="bx-chevron-right" />
      </VBtn>
    </VCardActions>
  </VCard>
</template>
