<script setup>
import { showNotif } from "@/helper/notification"
import { rules } from "@/helper/rules"
import router from "@/router"
import ApiService from "@/services/ApiService"
import JwtService, { getToken } from "@/services/JwtService"
import UserService from "@/services/UserService"
import { onMounted } from "vue"

const formData = ref()

const form = ref({
  email: '',
  password: '',
  remember: false,
})

const isPasswordVisible = ref(false)
const loading = ref(false)

const submit = async () => {

  const { valid } = await formData.value.validate()

  if (valid) {
    loading.value =true
    try {
      const res = await ApiService.post('admin/signin', form.value)

      if(!res.success) {
        form.value.email = ""
        form.value.password = ""
        showNotif('error', res.message, 'bottom-end')
      } else {
        JwtService.saveToken(res.data.token)
        UserService.saveUser(res.data)
        console.log(res.data)

        setTimeout(() => {
          window.location.reload()
        }, 1000)
        
      }
      loading.value = false
    } catch (error) {
      showNotif('error', error, 'bottom-end')
      loading.value = false
    }
  } 
}

onMounted(() => {
  if(JwtService.getToken()) {
    router.push({ name: 'admin-dashboard' })
  }
})
</script>

<template>
  <div class="auth-wrapper d-flex align-center justify-center pa-4">
    <VCard
      class="auth-card pa-4 pt-7"
      max-width="448"
    >
      <div class="d-flex justify-center mb-10 mt-5">
        <img
          src="@images/eduall/eduall.png"
          alt="EduALL"
        >
      </div>

      <VCardText class="pt-2">
        <h5 class="text-h5 mb-7 text-center">
          Welcome to EduALL Assessment Dashboard! 👋🏻
        </h5>
        <p class="mb-0">
          Please sign-in
        </p>
      </VCardText>

      <VCardText>
        <VForm
          ref="formData"
          validate-on="input"
          fast-fail
          :disabled="loading"
          @submit.prevent="submit"
        >
          <VRow>
            <!-- email -->
            <VCol cols="12">
              <VTextField
                v-model="form.email"
                autofocus
                label="Email"
                type="email"
                :rules="rules.email"
              />
            </VCol>

            <!-- password -->
            <VCol cols="12">
              <VTextField
                v-model="form.password"
                label="Password"
                placeholder="············"
                :type="isPasswordVisible ? 'text' : 'password'"
                :append-inner-icon="isPasswordVisible ? 'bx-hide' : 'bx-show'"
                :rules="rules.minLength_8"
                @click:append-inner="isPasswordVisible = !isPasswordVisible"
              />

              <!-- remember me checkbox -->
              <div class="d-flex align-center justify-space-between flex-wrap mt-1 mb-4">
                <VCheckbox
                  v-model="form.remember"
                  label="Remember me"
                />
              </div>

              <!-- login button -->
              <VBtn
                block
                type="submit"
              >
                Login
              </VBtn>
            </VCol>
          </VRow>
        </VForm>
      </VCardText>
    </VCard>
  </div>
</template>

<style lang="scss">
@use "@core-scss/template/pages/page-auth.scss";
</style>
