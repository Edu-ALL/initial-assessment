<script setup>
import Academic from '@images/cards/academic.png'
import Writing from '@images/cards/writing.png'
import Sponsor from '@images/cards/sponsor.png'
import Exploration from '@images/cards/exploration.png'
import ProfileBuilding from '@images/cards/profile-building.png'

const quests = [
  {
    total: 12,
    subtitle: 'Take a Quest',
    title: 'Interest Exploration',
    icon: Exploration,
    color: 'error',
  },
  {
    subtitle: 'Take a Quest',
    total: 20,
    title: 'Profile Building',
    icon: ProfileBuilding,
    color: 'primary',
  },
  {
    total: 30,
    subtitle: 'Take a Quest',
    title: 'Academic',
    icon: Academic,
    color: 'info',
  },
  {
    subtitle: 'Take a Quest',
    total: 20,
    title: 'Writing',
    icon: Writing,
    color: 'success',
  },
  {
    subtitle: 'Take a Quest',
    total: 15,
    title: 'Sponsor',
    icon: Sponsor,
    color: 'primary',
  },
]
</script>

<template>
  <VCard title="Quest">
    <VCardText>
      <VList class="card-list">
        <VListItem
          v-for="item in quests"
          :key="item.subtitle"
        >
          <template #prepend>
            <VAvatar
              rounded
              variant="tonal"
              :color="item.color"
              :image="item.icon"
              class="me-3"
            />
          </template>

          <VListItemSubtitle class="text-disabled mb-1">
            {{ item.subtitle }}
          </VListItemSubtitle>
          <VListItemTitle>
            {{ item.title }}
          </VListItemTitle>

          <template #append>
            <VListItemAction>
              <h4>
                {{ item.total }}
              </h4>
            </VListItemAction>
          </template>
        </VListItem>
      </VList>
    </VCardText>
  </VCard>
</template>

<style lang="scss" scoped>
  .card-list {
    --v-card-list-gap: 1.6rem;
  }
</style>
