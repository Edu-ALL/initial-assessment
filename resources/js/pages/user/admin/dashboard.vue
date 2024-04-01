<script setup>
import JwtService from '@/services/JwtService'
import UserService from '@/services/UserService'

import { ref } from 'vue'
import StatusDashboard from '@/components/admin/dashboard/statusDashboard.vue'
import QuestStatus from '@/components/admin/dashboard/questStatus.vue'

const user = ref(UserService.getUser())
</script>

<template>
  <VRow>
    <VCol
      md="6"
      cols="12"
    >
      <StatusDashboard />
    </VCol>
    <VCol
      md="6"
      cols="12"
    >
      <QuestStatus />
    </VCol>
  </VRow>
</template>
