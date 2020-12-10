import Vue from 'https://cdn.jsdelivr.net/npm/vue@latest/dist/vue.esm.browser.min.js'

// import { Navbar } from './components/navbar.js'
import { MainTemplate } from './templates/main-template.js'
// import { About } from './components/about.js'
import { Section } from './components/section.js'
import { Infections } from './components/infections.js'

// const App = {
//     data() {
//         return {
//             sections: [
//                 { id: 1, title: "Reducing Infections" },
//                 { id: 2, title: "Cleaning Stuff" },
//             ]
//         }
//     }
// }

// const app = Vue.createApp(App)

// Vue.use(VueRouter)

// const router = new VueRouter({
//   routes: [{
//     path: '/about',
//     component: About,
//     name: "About Us Page"
//   }]
// })

// EVENT BUS
export const bus = new Vue();

const app = new Vue({
    el: '#app',
    components: {
        'sections': Section,
        'infections': Infections
    },

    // router,
    template: MainTemplate,
    data() {
        return {
            sections: [
                { 
                    id: 1, 
                    title: "Basics",
                    details: '<p>I am a paragraph.</p>',
                    questions: [
                        {
                            name: "total_procedures",
                            label: "Total Procedures?",
                            tooltip: "test tooltip for total procedures",
                            field_type: 'number',
                            default: 1000
                        },
                        {
                            name: "single_use_procedures",
                            label: "Single-Use Procedures?",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'number',
                            default: 750
                        },
                        {
                            name: "bflex_broncoscope_price",
                            label: "Single-Use Procedures?",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'number',
                            default: 265
                        },
                        {
                            name: "current_reusable_quantity",
                            label: "Single-Use Procedures?",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'number',
                            default: 30
                        },
                        {
                            name: "current_annual_service_per",
                            label: "Single-Use Procedures?",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'number',
                            default: 2200
                        },
                        {
                            name: "reprocessing_calc_method",
                            label: "Single-Use Procedures?",
                            tooltip: "test tooltip single use procedures",
                            field_type: 'select',
                            default: 'average'
                        }
                    ]
                },
                { 
                    id: 2, 
                    title: "Infections",
                    details: '<p>I am a paragraph.</p>',
                },
                
            ]
        }
    }
})