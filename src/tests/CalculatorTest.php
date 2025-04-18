<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase {
    
    
    public function testInvalidValidateInputsThrowException() {
        $this->expectExceptionMessage('An error occured while processing the form. Total Procedures must be an integer. Total Procedures must be greater than 0. Single-Use Procedures must be an integer. Single-Use Procedures must be greater than 0. Bflex Bronchoscope Price must be greater than 0. Current Resusable Quantity must be an integer. Current Resusable Quantity must be greater than 0. Current Annual Service Per must be an integer. Current Annual Service Per must be greater than 0. Reprocessing Calculation Method must be "low", "average", or "high". Current Annual OOP Repair All Factor must be an integer.');
        $calculator = new Calculator();
        $calculated = $calculator->calculate('oh', 'test', 'something', 'else', 'entirely', 'bad', 'oh', 'sobad');
    }

    public function testValidInputs() {
        $calculator = new Calculator();
        $results = $calculator->calculate('My Facility', 100, 50, 265, 30, 2200, 'low', 53);
        $this->assertEquals(get_class($calculator), 'Calculator');
    }

    public function testCalculateLow() {
        $calculator = new Calculator();
        $results = $calculator->calculate('My Facility', 1000, 750, 265, 30, 2200, 'low', 53);;
        $this->assertEquals([
            'current_annual_oop_repair_all_factor' => 53,
            'facility_name' => 'My Facility',
            'cost_per_infection' => 28383,
            'reprocessing_costs' => [
                'method' => 'low',
                'details' => [
                    'ppe_personal' => 5.06,
                    'bedside_preclean' => 4.45,
                    'leak_testing' => 2.27,
                    'manual_cleaning' => 11.12,
                    'visual_inspection' => 14.62,
                    'hld_in_aer' => 10.74,
                    'drying_storage' => 1.88
                ]
            ],
            'current_costs' => [
                'equipment_costs' => [
                    'single_use_scopes' => 0,
                    'total_su_bflex_cost' => 0
                ],
                'repair_maintenance' => [
                    'reusable_scopes_quantity' => 30,
                    'service_agreement_per_bronchoscope' => 2200,
                    'annual_oop_repair_all' =>  53000,
                    'total_annual_maint_repair' => 119000,
                ],
                'reprocessing' => [
                    'total_annual_reprocessing_costs' => 50140
                ],
                'treating_infections' => [
                    'patient_infections' => 7.23,
                    'annual_costs' => 205067,
                ],
                'total_costs' => 374207,
            ],
            'reducing_costs' => [
                'equipment_costs' => [
                    'single_use_scopes' => 750,
                    'total_su_bflex_cost' => 198750
                ],
                'repair_maintenance' => [
                    'reusable_scopes_quantity' => 30,
                    'service_agreement_per_bronchoscope' => 2200,
                    'annual_oop_repair_all' => 13250,
                    'total_annual_maint_repair' => 79250
                ],
                'reprocessing' => [
                    'total_annual_reprocessing_costs' => 12535
                ],
                'treating_infections' => [
                    'patient_infections' => 1.81,
                    'annual_costs' =>  51267
                ],
                'total_costs' =>  341802
            ],
        ], $results);
    }
}