const InfectionsTemplate = `
<div class="infections">
    <div class="statistic">
        <figcaption>Estimated number of infections due to cross-contamination</figcaption>
        <figure>{{ total_infects }}</figure>
        <input type="hidden" name="current_infections" v-bind:value="total_infects" />
    </div>
    <div class="statistic">
        <figcaption>Annual estimated costs due to cross-contamination</figcaption>
        <figure>$28,383</figure>
    </div>
</div>
`

export { InfectionsTemplate }