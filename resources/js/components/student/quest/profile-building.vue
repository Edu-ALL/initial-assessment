<template>
  <VExpansionPanel>
    <VExpansionPanelTitle>
      <VIcon
        icon="bx-check-circle"
        class="me-2"
        color="muted"
      />
      Profile Building Area
    </VExpansionPanelTitle>
    <VExpansionPanelText>
      <VAlert color="warning">
        <VAlertTitle>
          <p class="my-0">
            Set the stage for your success beyond high school and understand how to stand out in a competitive landscape!
            <strong>Choose your mission!</strong>
          </p>
        </VAlertTitle>
      </VAlert>

      <ol class="ms-5 my-3">
        <li>
          <strong>
            Visit an NGO booth 
          </strong>
          and be inspired to help out (encourage NGO to also create a small activity)

          <ol
            type="I"
            class="ms-4 my-3"
          >
            <li class="mb-3">
              Which NGO representative did you meet? 

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
              From your interaction, how do you think you can contribute to the cause?
              
              <VTextarea
                label="Description"
                density="compact"
                class="mt-3"
              />
            </li>
          </ol>
          <VDivider class="my-6" />
        </li>

        <li>
          <strong>
            Participate in STEM+ activities 
          </strong> 
          to gauge what interests you! 

          <ol
            type="I"
            class="ms-4 my-3"
          >
            <li class="mb-3">
              What topic did you learn about in this area?

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
              From your observation, what potential project can you think of?
              
              <VTextarea
                label="Description"
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
  