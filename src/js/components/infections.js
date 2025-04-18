import { InfectionsTemplate } from '../templates/infections-template.js'
import { bus } from '../main.js'

const Infections = {
  template: InfectionsTemplate,
  props: {
    total_procedures: Number,
    total_infects: Number,
    annual_treatment_costs: Number,
    infects_complete: Number
  },
  created (){
    bus.$on('change-total-procedures', (total_procedures) => {
        this.total_procedures = total_procedures
        this.updateInfections()
        this.updateTreatmentCosts()
    })
  },
  methods: {
    updateInfections() { 
        this.infects_complete = this.total_procedures * 0.034 * 0.2125
        this.total_infects = this.roundTo(this.infects_complete, 2)
    },
    updateTreatmentCosts() {
        this.annual_treatment_costs = new Intl.NumberFormat().format(this.roundTo(this.total_infects * 28383))
    },
    roundTo(n, digits) {
      if (digits === undefined) {
        digits = 0;
      }
    
      var multiplicator = Math.pow(10, digits);
      n = parseFloat((n * multiplicator).toFixed(11));
      var test =(Math.round(n) / multiplicator);
      return +(test.toFixed(digits));
    }
  } 
}

export { Infections }