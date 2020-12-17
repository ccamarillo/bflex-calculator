const QuestionTemplate = `
    <div class="question">
        <div class="row">
            <div class="col-12">
                <label v-bind:for="name">{{ label }}</label>
            </div>
        </div>
        <div v-if="error" class="error">
            {{ error }}
        </div>

        <!-- SIMPLE TEXT -->
        <div v-if="field_type == 'simple-text'" class="row">
            <div class="col-12">
                <input 
                    v-on:change="updateValue($event.target.value)" 
                    type="text" 
                    class="full-width" 
                    v-bind:name="name" 
                    v-bind:data-question="name" 
                    v-bind:placeholder="placeholder" 
                    required 
                    v-bind:value="value"
                />
            </div>
        </div>

        <!-- SIMPLE NUMBER INPUT -->
        <div v-if="field_type == 'number'" class="row">
            <div class="col-10">
                <input v-on:change="emitChange($event); updateValue($event.target.value)" type="number" class="full-width" required v-bind:name="name" v-bind:value="value" v-bind:data-question="name" />
            </div>
            <div v-if="tooltip" class="col-2">
                <a v-if="tooltip" class="tooltip-icon" v-on:click="toggleTooltip()"><img src="./img/tooltip.png" alt="More information" /></a>
            </div>
        </div>

        <!-- SLIDER or TEXT SLIDER -->
        <div v-if="field_type == 'slider' || field_type == 'text'" class="row">
            <div v-bind:class="slider_col_classes">
                
                <!-- RANGE SLIDER -->
                <div v-if="field_type == 'slider' || field_type == 'text'">
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
                    />
                </div>
                
                <!-- SLIDER TICKS -->
                <div v-if="field_type == 'text'" class="slider-ticks">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4">
                                Low
                            </div>
                            <div class="col-4 text-center">
                                Average
                            </div>
                            <div class="col-4" style="text-align: right;">
                                High
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="field_type == 'slider'" class="slider-ticks">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                {{ min }}
                            </div>
                            <div class="col-6" style="text-align: right;">
                                {{ max }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-2" v-if="field_type == 'slider'">
                <div>
                    <input class="number" v-on:change="emitChange($event); updateValue($event.target.value)" type="number" required v-bind:name="name" v-bind:value="value" v-bind:data-question="name" />
                </div>
            </div>
            <div v-if="tooltip" class="col-2">
                <a v-if="tooltip" class="tooltip-icon" v-on:click="toggleTooltip()"><img src="./img/tooltip.png" alt="More information" /></a>
            </div>
            
        </div>

        <div v-if="tooltip_visible" class="row tooltip-wrapper">
            <div class="col-12">
                <div class="tip-arrow">
                    <img src="./img/tooltip-tip.png" />
                </div>
                <div class="tip">
                    {{ tooltip }}
                </div>
            </div>
        </div>
        
        <!-- HIDDEN REPROCESSING CALC METHOD -->
        <input v-if="name == 'reprocessing_calc_method'" type="hidden" required v-bind:name="name" v-bind:value="reprocessing_calc_method" />
        <input v-if="name == 'current_annual_oop_repair_all_factor'" type="hidden" required v-bind:name="name" v-bind:value="factor" />

        <!-- OUTPUT -->
        <div v-if="name == 'current_annual_oop_repair_all_factor'" class="output container">
            <span>\${{ totalAnnualRepairMaintenance }}</span> annual out-of-pocket repair costs
        </div>
        <div v-if="name == 'reprocessing_calc_method'" class="output container">
            <span>\${{ hiddenCostsPerProcedure }}</span> per procedure with reusable scopes
        </div>
    </div>
`

export { QuestionTemplate }