const QuestionTemplate = `
    <div style="border: 1px solid red; padding: 20px;">
        {{ label }}
        <br />
        {{ tooltip }}
        <br />

        <br />

        <div v-if="error" class="error">{{ error }}</div>

        <!-- RANGE SLIDER -->
        <div v-if="field_type == 'slider' || field_type == 'text'">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <input 
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
                    </div>
                    <div class="col-4">
                        <a v-if="tooltip" class="tooltip-icon" v-on:click="toggleTooltip()">?</a>
                    </div>
                </div>
            </div>
        </div>

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

        <div v-if="field_type == 'slider'" class="slider-tickets">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        {{ min }}
                    </div>
                    <div class="col-6">
                        <p style="text-align: right;">{{ max }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="tooltip_visible == true">{{ tooltip }}</div>

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
`

export { QuestionTemplate }