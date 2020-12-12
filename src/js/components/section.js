import { SectionTemplate } from '../templates/section-template.js'
import { Question } from './question.js'
import  { Infections } from './infections.js'

const Section = {
  template: SectionTemplate,
  props: {
      title: String,
      id: Number,
      questions: Array,
      details: String,
  },
  components: {
      'questions': Question,
      'infections': Infections
  }
}

export { Section }