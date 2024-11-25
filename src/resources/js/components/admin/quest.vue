<script setup>
const props = defineProps({
  id: Number,
  took_quest: Number,
  data: Object,
})

const route = useRoute()
const activeTab = ref(route.params.tab)

// tabs
const tabs = [
  {
    title: 'Exploration Area',
    icon: 'bx-check-square',
    tab: 'Exploration',
  },
  {
    title: 'Profile Building Area',
    icon: 'bx-check-square',
    tab: 'Profile Building',
  },
  {
    title: 'Academic Area',
    icon: 'bx-check-square',
    tab: 'Academic Profiling',
  },
  {
    title: 'Writing Area',
    icon: 'bx-check-square',
    tab: 'Writing',
  },
  {
    title: 'Sponsor Area',
    icon: 'bx-check-square',
    tab: 'Sponsor',
  },
]

const quest = ref(props.data['Exploration'])

const checkQuest = tab => {
  quest.value = props.data[tab]
}

const downloadPdf = () => {
  window.open('/api/report_quest/'+props.id, '_blank')
}
</script>

<template>
  <VCard v-if="took_quest==1">
    <VCardTitle>
      <div class="d-flex justify-between align-center w-100">
        <span class="w-100">
          Quest
        </span>
        <div class="cursor-pointer text-primary">
          <VBtn
            color="primary"
            density="comfortable"
            class="mx-1"
            @click="downloadPdf"
          >  
            <VIcon
              icon="bx-download"
              class="me-2"
            /> Result
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
          :value="item.tab"
          @click="checkQuest(item.tab)"
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
        fixed-header
        style="border:1px solid #dedede"
      >
        <thead>
          <tr style="background:blue">
            <th class="text-left">
              No
            </th>
            <th class="text-left">
              Questions
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item, index in quest"
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
      Did not make a quest.
    </VCardTitle>
  </VCard>
</template>
