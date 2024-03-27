<script setup>
const props = defineProps({
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
    tab: 'Academic',
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
</script>

<template>
  <VCard>
    <VCardTitle>
      <div class="d-flex justify-between align-center w-100">
        <span class="w-100">
          Quest
        </span>
        <div class="cursor-pointer text-primary">
          <VTooltip
            activator="parent"
            location="start"
          >
            Download Quest
          </VTooltip>
          <VIcon icon="bx-download" />
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
            v-for="item, index in quest"
            :key="index"
          >
            <td
              class="text-center"
              width="1%"
            >
              {{ index + 1 }}
            </td>
            <td
              width="60%"
              class="py-2"
            >
              {{ item.question }} <br>
              <small class="text-secondary">
                {{ item.sub_question }}
              </small>
            </td>
            <td class="py-2">
              <div
                v-for="i, n in item.answer?.option"
                :key="n"
              >
                <span v-if="i">
                  {{ i }} <br>
                </span>
                <span
                  v-if="item.answer?.descriptive[n]"
                  class="text-capitalize"
                >
                  {{ item.answer?.descriptive[n] }}
                </span>
              </div>
            </td>
          </tr>
        </tbody>
      </VTable>
    </VCardText>
  </VCard>
</template>
