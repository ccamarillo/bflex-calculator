<?php

class Calculator {

    private const CURRENT_SU_BLEX_USAGE = 0;  // maps to C11
    private const CURRENT_ANNUAL_SERVICE_PER = 2200; // maps to C15
    private const CURRENT_ANNUAL_OOP_REPAIR_ALL_FACTOR = 53; // maps to factor in C16
    private const REPROCESSING_CALC_METHOD = 'low'; // maps to C19
    private const CROSS_CONTAMINATION_FACTOR_A = .034; // maps to first factor in C28
    private const CROSS_CONTAMINATION_FACTOR_B = .2125; // maps to second factor in C28
    private const COST_PER_INFECTION = 28383; // maps to C30
    private const REDUCING_REUSABLE_SCOPES = 10; // maps to F14

    private $reprocessingCostsLow = [
        'ppe_personal' => 5.06, // maps to C20
        'bedside_preclean' => 4.45, // maps to C21
        'leak_testing' => 2.27, // maps to C22,
        'manual_cleaning' => 11.12, // maps to C23
        'visual_inspection' => 14.62, // maps to C24
        'hld_in_aer' => 10.74, // maps to C25
        'drying_storage' => 1.88 // maps to C26
    ];

    private $reprocessingCostsAverage = [
        'ppe_personal' => 11.42, // maps to C20
        'bedside_preclean' =>  11.80, // maps to C21
        'leak_testing' => 3.78, // maps to C22,
        'manual_cleaning' => 24.12, // maps to C23
        'visual_inspection' => 32.16, // maps to C24
        'hld_in_aer' => 13.98, // maps to C25
        'drying_storage' => 4.17 // maps to C26
    ];

    private $reprocessingCostsHigh = [
        'ppe_personal' => 17.78, // maps to C20
        'bedside_preclean' =>  19.14, // maps to C21
        'leak_testing' => 5.28, // maps to C22,
        'manual_cleaning' => 37.11, // maps to C23
        'visual_inspection' => 48.69, // maps to C24
        'hld_in_aer' => 17.21, // maps to C25
        'drying_storage' => 6.45 // maps to C26
    ];

    private $totalProcedures; // maps to C4
    private $singleUseProcedures; // maps to C5
    private $proceduresRequiringReusable; // maps to C6
    private $bflexBroncoscopePrice; // maps to C7
    private $currentReusableQuantity; // maps to C14

    /**
     * Bootstraps the calculator with client input
     * @param int $totalProcedures
     * @param int $singleUseProcedures
     * @param int $bflexBroncoscopePrice
     * @param int $currentReusableQuantity
     */
    public function __construct(
        $totalProcedures, 
        $singleUseProcedures,
        $bflexBroncoscopePrice,
        $currentReusableQuantity
    ) {
        $this->validateInputs(
            $totalProcedures, 
            $singleUseProcedures,
            $bflexBroncoscopePrice,
            $currentReusableQuantity
        );

        $this->totalProcedures = $totalProcedures; 
        $this->singleUseProcedures = $singleUseProcedures; 
        $this->proceduresRequiringReusable = $totalProcedures - $singleUseProcedures;
        $this->bflexBroncoscopePrice = $bflexBroncoscopePrice;
        $this->currentReusableQuantity = $currentReusableQuantity;
    }

    /**
     * Returns an array of calculated values
     * @return array An associative array with calculated values
     */
    public function calculate() {
        return [
            'current_costs' => $this->getCurrentCosts(),
            'reducing_costs' => $this->getReducingCosts(),
        ];
    }

    /**
     * Get costs associated with "reducing" column
     * @return array associative array
     */
    private function getReducingCosts() {
        $totalBFlexCost = $this->singleUseProcedures * $this->bflexBroncoscopePrice;
        $repairMaintenance = $this->getReducingRepairMaintenance();
        $reprocessing = $this->getMaintainingReprocessing();
        $treatingInfections = $this->getMaintainingTreatingInfections();
        $totalCosts = 
            $totalBFlexCost +
            $repairMaintenance['total_annual_maint_repair'] +
            $reprocessing['total_annual_reprocessing_costs'] +
            $treatingInfections['annual_costs'];
        return [
            'total_su_bflex_cost' => $totalBFlexCost, // maps to F12
            'repair_maintenance' => $repairMaintenance,
            'reprocessing' => $reprocessing, // same as "maintaining" column
            'treating_infections' => $treatingInfections, // same as "maintaining" column
            'total_costs' => $totalCosts, // maps to F33
        ];
    }

    /**
     * Gets "reducing" column repair and maintenance costs
     */
    private function getReducingRepairMaintenance() {
        $oopRepairAll = $this->getMaintainingAnnualOopRepairAll();
        return [
            'annual_oop_repair_all' => $oopRepairAll, // maps to F16
            'total_annual_maint_repair' => (self::CURRENT_ANNUAL_SERVICE_PER * self::REDUCING_REUSABLE_SCOPES) + $oopRepairAll, // maps to F17
        ];
    }

    /**
     * Gets costs for treating infections under "maintaining" column
     * @return array
     */
    private function getMaintainingTreatingInfections() {
        // $patientInfections = $this->getCurrentTreatingInfections() * ($this->proceduresRequiringReusable / $this->totalProcedures);
        $factor = $this->proceduresRequiringReusable / $this->totalProcedures;
        $patientInfections = $this->getCurrentPatientInfections() * $factor;
        $annualCosts = round($patientInfections * self::COST_PER_INFECTION);

        return [
            'patient_infections' => round($patientInfections), // maps to E29
            'annual_costs' => $annualCosts
        ];
    }

    /** 
     * Get reprocessing costs for "Maintaining" column.
     * @return array associative array
     */
    private function getMaintainingReprocessing() {
        $baseCost = $this->getSumReprocessingCosts();

        return [
            'total_annual_reprocessing_costs' => $baseCost * ($this->totalProcedures - $this->singleUseProcedures) // maps to E27
        ];
    }

    /**
     * Get annual OOP for repair in "maintaining" column
     * @return int
     */
    private function getMaintainingAnnualOopRepairAll() {
        return $this->getAnnualOopRepairAll() * ($this->proceduresRequiringReusable / $this->totalProcedures);
    }

    /**
     * Retrieve an array of current costs based off client inputs
     * @return array associative array
     */
    private function getCurrentCosts() {
        $currenTotalSuBFlexCosts = $this->getCurrentTotalBFlexCost();
        $currentRepairMaintenance = $this->getCurrentRepairMaintenance();
        $currentReprocessing = $this->getCurrentReprocessing();
        $treatingInfections = $this->getCurrentTreatingInfections();
        $totalCosts = 
            $currenTotalSuBFlexCosts + 
            $currentRepairMaintenance['total_annual_maint_repair'] + 
            $currentReprocessing['total_annual_reprocessing_costs'] + 
            $treatingInfections['annual_costs'];

        return [
            'total_su_bflex_cost' => $currenTotalSuBFlexCosts,
            'repair_maintenance' => $currentRepairMaintenance,
            'reprocessing' => $currentReprocessing,
            'treating_infections' => $treatingInfections,
            'total_costs' => (int) $totalCosts, // maps to C33
        ];
    }

    /**
     * Get total BFlex cost for "Current" column
     * @return int
     */
    private function getCurrentTotalBFlexCost() {
        return self::CURRENT_SU_BLEX_USAGE * $this->bflexBroncoscopePrice; // maps to C12
    }

    /**
     * Get patient infections for "current" column
     * @return int
     */
    private function getCurrentPatientInfections() {
        return ($this->totalProcedures * self::CROSS_CONTAMINATION_FACTOR_A) * self::CROSS_CONTAMINATION_FACTOR_B;
    }
    
    /**
     * Retrieve an array of current infection costs
     * @return array associative array
     */
    private function getCurrentTreatingInfections() {
        $patientInfections = $this->getCurrentPatientInfections();
        $annualCosts = self::COST_PER_INFECTION * $patientInfections;

        return [
            'patient_infections' => (int) round($patientInfections), // maps to C29
            'annual_costs' => (int) round($annualCosts) // maps to C31
        ];
    }

    /**
     * Sums up all the reprocessing costs based on the calculation method
     * @return int
     */
    private function getSumReprocessingCosts() {
        if (self::REPROCESSING_CALC_METHOD == 'average') {
            $costs = $this->reprocessingCostsAverage;
        } else if (self::REPROCESSING_CALC_METHOD == 'low') {
            $costs = $this->reprocessingCostsLow;
        } else if (self::REPROCESSING_CALC_METHOD == 'high') {
            $costs = $this->reprocessingCostsHigh;
        } else {
            throw new \Exception('Unsupported reprocessing calculation method.');
        }

        $baseCost = 0;
        foreach ($costs as $key => $cost) {
            $baseCost += $cost;
        }
        return $baseCost;
    }

    /**
     * Retrieve an array of current reprocessing costs
     * @return array associative array
     */
    private function getCurrentReprocessing() {
        $baseCost = $this->getSumReprocessingCosts();

        return [
            'total_annual_reprocessing_costs' => $baseCost * $this->totalProcedures
        ];
        
    }

    /**
     * Calculate annual out of pocket repair costs for all columns
     * @return int
     */
    private function getAnnualOopRepairAll() {
        return self::CURRENT_ANNUAL_OOP_REPAIR_ALL_FACTOR * $this->totalProcedures;
    }
    
    /**
     * Retrieve an array of current repair and maintenance costs
     * @return array associative array
     */
    private function getCurrentRepairMaintenance() {
        $annualOopRepairAll = $this->getAnnualOopRepairAll();
        $totalAnnualMaintRepair = (self::CURRENT_ANNUAL_SERVICE_PER * $this->currentReusableQuantity) + $annualOopRepairAll;

        return [
            'annual_oop_repair_all' => $annualOopRepairAll, // maps to C16
            'total_annual_maint_repair' => $totalAnnualMaintRepair, // maps to C17
        ];
    }

    /**
     * Validates inputs and throws and exception on failure.
     * @param int $totalProcedures
     * @param int $singleUseProcedures
     * @param int $bflexBroncoscopePrice
     * @param int $currentReusableQuantity
     * @throws Exception if input is invalid.
     */
    private function validateInputs(
        $totalProcedures, 
        $singleUseProcedures,
        $bflexBroncoscopePrice,
        $currentReusableQuantity
    ) {
        $errors = [];
        if (!is_int($totalProcedures)) {
            $errors[] = 'Total Procedures must be an integer.';
        }
        if ($totalProcedures < 1) {
            $errors[] = 'Total Procedures must be greater than 0.';
        }
        if (!is_int($totalProcedures)) {
            $errors[] = 'Single-Use Procedures must be an integer.';
        }
        if ($totalProcedures < 1) {
            $errors[] = 'Single-Use Procedures must be greater than 0.';
        }
        if (!is_int($bflexBroncoscopePrice)) {
            $errors[] = 'Bflex Bronchoscope Price must be an integer.';
        }
        if ($bflexBroncoscopePrice < 1) {
            $errors[] = 'Bflex Bronchoscope Price must be greater than 0.';
        }
        if (!is_int($currentReusableQuantity)) {
            $errors[] = 'Current Resusable Quantity must be an integer.';
        }
        if ($currentReusableQuantity < 1) {
            $errors[] = 'Current Resusable Quantity must be greater than 0.';
        }

        if (count($errors)) {
            throw new \Exception('An error occured while processing the form. ' . implode(' ', $errors));
        }
    }
}