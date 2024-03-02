<template>
  <!-- Intro  -->
  <VCard>
    <VCardText>
      <h2 class="mb-4">
        And thus the quiz has ended! 
      </h2>

      <p>
        Let’s see which path would best fit you, embark on your launchpad journey, earn a personalized report & earn the chance to join our Community Empowerment Program in Bali FOR FREE!
      </p>

      <p>
        Based on your answers, we have created a customized journey for you to follow:
      </p>

      <ul class="ms-5 mb-5">
        <li>
          Embark first to the exploration area! Discover more about yourself and how it’ll be vital in shaping your future.
        </li>
        <li>
          Second, move on to find out more about the profile-building area! Identify what aspects you can hone to stand out more in an ever-growing competitive landscape.
        </li>
        <li>
          Third, change your course to the academic area! Consult your current scores and understand strategies on how to upgrade your academic profile. 
        </li>
        <li>
          Fourth, understand yourself better in the writing area! Delve deeper into what style of writing you’ll specifically need to master and what personal experiences you can utilize towards that goal.
        </li>
        <li>
          End the journey by refreshing your mind at one of our collaborator booths!
        </li>
      </ul>

      <p>
        As you take off on this journey of self-discovery, get the most out of each area by clicking each quest section below!
      </p>

      <div class="d-flex w-100 justify-center mt-10">
        <RouterLink :to="{name:'quest'}">
          <VBtn color="secondary">
            [Start Your Quest Here!]
          </VBtn>
        </RouterLink>
      </div>
    </VCardText>
  </VCard> 
</template>
