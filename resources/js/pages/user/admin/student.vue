<script setup>
import ApiService from "@/services/ApiService"
import { computed, onMounted, ref } from "vue"

const desserts = [
  {
    dessert: 'Frozen Yogurt',
    calories: 159,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
  {
    dessert: 'Ice cream sandwich',
    calories: 237,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
  {
    dessert: 'Eclair',
    calories: 262,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
  {
    dessert: 'Cupcake',
    calories: 305,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
  {
    dessert: 'Gingerbread',
    calories: 356,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
]

const student = ref([])

const getData =  async () => {
  try {
    const res = await ApiService.get('admin/get/clients')
    
    student.value = res.data
  } catch(error) {
    console.error(error)
  }
}


const questCount = (data, status) => {
  return Object.values(data).filter(value => value === status).length
}




onMounted(() => {
  getData()
})
</script>

<template>
  <VCard>
    <VCardTitle>
      <div class="d-flex justify-between w-100 mb-1 align-baseline">
        <div class="w-100">
          Student List
        </div>
        <VTextField
          label="Search"
          prepend-inner-icon="mdi-magnify"
          density="compact"
          variant="outlined"
          hide-details
          single-line
          :style="{ width: '30%' }"
        />
      </div>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <VTable>
        <thead>
          <tr>
            <th class="text-uppercase">
              Full Name
            </th>
            <th>
              School Name
            </th>
            <th>
              Grade
            </th>
            <th>
              Initial Assessment
            </th>
            <th>
              Quest
            </th>
            <th>Action</th>
          </tr>
        </thead>
          
        <tbody>
          <tr
            v-for="item in student"
            :key="item"
          >
            <td>
              {{ item.full_name }}
            </td>
            <td class="text-center">
              {{ item.school }}
            </td>
            <td class="text-center">
              {{ item.grade > 12 ? 'Not High School' : item.grade }}
            </td>
            <td class="text-center">
              <div class="d-flex justify-center">
                <div>
                  <VTooltip
                    activator="parent"
                    location="left"
                  >
                    {{ item.filled_ia==1 ? 'Completed':'Not Yet' }}
                  </VTooltip>
                  <VIcon
                    :icon="item.filled_ia==1 ? 'bx-message-square-check' : 'bx-x'"
                    :style="item.filled_ia==1?'color:green':'color:red'"
                  />
                </div>
              </div>
            </td>
            <td class="text-center">
              <div class="d-flex justify-center gap-3">
                <div>
                  <VTooltip
                    activator="parent"
                    location="left"
                  >
                    Success
                  </VTooltip>
                  <VIcon
                    icon="bx-message-square-check"
                    color="success"
                  />
                  {{ questCount(item.quest, true) }}
                </div>
                <div>
                  <VTooltip
                    color="success"
                    activator="parent"
                    location="right"
                  >
                    Not Yet
                  </VTooltip>
                  <VIcon
                    icon="bx-message-square-x"
                    style="color: red;"
                  />
                  {{ questCount(item.quest, false) }}
                </div>
              </div>
            </td>
            <td class="text-center">
              <RouterLink :to="{name:'student-detail',params:{id:2132}}"> 
                <VTooltip
                  color="success"
                  activator="parent"
                  location="start"
                >
                  View Detail
                </VTooltip>
                <VIcon icon="bx-user-pin" />
              </RouterLink>
            </td>
          </tr>
        </tbody>
      </VTable>
      <VDivider />
      <div class="d-flex justify-end mt-4">
        <VPagination :length="4" />
      </div>
    </VCardText>
  </VCard>
</template>
