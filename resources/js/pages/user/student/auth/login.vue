<script setup>
import { showNotif } from '@/helper/notification'
import router from '@/router'
import ApiService from '@/services/ApiService'
import JwtService from '@/services/JwtService'
import UserService from '@/services/UserService'
import { onMounted, ref } from 'vue'


const props = defineProps({ 'ticket': String })


const formData = ref(null)

const isValidate = ref(false)
const loading = ref(false)

const form = ref({
  ticket_id: '',
})


const submit = async () => {
  if(form.value.ticket_id.length==4) {
    loading.value =true
    try {
      const res = await ApiService.post('signin', {
        ticket_no: form.value.ticket_id,
      })

      if(!res.success) {
        showNotif('error', res.message, 'bottom-end')
      } else {
        UserService.saveUser(res.data)
        JwtService.saveToken(res.data.token)
        router.push({ name: 'assessment' })

        setTimeout(() => {
          showNotif('success', 'You`ve successfully logged in', 'bottom-end')
        }, 1000)
      }
      loading.value = false
    } catch (error) {
      showNotif('error', error, 'bottom-end')
      loading.value = false
    }

  } else {
    isValidate.value = true
  }
}

onMounted(() => {
  if(props.ticket) {
    form.value.ticket_id = props.ticket
  }
})
</script>

<template>
  <div class="auth-wrapper d-flex align-center justify-center pa-4">
    <VCard
      class="auth-card pa-4 pt-7"
      max-width="500"
    >
      <div class="d-flex justify-center mb-10 mt-5">
        <img
          src="@images/eduall/eduall.png"
          alt=""
        >
      </div>

      <VCardText class="pt-2 text-center pb-3">
        <h5 class="text-h5 mb-1">
          Welcome to EduALL Assessment! 👋🏻
        </h5>
        <p class="mb-0">
          Please sign in with your ticket number  <br>
          to begin the adventure.
        </p>
      </VCardText>

      <VCardText>
        <VForm
          ref="formData"
          @submit.prevent="submit"
        >
          <VRow>
            <!-- email -->
            <VCol
              cols="12"
              class="pb-0"
            >
              <VOtpInput
                v-model="form.ticket_id"
                title="Ticket Number"
                type="text"
                length="4"
                divider="-"
                :loading="loading"
                :error="isValidate"
              />
            </VCol>
            
            <VCol
              cols="12"
              class=""
            >
              <!-- login button -->
              <VBtn
                block
                type="submit"
                :loading="loading"
              >
                Sign In
              </VBtn>
            </VCol>
          </VRow>
        </VForm>
      </VCardText>

      <VCardText class="text-center">
        <h5 class="mb-3">
          I don't have a ticket number,
        </h5>
        <a href="https://registration.edu-all.com/form/event?ft=cta&ev=evt-0014&et=offline&as=attend&s=ots&t=self&a=true">
          <VBtn
            block
            color="secondary"
            type="button"
          >
            Sign Up Now
          </VBtn>
        </a>
      </VCardText>
    </VCard>
  </div>
</template>

<style lang="scss">
@use "@core-scss/template/pages/page-auth.scss";
</style>
