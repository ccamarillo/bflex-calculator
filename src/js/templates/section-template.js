const SectionTemplate = `
    <div class="section background white">
        <div class="container-md">
            <div class="row">
                <div class="col-12">
                    <div class="step">
                        <span class="current">Step {{ id }}</span> / 4
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ title }}</h2>
                    <div v-html=details></div>
                </div>
                <div class="col-md-6 col-sm-12">
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
            </div>
        </div>
    </div>
`

export { SectionTemplate }