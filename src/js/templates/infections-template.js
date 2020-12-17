const InfectionsTemplate = `
<div class="infections">
    <div class="statistic">
        <figcaption>Estimated number of infections due to cross contamination:</figcaption>
        <figure>{{ total_infects }}</figure>
        <input type="hidden" name="current_infections" v-bind:value="total_infects" />
    </div>
    <div class="statistic">
        <figcaption>Estimated annual treatment cost:</figcaption>
        <figure>\${{ annual_treatment_costs }} </figure>
    </div>
</div>
`

export { InfectionsTemplate }