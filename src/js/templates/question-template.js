const QuestionTemplate = `
    <div>
        {{ label }}
        <br />
        {{ tooltip }}
        <br />


        <input v-if="name == 'total_procedures'" v-on:change="emitChange($event)" type="number" required v-bind:name="name" />
        <input v-else-if="field_type == 'number'" type="number" required v-bind:name="name" />

        <select v-else v-bind:name="name" required>
            <option value="low">low</option>
            <option value="average" selected>average</option>
            <option value="high">high</option>
        </select>

    </div>
`

export { QuestionTemplate }