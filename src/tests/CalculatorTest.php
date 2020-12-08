<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase {
    
    
    public function testInvalidValidateInputsThrowException() {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('An error occured while processing the form. Total Procedures must be an integer. Total Procedures must be greater than 0. Single-Use Procedures must be an integer. Single-Use Procedures must be greater than 0. Bflex Bronchoscope Price must be an integer. Bflex Bronchoscope Price must be greater than 0. Current Resusable Quantity must be an integer. Current Resusable Quantity must be greater than 0. Current Annual Service Per must be an integer. Current Annual Service Per must be greater than 0. Reprocessing Calculation Method must be "low", "average", or "high".');
        $calculator = new Calculator('test', 'something', 'else', 'entirely', 'bad', 'oh', 'my');
    }

    public function testValidInputs() {
        $calculator = new Calculator(100, 50, 265, 30, 2200, 'low', 7.23);
        $this->assertEquals(get_class($calculator), 'Calculator');
    }

    public function testCalculateLow() {
        $calculator = new Calculator(1000, 750, 265, 30, 2200, 'low', 7.23);
        $results = $calculator->calculate();
        $this->assertEquals($results, [
            'current_costs' => [
                'total_su_bflex_cost' => 0,
                'repair_maintenance' => [
                    'annual_oop_repair_all' =>  53000,
                    'total_annual_maint_repair' => 119000,
                ],
                'reprocessing' => [
                    'total_annual_reprocessing_costs' => 50140
                ],
                'treating_infections' => [
                    'patient_infections' => 7.23,
                    'annual_costs' => 205209,
                ],
                'total_costs' => 374349,
            ],
            'reducing_costs' => [
                'total_su_bflex_cost' => 198750,
                'repair_maintenance' => [
                    'annual_oop_repair_all' => 13250,
                    'total_annual_maint_repair' => 35250
                ],
                'reprocessing' => [
                    'total_annual_reprocessing_costs' => 12535
                ],
                'treating_infections' => [
                    'patient_infections' => 1.8075,
                    'annual_costs' =>  51302
                ],
                'total_costs' =>  297837
            ],
        ]);
    }
}