<script setup>
import { ref } from 'vue'

const mission = ref()
</script>

<template>
  <VExpansionPanel>
    <VExpansionPanelTitle>
      <VIcon
        icon="bx-check-circle"
        class="me-2"
        color="success"
      />
      Sponsor Area
    </VExpansionPanelTitle>
    <VExpansionPanelText>
      <VAlert color="warning">
        <VAlertTitle>
          <p class="my-0">
            Just like the saying “work hard, play hard”, take time and refresh at our collaborator booths outside!
          </p>
        </VAlertTitle>
      </VAlert>

      
      <VDivider class="my-3" />

      <ol class="ms-5 my-3">
        <li>
          Tell us what booth you visited!
          
          <VTextarea
            label="Answer"
            density="compact"
            class="mt-3"
          />
        </li>
      </ol>

      <div class="w-100 d-flex justify-center mt-4">
        <VBtn color="secondary">
          Submit
        </VBtn>
      </div>
    </VExpansionPanelText>
  </VExpansionPanel>
</template>
