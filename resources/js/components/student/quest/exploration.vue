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
      Exploration Area
    </VExpansionPanelTitle>
    <VExpansionPanelText>
      <VAlert color="warning">
        <VAlertTitle>
          <p class="my-0">
            Develop your career plan and decide what is best for your future!
            <strong>Choose your mission!</strong>
          </p>
        </VAlertTitle>
      </VAlert>

      <VRadioGroup
        v-model="mission"
        class="mt-3"
      >
        <VRadio
          label="Take the 5 minute ONE*T test to find out which jobs woold fit you! "
          value="1"
        />
        <VRadio
          label="Get to understand more about your dreams! Participate in a sharing session!"
          value="2"
        />
      </VRadioGroup>
      
      <VDivider class="my-3" />

      <ol class="ms-5 my-3">
        <li v-if="mission==1">
          <strong>
            Take the 5 minute ONE*T test
          </strong>
          to find out which jobs woold fit you! 
          <ol
            type="I"
            class="ms-4 my-3"
          >
            <li class="mb-3">
              Please visit <a
                href="https://www.mynextmove.org/explore/ip"
                target="_blank"
                rel="noopener noreferrer"
              >ONE*T test</a>
            </li>
            <li>
              <p>
                After finishing you have to write your score!
              </p>
              
              <VRow>
                <VCol
                  v-for="i in 6"
                  :key="i"
                  cols="4"
                >
                  <VTextField
                    label="Realistic"
                    density="compact"
                  />
                </VCol>
              </VRow>
            </li>
          </ol>
          <VDivider class="my-6" />
        </li>

        <li v-if="mission==2">
          <strong>
            Get to understand more about your dreams! 
          </strong>
          Participate in a sharing session!
          <ol
            type="I"
            class="ms-4 my-3"
          >
            <li class="mb-3">
              Speaker Name

              <VRadioGroup>
                <VRadio
                  v-for="item in ['apple', 'banana', 'cherry']"
                  :key="item"
                  :label="item"
                  :value="item"
                />
              </VRadioGroup>
            </li>
            <li>
              Reflect on what you just learned! Let us know what was the most valuable lesson you obtained from them?

              <VTextarea
                label="Reflection"
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
