<script setup>
import { watch } from "vue"

const props = defineProps({
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
</script>

<template>
  <VCard>
    <VCardTitle>
      <div class="d-flex justify-between align-center w-100">
        <span class="w-100">
          Assessment
        </span>
        <div class="cursor-pointer text-primary">
          <VTooltip
            activator="parent"
            location="start"
          >
            Download Assessment Result
          </VTooltip>
          <VIcon icon="bx-download" />
        </div>
      </div>
    </VCardTitle>
    <VDivider />
    <VCardText>
      <VCard
        color="primary"
        class="mb-3"
      >
        <VCardTitle class="text-white">
          Result
        </VCardTitle>
        <VCardText>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, dolorum molestias illum temporibus similique rerum quasi repudiandae, odit iste libero vel aut debitis cum quaerat officia earum qui dignissimos expedita?
        </VCardText>
      </VCard>
      
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
      >
        <thead>
          <tr style="background:blue">
            <th class="text-left">
              No
            </th>
            <th class="text-left">
              Questions
            </th>
            <th class="text-left">
              Answer
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
              width="1%"
            >
              {{ index + 1 }}
            </td>
            <td width="60%">
              {{ item.question }} <br>
              <small class="text-secondary">
                {{ item.sub_question }}
              </small>
            </td>
            <td>
              {{ item.answer.length > 0 ? item.answer : '-' }}
            </td>
          </tr>
        </tbody>
      </VTable>
    </VCardText>
  </VCard>
</template>

