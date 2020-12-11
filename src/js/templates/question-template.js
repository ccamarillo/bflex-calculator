const QuestionTemplate = `
    <div style="border: 1px solid red; padding: 20px;">
        {{ label }}
        <br />
        {{ tooltip }}
        <br />

        <br />

            <!-- RANGE SLIDER -->
            <input 
                v-if="field_type == 'slider' || field_type == 'text'"
                v-on:init="emitChange($event)"
                v-on:input="emitChange($event); updateValue($event.target.value)"
                v-bind:value="value"
                v-bind:data-question="name" 
                v-bind:data-fieldtype="field_type" 
                class="slider" 
                type="range" 
                v-bind:min="min" 
                v-bind:max="max" 
                v-bind:step="step"
                class="slider"
            />

            <!-- SLIDER TICKS -->
            <div v-if="field_type == 'text'" class="slider-ticks">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            Low
                        </div>
                        <div class="col-4 text-center">
                            Average
                        </div>
                        <div class="col-4">
                            <p style="text-align: right;">High</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HIDDEN REPROCESSING CALC METHOD -->
            <input v-if="name == 'reprocessing_calc_method'" type="hidden" required v-bind:name="name" v-bind:value="reprocessing_calc_method" />
            <input v-if="name == 'current_annual_oop_repair_all_factor'" type="hidden" required v-bind:name="name" v-bind:value="factor" />

            <!-- SIMPLE NUMBER INPUT -->
            <div v-if="field_type == 'slider' || field_type == 'number'">
                <input v-on:change="emitChange($event); updateValue($event.target.value)" type="number" required v-bind:name="name" v-bind:value="value" v-bind:data-question="name" />
            </div>

            <!-- OUTPUT -->
            <div v-if="name == 'current_annual_oop_repair_all_factor'">
                {{ totalAnnualRepairMaintenance }} aannual OOP repair cost
            </div>
            <div v-if="name == 'reprocessing_calc_method'">
                {{ hiddenCostsPerProcedure }} per procedure with reusable scopes
            </div>
        </div>

    </div>
`

export { QuestionTemplate }