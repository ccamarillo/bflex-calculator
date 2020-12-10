import { SectionTemplate } from '../templates/section-template.js'
import { Question } from './question.js'

const Section = {
  template: SectionTemplate,
  props: {
      title: String,
      id: Number,
      questions: Array,
      details: String,
  },
  components: {
      'questions': Question
  }
//   props: ['modelValue', 'title', 'message'],
//   emits: ['update:modelValue'],
//   computed: {
//     value: {
//       get() {
//         return this.modelValue
//       },
//       set(value) {
//         alert(value)
//         this.$emit('update:modelValue', value)
//       }
//     }
//   }
}

export { Section }