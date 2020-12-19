import { MainTemplate } from '../templates/main-template.js'
import { QuestionTemplate } from '../templates/question-template.js'
import { bus } from '../main.js';

const Question = {
    template: QuestionTemplate,
    props: {
        name: String,
        label: String,
        tooltip: String,
        field_type: String,
        total_procedures: Number,
        value: Number,
        reprocessing_calc_method: String,
        min: Number,
        max: Number,
        step: Number,
        totalAnnualRepairMaintenance: Number,
        factor: Number,
        hiddenCostsPerProcedure: Number,
        error: String,
        tooltip_visible: Boolean,
        slider_col_classes: String,
        placeholder: String,
        max_chars: String
    },
    mounted: function () {
        if (this.value > this.max || this.value < this.in) {
            alert('Value for ' + this.name + ' is not within min and max range')
        }

        if (this.name == 'total_procedures') {
            bus.$emit('change-total-procedures', this.value)
        }

        if (this.field_type === 'text') {
            this.step = 50
        } else {
            this.step = 1
        }

        if (this.name == 'current_annual_oop_repair_all_factor') {
            this.setTotalAnnualRepairMaintenance(0)
        }

        if (this.name == 'reprocessing_calc_method') {
            this.setReprocessingCalcMethod(0)
        }

        this.tooltip_visible = false

        if (this.field_type == 'slider') {
            if (this.tooltip) {
                this.slider_col_classes = 'col-8'
            } else {
                this.slider_col_classes = 'col-9'
            }
        } else if (this.field_type == 'text') {
            if (this.tooltip) {
                this.slider_col_classes = 'col-10'
            } else {
                this.slider_col_classes = 'col-12'
            }
        }
    },  
    created: function() {
        // Watch events from event bus
        bus.$on('change-total-procedures', (total_procedures) => {
            this.total_procedures = total_procedures
            if (this.name == 'current_annual_oop_repair_all_factor') {
                this.setTotalAnnualRepairMaintenance(this.value)
            }

            if (this.name == 'single_use_procedures') {
                this.validate(this.value)
            }
        })

        bus.$on('get-results', () => {
            if (this.name == 'facility_name') {
                this.validate(this.value)
            }
        })

        if (this.name == 'reprocessing_calc_method') {
            this.setHiddenCostsPerProcedure(this.value)
        }
    },
    methods: {
        setTotalAnnualRepairMaintenance(value) {
            if (value == 0) { 
                this.factor = 53;
            } else if (value == 50) {
                this.factor = 58
            } else {
               this.factor = 63
            }
            this.totalAnnualRepairMaintenance = this.numberWithCommas(this.factor * parseInt(this.total_procedures))
        },

        numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        emitChange(event) {
            if (event.target.dataset.question == 'total_procedures') {
                bus.$emit('change-total-procedures', event.target.value)
            }
            if (event.target.dataset.question == 'reprocessing_calc_method') {
                this.setReprocessingCalcMethod(event.target.value)
                this.setHiddenCostsPerProcedure(event.target.value)
            }
        },

        setReprocessingCalcMethod(value) {
            if (value == 0) { 
                this.reprocessing_calc_method = 'low';
            } else if (value == 50) {
                this.reprocessing_calc_method = 'average';
            } else {
                this.reprocessing_calc_method = 'high';
            }
        },

        setHiddenCostsPerProcedure(value) {
            if (value == 0) {
                this.hiddenCostsPerProcedure = 50.14
            } else if (value == 50) {
                this.hiddenCostsPerProcedure = 101.43 
            } else {
                this.hiddenCostsPerProcedure = 152.66
            }
        },

        updateValue(value) {
            this.validate(value);

            this.value = value

            if (this.name == 'current_annual_oop_repair_all_factor') {
                this.setTotalAnnualRepairMaintenance(value)
                this.setHiddenCostsPerProcedure(value)   
            }
        },
        validate(value) {
            this.error = false
            let error = '';
            
            if (this.field_type == 'slider') {
                
                if (Number.parseInt(value) < this.min || value > this.max) {
                    error += "The value must be between " + this.min + " and " + this.max + ".  "
                }
                if (!Number.isInteger(parseFloat(value))) {
                    error += "The value must be an integer.  "
                }

                if (this.name == 'single_use_procedures') {
                    if (Number.parseInt(value) > Number.parseInt(this.total_procedures)) {
                        error += "This value must be less than or equal to the total annual bronchoscopy procedures."
                    }
                }
            }

            if (this.field_type == 'number') {
                if (value < 1) {
                    error += "The value must be 1 or greater.  "
                }
                if (!Number.isInteger(parseFloat(value))) {
                    error += "The value must be an integer.  "
                }
            }

            if (this.field_type == 'simple-text') {
                if (this.name == 'facility_name') {
                    if (value == '') {
                        error += 'Please enter the name of your facility.'
                    }
                }
            }

            if (error == '') {
                this.error = false
                bus.$emit('input-success', this.name)
            } else {
                this.error = error
                bus.$emit('input-error', this.name)
            }
        },
        toggleTooltip() {
            this.tooltip_visible = !this.tooltip_visible
        }
    }
}

export { Question }