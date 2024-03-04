<script setup>
import avatar1 from '@images/avatars/avatar-1.png'

const accountDataLocal = ref({
  avatarImg: avatar1,
  firstName: 'john',
  lastName: 'Doe',
  email: 'johnDoe@example.com',
  org: 'ThemeSelection',
  phone: '+1 (917) 543-9876',
  address: '123 Main St, New York, NY 10001',
  state: 'New York',
  zip: '10001',
  country: 'USA',
  language: 'English',
  timezone: '(GMT-11:00) International Date Line West',
  currency: 'USD',
})
</script>

<template>
  <VRow>
    <VCol cols="12">
      <VCard title="Account Details">
        <VCardText class="d-flex">
          <!-- 👉 Avatar -->
          <VAvatar
            rounded="lg"
            size="250"
            class="me-6"
            :image="accountDataLocal.avatarImg"
          />

          <VRow>
            <VCol cols="6">
              <small class="text-muted">Full Name</small>
              <p>Lorem Ipsum</p>
              <VDivider />
            </VCol>
            <VCol cols="6">
              <small class="text-muted">Email</small>
              <p>Lorem Ipsum</p>
              <VDivider />
            </VCol>
            <VCol cols="6">
              <small class="text-muted">Phone Number</small>
              <p>Lorem Ipsum</p>
              <VDivider />
            </VCol>
            <VCol cols="6">
              <small class="text-muted">School Name</small>
              <p>Lorem Ipsum</p>
              <VDivider />
            </VCol>
            <VCol cols="6">
              <small class="text-muted">Graduation Year</small>
              <p>Lorem Ipsum</p>
              <VDivider />
            </VCol>
            <VCol cols="6">
              <small class="text-muted">Joined At</small>
              <p>Lorem Ipsum</p>
              <VDivider />
            </VCol>
          </VRow>
        </VCardText>

        <VDivider />
      </VCard>
    </VCol>
  </VRow>
</template>
