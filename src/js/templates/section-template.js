const SectionTemplate = `
    <div>
        <h2>{{ title }}</h2>
        <div v-html=details></div>
        <questions 
            v-for="question in questions" 
            :id="question.id" 
            :name="question.name" 
            :label="question.label" 
            :tooltip="question.tooltip"
            :field_type="question.field_type"
        ></questions>
    </div>
`

export { SectionTemplate }