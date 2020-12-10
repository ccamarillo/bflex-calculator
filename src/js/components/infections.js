import { InfectionsTemplate } from '../templates/infections-template.js'
import { bus } from '../main.js'

const Infections = {
  template: InfectionsTemplate,
  props: {
    number_per_year: Number
  },
  created (){
    bus.$on('change-total-procedures', (value) => {
        this.number_per_year = total_infects
        this.updateInfections(value)
    })
  },
  methods: {
    updateInfections(total_procedures) { 
        // FIX ME needs actual formula
        let total_infects = total_procedures * 100
    }
  }
}

export { Infections }