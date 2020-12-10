const QuestionTemplate = `
    <div>
        {{ label }}
        <br />
        {{ tooltip }}
        <br />

        <input @change="inputChange($event)" v-if="field_type == 'number'" type="number" v-bind:name="name" required />

        <select @change="inputChange($event)" v-if="field_type == 'select'" v-bind:name="name" required>
            <option value="low">low</option>
            <option value="average" selected>average</option>
            <option value="high">high</option>
        </select>

    </div>
`

export { QuestionTemplate }