const SectionTemplate = `
    <div style="border: 1px solid black; padding: 20px;">
        <h2>{{ title }}</h2>
        <div v-html=details></div>
        <questions 
            v-if="id !== 4" 
            v-for="question in questions" 
            :question="question"
            :id="question.id" 
            :name="question.name" 
            :label="question.label" 
            :tooltip="question.tooltip"
            :field_type="question.field_type"
            :value="question.value"
            :min="question.min"
            :max="question.max"
        ></questions>
        <infections v-if="id == 4"></infections> 
    </div>
    <hr />
`

export { SectionTemplate }