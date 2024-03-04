<script setup>
const route = useRoute()

const activeTab = ref(route.params.tab)

// tabs
const tabs = [
  {
    title: 'Exploration Area',
    icon: 'bx-check-square',
    tab: 'exploration',
  },
  {
    title: 'Profile Building Area',
    icon: 'bx-check-square',
    tab: 'profile-building',
  },
  {
    title: 'Academic Area',
    icon: 'bx-check-square',
    tab: 'academic',
  },
  {
    title: 'Writing Area',
    icon: 'bx-check-square',
    tab: 'writing',
  },
  {
    title: 'Sponsor Area',
    icon: 'bx-check-square',
    tab: 'sponsor',
  },
]

const checkAssessment = tab => {
  console.log(tab)
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
          @click="checkAssessment(item.tab)"
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
            v-for="item in 10"
            :key="item"
          >
            <td class="text-center">
              {{ item }}
            </td>
            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis quas quisquam, tenetur enim aliquam accusantium odit officiis sequi corporis</td>
            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo sint minus consectetur quisquam quibusdam provident architecto facere optio temporibus eius voluptates dolorem qui officia fugit, quaerat animi natus doloribus reiciendis?</td>
          </tr>
        </tbody>
      </VTable>
    </VCardText>
  </VCard>
</template>
