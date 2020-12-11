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
        total_procedures: Number,
        factor: Number,
        hiddenCostsPerProcedure: Number
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

        
    },
    created: function() {
        // Watch events from event bus
        bus.$on('change-total-procedures', (total_procedures) => {
            this.total_procedures = total_procedures
            if (this.name == 'current_annual_oop_repair_all_factor') {
                this.setTotalAnnualRepairMaintenance(this.value)
            }
        })
        if (this.name == 'reprocessing_calc_method') {
            this.hiddenCostsPerProcedure = 50.14
        }
    },
    methods: {
        setTotalAnnualRepairMaintenance(value) {
            console.log('getting here')
            if (value == 0) { 
                this.factor = 53;
            } else if (value == 50) {
                this.factor = 58
            } else {
               this.factor = 63
            }
            this.totalAnnualRepairMaintenance = this.factor * parseInt(this.total_procedures)
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
            this.value = value

            // if (this.name == 'total_procedures') {
            //     this.setTotalAnnualRepairMaintenance(value)
            // }

            if (this.name == 'current_annual_oop_repair_all_factor') {
                this.setTotalAnnualRepairMaintenance(value)
                this.setHiddenCostsPerProcedure(value)   
            }
        }
    }
}

export { Question }