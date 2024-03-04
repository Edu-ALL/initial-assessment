<script setup>
import Assessment from '@/views/pages/student/assessment.vue'
import Quest from '@/views/pages/student/quest.vue'
import avatar1 from '@images/avatars/avatar-1.png'

const route = useRoute()

const avatarImg = avatar1

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
</script>

<template>
  <VRow>
    <VCol cols="12">
      <VCard title="Account Details">
        <VCardText>
          <VRow>
            <VCol md="3">
              <!-- 👉 Avatar -->
              <VAvatar
                rounded="lg"
                size="85%"
                class="me-6"
                :image="avatarImg"
              />
            </VCol>
            <VCol md="9">
              <VRow>
                <VCol md="6">
                  <small class="text-muted">Full Name</small>
                  <p class="mb-1">
                    Lorem Ipsum
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">Email</small>
                  <p class="mb-1">
                    Lorem Ipsum
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">Phone Number</small>
                  <p class="mb-1">
                    Lorem Ipsum
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">School Name</small>
                  <p class="mb-1">
                    Lorem Ipsum
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">Graduation Year</small>
                  <p class="mb-1">
                    Lorem Ipsum
                  </p>
                  <VDivider />
                </VCol>
                <VCol md="6">
                  <small class="text-muted">Joined At</small>
                  <p class="mb-1">
                    Lorem Ipsum
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
              <Assessment />
            </VWindowItem>
  
            <!-- Quest -->
            <VWindowItem
              value="quest"
              class="pt-0"
            >
              <Quest />
            </VWindowItem>
          </VWindow>
        </VCardText>
      </VCard>
    </VCol>
  </VRow>
</template>
