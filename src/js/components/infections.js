import { InfectionsTemplate } from '../templates/infections-template.js'
import { bus } from '../main.js'

const Infections = {
  template: InfectionsTemplate,
  props: {
    total_procedures: Number,
    total_infects: Number
  },
  created (){
    bus.$on('change-total-procedures', (total_procedures) => {
        this.total_procedures = total_procedures
        this.updateInfections()
    })
  },
  methods: {
    updateInfections() { 
        // FIX ME needs actual formula
        this.total_infects = this.total_procedures * 100
    }
  }
}

export { Infections }