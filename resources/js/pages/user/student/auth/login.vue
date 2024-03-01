<script setup>
import router from "@/router"

const rules = ref( {
  required: value => !!value || 'Field is required',
  maxlength: value => value.length==10 || 'Field must be 10 characters long',
})

const form = ref({
  ticket_id: '',
})

const submit = () => {
  router.push({ name: 'assessment' })
}
</script>

<template>
  <div class="auth-wrapper d-flex align-center justify-center pa-4">
    <VCard
      class="auth-card pa-4 pt-7"
      max-width="550"
    >
      <div class="d-flex justify-center mb-10 mt-5">
        <img
          src="@images/eduall/eduall.png"
          alt=""
        >
      </div>

      <VCardText class="pt-2">
        <h5 class="text-h5 mb-1">
          Welcome to EduALL Assessment! 👋🏻
        </h5>
        <p class="mb-0">
          Please sign-in to your ticket number start the adventure
        </p>
      </VCardText>

      <VCardText>
        <VForm @submit.prevent="submit">
          <VRow>
            <!-- email -->
            <VCol cols="12">
              <VTextField
                v-model="form.ticket_id"
                autofocus
                placeholder="**********"
                label="Ticket ID"
                type="email"
                length="10"
                :rules="[rules.required, rules.maxlength]"
              />
            </VCol>
            
            <VCol cols="12">
              <!-- login button -->
              <VBtn
                block
                type="submit"
              >
                Submit
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
