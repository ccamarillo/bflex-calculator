const InfectionsTemplate = `
<div>
    Total infections: {{ total_infects }}
    <input type="hidden" name="current_infections" v-bind:value="total_infects" />
</div>
`

export { InfectionsTemplate }