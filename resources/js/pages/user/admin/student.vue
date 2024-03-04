<script setup>
const desserts = [
  {
    dessert: 'Frozen Yogurt',
    calories: 159,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
  {
    dessert: 'Ice cream sandwich',
    calories: 237,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
  {
    dessert: 'Eclair',
    calories: 262,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
  {
    dessert: 'Cupcake',
    calories: 305,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
  {
    dessert: 'Gingerbread',
    calories: 356,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
]
</script>

<template>
  <VCard>
    <VCardTitle>
      <div class="d-flex justify-between w-100 mb-1 align-baseline">
        <div class="w-100">
          Student List
        </div>
        <VTextField
          label="Search"
          prepend-inner-icon="mdi-magnify"
          density="compact"
          variant="outlined"
          hide-details
          single-line
          :style="{ width: '30%' }"
        />
      </div>
      <VDivider />
    </VCardTitle>
    <VCardText>
      <VTable>
        <thead>
          <tr>
            <th class="text-uppercase">
              Full Name
            </th>
            <th>
              School Name
            </th>
            <th>
              Graduation Year
            </th>
            <th>
              Initial Assessment
            </th>
            <th>
              Quest
            </th>
            <th>Action</th>
          </tr>
        </thead>
          
        <tbody>
          <tr
            v-for="item in desserts"
            :key="item.dessert"
          >
            <td>
              {{ item.dessert }}
            </td>
            <td class="text-center">
              {{ item.calories }}
            </td>
            <td class="text-center">
              {{ item.fat }}
            </td>
            <td class="text-center">
              <VIcon
                icon="bx-message-square-check"
                color="success"
              />
            </td>
            <td class="text-center">
              <div class="d-flex justify-center gap-3">
                <div>
                  <VTooltip
                    color="success"
                    activator="parent"
                    location="top"
                  >
                    Success
                  </VTooltip>
                  <VIcon
                    icon="bx-message-square-check"
                    color="success"
                  />
                  2
                </div>
                <div>
                  <VTooltip
                    color="success"
                    activator="parent"
                    location="top"
                  >
                    Not Yet
                  </VTooltip>
                  <VIcon
                    icon="bx-message-square-x"
                    style="color: red;"
                  />
                  2
                </div>
              </div>
            </td>
            <td class="text-center">
              <RouterLink :to="{name:'student-detail',params:{id:2132}}"> 
                <VTooltip
                  color="success"
                  activator="parent"
                  location="start"
                >
                  View Detail
                </VTooltip>
                <VIcon icon="bx-user-pin" />
              </RouterLink>
            </td>
          </tr>
        </tbody>
      </VTable>
      <VDivider />
      <div class="d-flex justify-end mt-4">
        <VPagination :length="4" />
      </div>
    </VCardText>
  </VCard>
</template>
