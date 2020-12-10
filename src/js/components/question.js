import { MainTemplate } from '../templates/main-template.js'
import { QuestionTemplate } from '../templates/question-template.js'
import { bus } from '../main.js';

const Question = {
    template: QuestionTemplate,
    props: {
        name: String,
        label: String,
        tooltip: String,
        field_type: String,
        total_procedures: Number
        // inputChange: Number
    },
    // emits: ['change-total-procedures'],
    methods: {
        emitChange(event) {
            bus.$emit('change-total-procedures', event.target.value)
        }
    }
}

export { Question }