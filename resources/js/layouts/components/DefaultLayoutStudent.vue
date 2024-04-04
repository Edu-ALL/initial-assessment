<script setup>
import VerticalNavSectionTitle from '@/@layouts/components/VerticalNavSectionTitle.vue'
import VerticalNavLayout from '@layouts/components/VerticalNavLayout.vue'
import VerticalNavLink from '@layouts/components/VerticalNavLink.vue'
import { useTheme } from 'vuetify'


// Components
import Footer from '@/layouts/components/Footer.vue'
import NavbarThemeSwitcher from '@/layouts/components/NavbarThemeSwitcher.vue'
import UserProfile from '@/layouts/components/UserProfile.vue'
import UserService from '@/services/UserService'

const user = UserService.getUser()
</script>

<template>
  <VerticalNavLayout>
    <!-- 👉 navbar -->
    <template #navbar="{ toggleVerticalOverlayNavActive }">
      <div class="d-flex h-100 align-center">
        <!-- 👉 Vertical nav toggle in overlay mode -->
        <IconBtn
          class="ms-n3 d-lg-none"
          @click="toggleVerticalOverlayNavActive(true)"
        >
          <VIcon icon="bx-menu" />
        </IconBtn>

        <div
          class="d-md-flex align-center d-none"
          style="user-select: none;"
        >
          <!-- 👉 Search Trigger button -->
          <h3>Welcome {{ user.client?.full_name }} 👋🏻</h3>
        </div>

        <VSpacer />

        <NavbarThemeSwitcher class="me-2" />

        <UserProfile />
      </div>
    </template>

    <template #vertical-nav-content>
      <VerticalNavLink
        :item="{
          title: 'Dashboard',
          icon: 'bx-home',
          to: '/dashboard',
        }"
      />
      
      <!-- 👉 Pages -->
      <VerticalNavSectionTitle
        :item="{
          heading: 'Pages',
        }"
      />
      <VerticalNavLink
        v-if="user.client?.is_vip==0 && (user.client?.education?.grade>=7 || user.client?.education?.grade<=12)"
        :item="{
          title: 'Assessment',
          icon: 'bx-notepad',
          to: '/assessment',
        }"
      />
      <VerticalNavLink
        :item="{
          title: 'Quest',
          icon: 'bx-user-check',
          to: '/quest',
        }"
      />
    </template>


    <!-- 👉 Pages -->
    <slot />

    <!-- 👉 Footer -->
    <template #footer>
      <Footer />
    </template>
  </VerticalNavLayout>
</template>

<style lang="scss" scoped>
.meta-key {
  border: thin solid rgba(var(--v-border-color), var(--v-border-opacity));
  border-radius: 6px;
  block-size: 1.5625rem;
  line-height: 1.3125rem;
  padding-block: 0.125rem;
  padding-inline: 0.25rem;
}
</style>
