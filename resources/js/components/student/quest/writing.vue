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
      Writing Area
    </VExpansionPanelTitle>
    <VExpansionPanelText>
      <VAlert color="warning">
        <VAlertTitle>
          <p class="my-0">
            Find out what essay can get you accepted into exceptional universities!
            <strong>Choose your mission!</strong>
          </p>
        </VAlertTitle>
      </VAlert>

      <VRadioGroup
        v-model="mission"
        class="mt-3"
      >
        <VRadio
          label="Compare the US and UK/Asia essays"
          value="1"
        />
        <VRadio
          label="Compare the AI and handmade essays"
          value="2"
        />
      </VRadioGroup>
      
      <VDivider class="my-3" />

      <ol class="ms-5 my-3">
        <li v-if="mission==1">
          Compare the US and UK/Asia essays
          <ol
            type="I"
            class="ms-4 my-3"
          >
            <li class="mb-3">
              Tell us what makes both these essays different?

              <VTextarea
                label="Answer"
                density="compact"
                class="mt-3"
              />
            </li>
          </ol>
          <VDivider class="my-6" />
        </li>

        <li v-if="mission==2">
          Compare the AI and handmade essays
          
          <ol
            type="I"
            class="ms-4 my-3"
          >
            <li class="mb-3">
              Which are the AI-generated statements? 

              <VRadioGroup>
                <VRadio
                  v-for="item in ['Option 1', 'Option 2']"
                  :key="item"
                  :label="item"
                  :value="item"
                />
              </VRadioGroup>
            </li>
            
            <li>
              Tell us what makes both these essays different?
              
              <VTextarea
                label="Answer"
                density="compact"
                class="mt-3"
              />
            </li>
          </ol>
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
