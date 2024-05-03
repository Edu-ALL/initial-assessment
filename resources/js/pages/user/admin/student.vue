<script setup>
import ApiService from "@/services/ApiService"
import { computed, onMounted, ref } from "vue"

const page=ref(1)
const search=ref(null)
const student = ref([])
const loading = ref(false)

const getData =  async () => {
  loading.value=true
  try {
    const p = page.value>1 ? '?page='+page.value : '?page=1'
    const q = search.value ? '&q='+search.value : ''

    const res = await ApiService.get('admin/get/clients' + p + q)

    student.value = res.data
    loading.value = false
  } catch(error) {
    console.error(error)
    loading.value = false
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
          v-model="search"
          label="Search"
          prepend-inner-icon="mdi-magnify"
          density="compact"
          variant="outlined"
          hide-details
          single-line
          :style="{ width: '30%' }"
          @update:model-value="getData"
        />
      </div>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <!-- Loader  -->
      <VSkeletonLoader
        v-if="loading"
        type="table"
      />

      <VTable v-if="!loading">
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
              Score
            </th>
            <th>
              Quest
            </th>
            <th>Action</th>
          </tr>
        </thead>
          
        <tbody>
          <tr
            v-for="item in student.data"
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
            <td class="py-2">
              <p class="my-0">
                Exploration : {{ item.report.score['Exploration'] }}
              </p>
              <p class="my-0">
                Profile Building : {{ item.report.score['Profile Building'] }}
              </p>
              <p class="my-0">
                Academic : {{ item.report.score['Academic'] }}
              </p>
              <p class="my-0">
                Writing : {{ item.report.score['Writing'] }}
              </p>
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
              <RouterLink :to="{name:'student-detail',params:{id:item.uuid}}"> 
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
        <VPagination
          v-if="student.last_page>0"
          v-model="page"
          :total-visible="7"
          :length="student.last_page"
          @update:model-value="getData"
        />
      </div>
    </VCardText>
  </VCard>
</template>
