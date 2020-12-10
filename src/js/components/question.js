import { QuestionTemplate } from '../templates/question-template.js'

const Question = {
    template: QuestionTemplate,
    props: {
        name: String,
        label: String,
        tooltip: String,
        field_type: String
    },
    methods: {
        inputChange(event) {
            console.log(event)
            this.$emit('inputChange')
        }
    }
}

export { Question }