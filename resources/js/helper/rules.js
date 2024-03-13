// validationRules.js
export const rules = {
  required: [
    value => {
      if (!value || value.length === 0) return 'Field is required'
      
      return true
    },
  ],
  maxLength_3: [
    value => {
      if (value?.length <= 3) return true
      
      return 'This field has a maximum of 3 options'
    },
  ],
}
