const SectionTemplate = `
    <div>
        <h2>{{ title }}</h2>
        <div v-html=details></div>
        <questions 
            v-if="id !== 2" 
            v-for="question in questions" 
            :id="question.id" 
            :name="question.name" 
            :label="question.label" 
            :tooltip="question.tooltip"
            :field_type="question.field_type"
        ></questions>
        <infections v-if="id == 2"></infections> 
        
    </div>
`

export { SectionTemplate }