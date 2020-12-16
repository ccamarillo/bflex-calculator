import Vue from 'https://cdn.jsdelivr.net/npm/vue@latest/dist/vue.esm.browser.min.js'
import { MainTemplate } from './templates/main-template.js'
import { Section } from './components/section.js'
import { Infections } from './components/infections.js'

// EVENT BUS
export const bus = new Vue();

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
                    title: "Current Bronchoscope Usage",
                    details: '<p>Indicate your hospital’s volume of annual bronchoscopy procedures and current costs. We’ll use these data as the basis for your results. </p>',
                    questions: [
                        {
                            name: "facility_name",
                            label: "Facility Name",
                            field_type: 'simple-text',
                            value: "Enter Facility Name Here"
                        },
                        {
                            name: "total_procedures",
                            label: "Total Annual Bronchoscopy Procedures",
                            field_type: 'slider',
                            value: 1000,
                            min: 0,
                            max: 1000,
                        },
                        {
                            name: "single_use_procedures",
                            label: "Number of procedures that could be performed with single-use bronchoscopes ",
                            field_type: 'slider',
                            value: 750,
                            min: 0,
                            max: 1000,
                        },
                        {
                            name: "bflex_broncoscope_price",
                            label: "Your BFlex™ bronchoscope price",
                            tooltip: "List price is $295 for the BFlex 5.0. Actual costs may vary. Contact sales for an estimate. ",
                            field_type: 'number',
                            value: 256,
                        }
                    ]
                },
                {
                    id: 2, 
                    title: "Repair and Maintenance",
                    details: `
                        <p>Indicate how many reusable bronchoscopes your hospital currently uses, plus costs for repairs and annual service agreements.  </p>
                        <p>If annual out-of-pocket repair costs aren’t readily available, that’s ok. We’ve included a range based on published cost analyses. </p>
                        <p class="footnote">Gupta, D. et al. Cost-effectiveness analysis of flexible optical scopes for tracheal intubation: a descriptive comparative study of reusable and single-use scopes. J of Clin Anesthesia. 2011; 23(8): 632-635. </p>
                        <p class="footnote">Liu, S. et al. Cost Identification Analysis of Anesthesia Fiberscope Use for Tracheal Intubation. J Anesth Clin Res 2012, 3:5. </p>
                    `,
                    questions: [
                        {
                            name: "current_reusable_quantity",
                            label: "Total number of reusable bronchoscopes",
                            field_type: 'slider',
                            value: 30,
                            min: 0,
                            max: 1000,
                        },
                        {
                            name: "current_annual_service_per",
                            label: "Annual cost of service agreement per bronchoscope",
                            field_type: 'slider',
                            value: 1000,
                            min: 0,
                            max: 1000,
                        },
                        {
                            name: "current_annual_oop_repair_all_factor",
                            label: "Annual out-of-pocket repair costs for all bronchoscopes ",
                            tooltip: "Cost of repairs per use range from $53 (low) to $63 (high). Annual out-of-pocket repair costs equal the cost of repairs per use multiplied by total annual procedures.",
                            field_type: 'text',
                            value: 0,
                            min: 0,
                            max: 100,
                        }
                    ]
                },
                {
                    id: 3, 
                    title: "Hidden Reprocessing Costs",
                    details: `
                        <p>Based on the total number of reusable bronchoscopes, your annual reprocessing cost is low, average, or high.</p>
                        <p>This is a conservative estimate that includes common reprocessing costs but not all* </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li>PPE for personnel</li>
                                    <li>Bedside pre-cleaning </li>
                                    <li>HLD (high-level disinfection) in an AER (automated endoscope reprocessor)</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    <li>Drying and storage</li>
                                    <li>Leak testing</li>
                                    <li>Manual cleaning</li>
                                    <li>Visual inspection</li>
                                </ul>
                            </div>
                        </div>
                        <p class="smaller">*Does not include costs associated with repairs by reprocessing technicians, reprocessing due to exceeding hangtime, or the cost of disposing of materials used during reprocessing.</p>
                        <p class="footnote">Ofstead, C.L. et al. A Glimpse at the True Cost of Reprocessing Endoscopes: Results of a Pilot Project. www.iahcsmm.org. 2017 </p>
                    `,
                    questions: [
                        {
                            name: "reprocessing_calc_method",
                            label: "Reprocessing costs",
                            field_type: 'text',
                            value: 50,
                            min: 0,
                            max: 100
                        },
                    ]
                },
                { 
                    id: 4, 
                    title: "Preventable Infections",
                    details: `
                        <p>The risk of infection is greater with reusable bronchoscopes. With cross-contamination and subsequent infection rates considered, this is the estimated number of infections to occur and the estimated annual cost of treatment*</p>
                        <p class="smaller">*Per Terjesen, C.L. et al. Early Assessment of the Likely Cost Effectiveness of Single-Use Flexible Video Bronchoscopes. PharmacoEconomics Open (2017). 1:133-141.  Cost of treatment per infection is $28,383. Rate of cross-contamination is 3.34% of total bronchoscopy procedures annually. Rate of subsequent infection is 21.25% of cross-contaminated bronchoscopy procedures annually.</p>
                    `,
                },
            ]
        }
    }
})