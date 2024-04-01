<script setup>
import { watch } from "vue"

const props = defineProps({
  id: Number,
  took_ia: Number,
  data: Object,
})

const route = useRoute()
const activeTab = ref(route.params.tab)

// tabs
const tabs = [
  {
    title: 'Exploration',
    icon: 'bx-tag',
    tab: 'assessment',
  },
  {
    title: 'Profile Building',
    icon: 'bx-tag',
    tab: 'profile-building',
  },
  {
    title: 'Academic',
    icon: 'bx-tag',
    tab: 'academic',
  },
  {
    title: 'Writing',
    icon: 'bx-tag',
    tab: 'writing',
  },
]

const questions = ref(props.data['Exploration'])

const checkAssessment = tab => {
  questions.value = props.data[tab]
}

const downloadPdf = type => {
  if(type=='result') {
    window.open('/api/report/'+props.id, '_blank')
  }
}
</script>

<template>
  <VCard v-if="took_ia==1">
    <VCardTitle>
      <div class="d-flex justify-between align-center w-100">
        <span class="w-100">
          Assessment
        </span>
        <div>
          <VBtn
            color="primary"
            density="comfortable"
            class="mx-1"
            @click="downloadPdf('result')"
          >
            <VIcon
              icon="bx-download"
              class="me-2"
            /> Result
          </VBtn>
          <VBtn
            color="secondary"
            density="comfortable"
            class="mx-1"
            @click="downloadPdf('summary')"
          >
            <VIcon
              icon="bx-download"
              class="me-2"
            /> Recap
          </VBtn>
        </div>
      </div>
    </VCardTitle>
    <VDivider />
    <VCardText> 
      <VTabs
        v-model="activeTab"
        show-arrows
      >
        <VTab
          v-for="item in tabs"
          :key="item.icon"
          :value="item.title"
          @click="checkAssessment(item.title)"
        >
          <VIcon
            size="20"
            start
            :icon="item.icon"
          />
          {{ item.title }}
        </VTab>
      </VTabs>

      <VTable
        height="500px"
        fixed-header
        style="border:1px solid #dedede"
      >
        <thead>
          <tr style="background:blue">
            <th style="border:1px solid #f7f2f2">
              No
            </th>
            <th style="text-align:left !important">
              Questions/Answer
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item, index in questions"
            :key="index"
          >
            <td
              class="text-center"
              width="2%"
              style="border:1px solid #f7f2f2"
            >
              {{ index + 1 }}
            </td>
            <td
              width="60%"
              class="py-3"
            >
              <div class="text-secondary mb-1">
                <VIcon
                  icon="bx-tag-alt"
                  color="disabled"
                />
                {{ item.question?.title }}
              </div>


              <ol
                v-if="item.question?.sub_question.length>0"
                type="A"
                class="ms-11"
              >
                <li
                  v-for="sub in item.question?.sub_question"
                  :key="sub"
                  class="mb-3"
                >
                  <span class="text-primary">
                    {{ sub.title }}
                  </span> <br>
                  Answer: 

                  <div
                    v-for="i, n in sub.answer?.option"
                    :key="n"
                  >
                    <span
                      v-if="sub.answer?.descriptive[n]"
                      class="text-capitalize"
                    >
                      {{ sub.answer?.descriptive[n] }}&nbsp;
                    </span>
                    <span v-if="i">
                      {{ sub.answer?.option.length > 1 ? '-&nbsp;':'' }}
                      {{ i }}
                    </span>
                    <span v-if="sub.answer?.score[n] && sub.answer?.option.length > 1">
                      (
                      {{ sub.title=='How many internships have you participated in?' ? 'Hours: ' :'Score: ' }}
                      {{ sub.answer?.score[n] }}
                      )
                    </span>
                    <span v-if="sub.answer?.score[n] && sub.answer?.option.length==1">
                      {{ sub.title=='How many internships have you participated in?' ? 'Hours: ' :'Score: ' }}
                      {{ sub.answer?.score[n] }}
                    </span>
                  </div>
                </li>
              </ol>

              <div
                v-else
                class="ms-6"
              >
                Answer: 
                <div
                  v-for="i, n in item.question?.answer?.option"
                  :key="n"
                >
                  <span
                    v-if="item.question?.answer?.descriptive[n]"
                    class="text-capitalize"
                  >
                    {{ item.question?.answer?.descriptive[n] }}&nbsp;
                  </span>
                  <span v-if="i">
                    {{ item.question?.answer?.option.length > 1 ? '-&nbsp;':'' }}
                    {{ i }}
                  </span>
                  <span v-if="item.question?.answer?.score[n] && item.question?.answer?.option.length > 1">
                    (
                    Score: 
                    {{ item.question?.answer?.score[n] }}
                    )
                  </span>
                  <span v-if="item.question?.answer?.score[n] && item.question?.answer?.option.length==1">
                    Score: 
                    {{ item.question?.answer?.score[n] }}
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </VTable>
    </VCardText>
  </VCard>

  <VCard v-else>
    <VCardTitle>
      Did not make an assessment.
    </VCardTitle>
  </VCard>
</template>

