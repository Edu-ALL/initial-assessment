<script setup>
import { showNotif } from '@/helper/notification'
import router from '@/router'
import ApiService from '@/services/ApiService'
import Assessment from '@/components/admin/assessment.vue'
import Quest from '@/components/admin/quest.vue'
import avatar from '@images/avatars/avatar.png'
import { onMounted } from 'vue'
import moment from 'moment'

const route = useRoute()

const avatarImg = avatar

const loading = ref(false)
const activeTab = ref(route.params.tab)

// tabs
const tabs = [
  {
    title: 'Assessment',
    icon: 'bx-file',
    tab: 'assessment',
  },
  {
    title: 'Quest',
    icon: 'bx-task',
    tab: 'quest',
  },
]

const client = ref([])

const getData = async () => {
  const  id = route.params.id

  loading.value=true
  try {
    
    const res = await ApiService.get('admin/get/client/'+id)

    if(res.success) {
      client.value = res.data
    } else {
      router.push({ name: 'student' })
      showNotif('error', 'Student Not Found!', 'bottom-end')
    }
    loading.value=false
  } catch(error) {
    router.push({ name: 'student' })

    showNotif('error', 'Something Error!', 'bottom-end')
  }
}

onMounted(() => {
  getData()
})
</script>

<template>
  <VRow>
    <VCol cols="12">
      <VCard v-if="!loading">
        <VCardTitle class="mb-3 border-b">
          <RouterLink :to="({name:'student'})">
            <VIcon
              icon="bx-left-arrow-alt"
              class="me-2"
              style="color:black"
            />
          </RouterLink>
          Account Details
        </VCardTitle>
        <VCardText>
          <VRow>
            <VCol md="3">
              <!-- 👉 Avatar -->
              <div class="d-flex justify-center align-center">
                <img
                  :src="avatarImg"
                  alt=""
                  width="50%"
                >
              </div>
            </VCol>
            <VCol md="9">
              <VRow>
                <VCol md="6">
                  <small class="text-muted">Full Name</small>
                  <p class="mb-1 text-secondary">
                    {{ client.user?.full_name }}
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">Email</small>
                  <p class="mb-1 text-secondary">
                    {{ client.user?.email ? client.user.email : '-' }}
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">Phone Number</small>
                  <p class="mb-1 text-secondary">
                    {{ client.user?.phone_number ? client.user.phone_number : '-' }}
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">School Name</small>
                  <p class="mb-1 text-secondary">
                    {{ client.user?.school ? client.user.school : '-' }}
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="3">
                  <small class="text-muted">Grade</small>
                  <p class="mb-1 text-secondary">
                    {{ client.user?.grade ? client.user.grade : '-' }}
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">Destination Country</small>
                  <p class="mb-1 text-secondary">
                    {{ client.user?.destination ? client.user.destination.join(', ') : '-' }}
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="3">
                  <small class="text-muted">Joined At</small>
                  <p class="mb-1 text-secondary">
                    {{ moment(client.user?.created_at).format('LL') }}
                  </p>
                  <VDivider />
                </VCol>
              </VRow>
            </VCol>
          </VRow>
        </VCardText>
        
        <VCardText>
          <VTabs
            v-model="activeTab"
            show-arrows
          >
            <VTab
              v-for="item in tabs"
              :key="item.icon"
              :value="item.tab"
            >
              <VIcon
                size="20"
                start
                :icon="item.icon"
              />
              {{ item.title }}
            </VTab>
          </VTabs>
          <VWindow
            v-model="activeTab"
            class="mt-5 disable-tab-transition"
          >
            <!-- Assessment -->
            <VWindowItem value="assessment">
              <Assessment
                :id="client?.user?.id"
                :took_ia="client?.user?.took_ia"
                :data="client['IA']"
              />
            </VWindowItem>
  
            <!-- Quest -->
            <VWindowItem
              value="quest"
              class="pt-0"
            >
              <Quest
                :id="client?.user?.id"
                :took_quest="client?.user?.took_quest"
                :data="client['Quest']"
              />
            </VWindowItem>
          </VWindow>
        </VCardText>
      </VCard>

      <VSkeletonLoader
        v-if="loading"
        class="mx-auto border"
        type="avatar, heading, paragraph, table"
      />
    </VCol>
  </VRow>
</template>
