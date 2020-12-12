import 'https://cdnjs.cloudflare.com/ajax/libs/core-js/3.8.1/minified.js'
import Vue from 'https://cdn.jsdelivr.net/npm/vue@latest/dist/vue.esm.browser.min.js'
import { MainTemplate } from './templates/main-template.js'
import { Section } from './components/section.js'
import { Infections } from './components/infections.js'

// EVENT BUS
export const bus = new Vue();

// AXIOS
// axios.get('./prep.php').then(function(response)  {
//     console.log(response);
// })

/**
 * Removes an item from an array by value, returns the array
 */
Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};

// APP
const app = new Vue({
    el: '#app',
    components: {
        'sections': Section,
        'infections': Infections
    },
    props: { 
        submit_enabled: Boolean, // should we show the submit button?
        errors: Array // an array of names of input fields currently with validation errors
    },
    created (){
        this.submit_enabled = true

        bus.$on('input-error', (name) => {
            this.manageSubmitButton(name, false)
        })
        bus.$on('input-success', (name) => {
            this.manageSubmitButton(name, true)
        })

        this.errors = []
    },
    methods: {
        manageSubmitButton(name, success) {
            if (success) {
                this.errors.remove(name)
            } else {
                this.errors.push(name)
            }
            if (this.errors.length) {
                this.submit_enabled = false
            } else {
                this.submit_enabled = true
            }
        }
    },
    template: MainTemplate,
    data() {
        return {
            sections: [
                { 
                    id: 1, 
                    title: "Let’s Assess Your Current Needs",
                    details: '<p>Indicate your hospital’s volume of bronchoscopy procedures and equipment needs. We’ll use these data as the basis for your cost-savings report.</p>',
                    questions: [
                        {
                            name: "total_procedures",
                            label: "Total bronch prodedures",
                            field_type: 'slider',
                            value: 1000,
                            min: 0,
                            max: 5000,
                        },
                        {
                            name: "single_use_procedures",
                            label: "Procedures that could be performed by single-use bronchoscopes",
                            field_type: 'slider',
                            value: 1000,
                            min: 0,
                            max: 5000,
                        },
                        {
                            name: "bflex_broncoscope_price",
                            label: "Your BFlex™ bronchoscope price",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'number',
                            value: 256,
                        }
                    ]
                },
                {
                    id: 2, 
                    title: "How About Repair and Maintenance?",
                    details: '<p>Indicate your hospital’s volume of bronchoscopy procedures and equipment needs. We’ll use these data as the basis for your cost-savings report.</p>',
                    questions: [
                        {
                            name: "current_reusable_quantity",
                            label: "Total number of reusable bronchoscopes",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'slider',
                            value: 30,
                            min: 0,
                            max: 100,
                        },
                        {
                            name: "current_annual_service_per",
                            label: "Annual cost of service agreement per bronchoscope",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'slider',
                            value: 2200,
                            min: 0,
                            max: 5000,
                        },
                        {
                            name: "current_annual_oop_repair_all_factor",
                            label: "Annual out-of-pocket repair costs for all bronchoscopes",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'text',
                            value: 0,
                            min: 0,
                            max: 100,
                        }
                    ]
                },
                {
                    id: 3, 
                    title: "Can't Forget Hidden Reprocessing Costs",
                    details: '<p>Ensuring reusables are safe requires strict reprocessing, but there are hidden costs to consider.</p>',
                    questions: [
                        {
                            name: "reprocessing_calc_method",
                            label: "Reprocessing Costs ",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'text',
                            value: 0,
                            min: 0,
                            max: 100
                        },
                    ]
                },
                { 
                    id: 4, 
                    title: "Infections",
                    details: '<p>I am a paragraph.</p>',
                },
            ]
        }
    }
})