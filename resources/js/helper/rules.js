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
  not_zero: [
    value => {
      if (!value || value==0) return 'Field cannot be 0'
      
      return true
    },
  ],
  maxScore_9: [
    value => {
      if (value > 9) return 'The score cannot be more than the maximum score'
  
      return true
    },
  ],
  maxScore_120: [
    value => {
      if (value > 120) return 'The score cannot be more than the maximum score'
  
      return true
    },
  ],
  maxScore_1600: [
    value => {
      if (value > 1600) return 'The score cannot be more than the maximum score'
  
      return true
    },
  ],
}
