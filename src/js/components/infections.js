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
        this.total_infects = ((this.total_procedures * 0.034) * 0.2125).toFixed(2)
    }
  }
}

export { Infections }