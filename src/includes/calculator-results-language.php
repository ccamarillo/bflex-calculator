<?php

/**
 * get text for repair and maintenance header
 * @param array
 * @return string
 */
function getRepairMaintenanceValueText($calculated) {
    if ($calculated['current_annual_oop_repair_all_factor'] == 53) {
        return 'Low';
    } else if ($calculated['current_annual_oop_repair_all_factor'] == 58) {
        return 'Average';
    } else {
        return 'High';
    }
}

/**
 * Get the Reprocessing titles from internal name
 * @param string
 * @return string
 */
function getReprocessingTextFromName($name) {
    $reprocessingMap = [
        'ppe_personal' => 'PPE for personel',
        'bedside_preclean' => 'Bedside pre-cleaning',
        'leak_testing' => 'Leak Testing', // maps to C22,
        'manual_cleaning' => 'Manual cleaning', // maps to C23
        'visual_inspection' => 'Visual Inspection', // maps to C24
        'hld_in_aer' => 'HLD in an AER', // maps to C25
        'drying_storage' => 'Drying and Storage' // maps to C26
    ];
    return $reprocessingMap[$name];
}

$rows = [
    [
        'type' => 'section',
        'title' => 'Current Bronchoscope Usage'
    ],
    [
        'type' => 'result',
        'title' => 'Single use BFlex scopes',
        'value_current' => $calculated['current_costs']['equipment_costs']['single_use_scopes'],
        'value_with' => $calculated['reducing_costs']['equipment_costs']['single_use_scopes']
    ],
    [
        'type' => 'total',
        'value_current' => '$' . $calculated['current_costs']['equipment_costs']['total_su_bflex_cost'],
        'value_with' => '$' . number_format($calculated['reducing_costs']['equipment_costs']['total_su_bflex_cost'])
    ],
    [
        'type' => 'section',
        'title' => 'Repair and Maintenance Costs',
        'value_current' => getRepairMaintenanceValueText($calculated)
    ],
    [
        'type' => 'result',
        'title' => 'Reusable Bronchoscopes (QTY)',
        'value_current' => '$' . number_format($calculated['current_costs']['repair_maintenance']['reusable_scopes_quantity']),
        'value_with' => '$' . number_format($calculated['reducing_costs']['repair_maintenance']['reusable_scopes_quantity'])
    ],
    [
        'type' => 'result',
        'title' => 'Annual cost of service agreement per bronchoscope',
        'value_current' => '$' . number_format($calculated['current_costs']['repair_maintenance']['service_agreement_per_bronchoscope']),
        'value_with' => '$' . number_format($calculated['reducing_costs']['repair_maintenance']['service_agreement_per_bronchoscope'])
    ],
    [
        'type' => 'result',
        'title' => 'Annual out-of-pocket repair costs for all bronchoscopes',
        'value_current' => '$' . number_format($calculated['current_costs']['repair_maintenance']['annual_oop_repair_all']),
        'value_with' => '$' . number_format($calculated['reducing_costs']['repair_maintenance']['annual_oop_repair_all'])
    ],
    [
        'type' => 'total',
        'value_current' => '$' . number_format($calculated['current_costs']['repair_maintenance']['total_annual_maint_repair']),
        'value_with' => '$' . number_format($calculated['reducing_costs']['repair_maintenance']['total_annual_maint_repair'])
    ],
    [
        'type' => 'section',
        'title' => 'Reprocessing Costs',
        'value_current' => ucwords($calculated['reprocessing_costs']['method'])
    ],
    [
        'type' => 'result',
        'title' => 'Reprocessing costs',
        'value_current' => ucwords($calculated['reprocessing_costs']['method']),
        'value_with' => ucwords($calculated['reprocessing_costs']['method'])
    ],
    [
        'type' => 'reprocessing'
    ],
    [
        'type' => 'total',
        'value_current' => '$' . number_format($calculated['current_costs']['reprocessing']['total_annual_reprocessing_costs']),
        'value_with' => '$' . number_format($calculated['reducing_costs']['reprocessing']['total_annual_reprocessing_costs'])
    ],
    [
        'type' => 'section',
        'title' => 'Treating infections'
    ],
    [
        'type' => 'result',
        'title' => 'Patient infections due to cross contamination',
        'value_current' => $calculated['current_costs']['treating_infections']['patient_infections'],
        'value_with' => $calculated['reducing_costs']['treating_infections']['patient_infections']
    ],
    [
        'type' => 'result',
        'title' => 'Cost per infection',
        'value_current' => '$' . number_format($calculated['cost_per_infection']),
        'value_with' => '$' . number_format($calculated['cost_per_infection'])
    ],
    [
        'type' => 'total',
        'value_current' => '$' . number_format($calculated['current_costs']['treating_infections']['annual_costs']),
        'value_with' => '$' . number_format($calculated['reducing_costs']['treating_infections']['annual_costs'])
    ],
    [
        'type' => 'grand-total',
        'value_current' => '$' . number_format($calculated['current_costs']['total_costs']),
        'value_with' => '$' . number_format($calculated['reducing_costs']['total_costs'])
    ]
    ];