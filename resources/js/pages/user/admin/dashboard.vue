<script setup>
import JwtService from '@/services/JwtService'
import UserService from '@/services/UserService'

import { onMounted, ref } from 'vue'
import StatusDashboard from '@/components/admin/dashboard/statusDashboard.vue'
import QuestStatus from '@/components/admin/dashboard/questStatus.vue'
import ApiService from '@/services/ApiService'

const user = ref(UserService.getUser())
const dashboard = ref()
const loading = ref(false)

const getData = async() => {
  
  try {
    loading.value = true

    const res = await ApiService.get('admin/get')

    dashboard.value = res.data

    setTimeout(() => {
      loading.value = false
    }, 1000)
  } catch (error) {
    loading.value = false
    console.error(error)
  }
}

onMounted(() => {
  getData()
})
</script>

<template>
  <VRow>
    <VCol
      md="6"
      cols="12"
    >
      <VSkeletonLoader
        v-if="loading"
        type="table-heading@3"
      />
      <StatusDashboard
        v-if="!loading"
        :data="dashboard"
      />
    </VCol>
    <VCol
      md="6"
      cols="12"
    >
      <VSkeletonLoader
        v-if="loading"
        type="list-item-avatar-three-line@5"
        elevation="4"
      />
      <QuestStatus
        v-if="!loading"
        :data="dashboard"
      />
    </VCol>
  </VRow>
</template>
