<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase {
    
    
    public function testInvalidValidateInputsThrowException() {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('An error occured while processing the form. Total Procedures must be an integer. Total Procedures must be greater than 0. Single-Use Procedures must be an integer. Single-Use Procedures must be greater than 0.');
        $calculator = new Calculator('test', 'something', 'else', 'entirely');
    }

    public function testValidInputs() {
        $calculator = new Calculator(100, 50, 265, 30);
        $this->assertEquals(get_class($calculator), 'Calculator');
    }

    public function testCalculateLow() {
        $calculator = new Calculator(1000, 750, 265, 30);
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
                    'patient_infections' => 7,
                    'annual_costs' => 205067,
                ],
                'total_costs' => 374207,
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
                    'patient_infections' => 2,
                ],
                'treating_infections' => [
                    'patient_infections' => 2,
                    'annual_costs' =>  51267
                ],
                'total_costs' => 297802
            ],
        ]);
    }
}