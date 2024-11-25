<script setup>
import { showNotif } from '@/helper/notification'
import router from '@/router'
import JwtService from '@/services/JwtService'
import UserService from '@/services/UserService'
import avatar1 from '@images/avatars/avatar-1.png'
import { ref } from 'vue'

const user = ref(UserService.getUser())

const logout = () => {
  showNotif('success', 'You`ve successfully logout', 'bottom-end')
  setTimeout(() => {

    if(UserService.getUser().client?.type==1) {
      router.push({ name: 'admin-login' })
    } else {
      router.push({ name: 'login' })
    }

    JwtService.destroyToken()
    UserService.destroyUser()
  }, 1000)
}
</script>

<template>
  <VBadge
    dot
    location="bottom right"
    offset-x="3"
    offset-y="3"
    color="success"
    bordered
  >
    <VAvatar
      class="cursor-pointer"
      color="primary"
      variant="tonal"
    >
      <VIcon icon="bx-user" />

      <!-- SECTION Menu -->
      <VMenu
        activator="parent"
        width="230"
        location="bottom end"
        offset="14px"
      >
        <VList>
          <!-- 👉 User Avatar & Name -->
          <VListItem>
            <template #prepend>
              <VListItemAction start>
                <VBadge
                  dot
                  location="bottom right"
                  offset-x="3"
                  offset-y="3"
                  color="success"
                >
                  <VAvatar
                    color="primary"
                    variant="tonal"
                  >
                    <VIcon icon="bx-user" />
                  </VAvatar>
                </VBadge>
              </VListItemAction>
            </template>
            <VListItemTitle class="font-weight-semibold">
              {{ user.client?.full_name }}
            </VListItemTitle>
          </VListItem>
          <VDivider class="my-2" />

          <!-- 👉 Profile -->
          <!--
            <VListItem link>
            <template #prepend>
            <VIcon
            class="me-2"
            icon="bx-user"
            size="22"
            />
            </template>

            <VListItemTitle>Profile</VListItemTitle>
            </VListItem> 
          -->

          <!-- Divider -->
          <!-- <VDivider class="my-2" /> -->

          <!-- 👉 Logout -->
          <VListItem @click="logout">
            <template #prepend>
              <VIcon
                class="me-2"
                icon="bx-log-out"
                size="22"
              />
            </template>

            <VListItemTitle>Logout</VListItemTitle>
          </VListItem>
        </VList>
      </VMenu>
      <!-- !SECTION -->
    </VAvatar>
  </VBadge>
</template>
