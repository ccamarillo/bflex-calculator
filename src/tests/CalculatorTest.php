<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase {
    
    
    public function testInvalidValidateInputsThrowException() {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('An error occured while processing the form. Total Procedures must be an integer. Total Procedures must be greater than 0. Single-Use Procedures must be an integer. Single-Use Procedures must be greater than 0.');
        $calculator = new Calculator('test', 'something');
        
    }

    public function testValidInputs() {
        $calculator = new Calculator(100, 50);
        $this->assertEquals(get_class($calculator), 'Calculator');
    }

    public function testCalculateLow() {
        $calculator = new Calculator(100, 50);
        $results = $calculator->calculate();
        $this->assertEquals($results, [
            'current_costs' => [
                'total_su_bflex_cost' => 1325,
                'repair_maintenance' => [
                    'annual_oop_repair_all' => 5300,
                    'total_annual_maint_repair' => 71300,
                ],
                'reprocessing' => [
                    'total_annual_reprocessing_costs' => 5014
                ],
                'treating_infections' => [
                    'patient_infections' => 1,
                    'annual_costs' => 20507,
                ],
                'total_costs' => 98146,
            ]
        ]);
    }

    public function testCalculateLow2() {
        $calculator = new Calculator(1000, 750);
        $results = $calculator->calculate();
        $this->assertEquals($results, [
            'current_costs' => [
                'total_su_bflex_cost' => 1325,
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
                'total_costs' => 375532,
            ]
        ]);
    }
}