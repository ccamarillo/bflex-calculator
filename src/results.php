        <?php 
            $rows = [
                [
                    'type' => 'section',
                    'title' => 'Equipment Costs'
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
                    'title' => 'Repair / Maintenance'
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
                    'title' => 'Reprocessing'
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
            ]
        ?>

        <!-- RESULTS HEADER -->
        <div class="background white receipt-header sticky-top">
            <div class="container-md">
                <div class="row">
                    <div class="col-6">
                        <h2>Current Costs</h2>
                        <p>Using Re-Usable bronchoscopes only</p>
                    </div>
                    <div class="col-6">
                        <h2>With BFlex</h2>
                        <p>Combined with existing reusable bronchoscopy inventory</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-md results">

            <?php foreach ($rows as $row) { ?>
                
                <?php if ($row['type'] == 'section') { ?>
                    <!-- SECTION -->
                    <div class="row result-section">
                        <div class="col-6">
                            <h3><?php echo $row['title']; ?></h3>
                        </div>
                        <div class="col-6 with-bscope"></div>
                    </div>
                <?php } ?>

                <?php if ($row['type'] == 'result') { ?>
                    <!-- RESULT -->
                    <div class="row result <?php if ($row['title'] == 'Reprocessing costs') {?>reprocessing-costs<?php } ?>">
                        <!-- CURRENT -->
                        <div class="col-6 current">
                            <div class="row">
                                <div class="col-7">
                                    <p><?php echo $row['title']; ?></p>
                                </div>
                                <div class="col-5">
                                    <p class="value "><?php echo $row['value_current']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr />
                                </div>
                            </div>
                        </div>
                        <!-- WITH -->
                        <div class="col-6 ">
                            <div class="row">
                                <div class="col-7">
                                    <p><?php echo $row['title']; ?></p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_with']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($row['type'] == 'total') { ?>
                    <!-- TOTAL -->
                    <div class="row result">
                        <div class="col-6 current total">
                            <div class="row">
                                <div class="col-7">
                                    <p>Annual Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_current'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 with total">
                            <div class="row">
                                <div class="col-7">
                                    <p>Annual Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_with'] ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>

                <?php if ($row['type'] == 'reprocessing') { ?>
                    <?php $counter = 0; ?>
                    <?php foreach ($calculated['reprocessing_costs']['details'] as $label => $value) { ?>
                        <!-- RESULT -->
                        <div class="row result reprocessing">
                            <!-- CURRENT -->
                            <div class="col-6 current">
                                <div class="row">
                                    <div class="col-7">
                                        <p><?php echo $label; ?></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="value "><?php echo $value; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr <?php if ($counter == count($calculated['reprocessing_costs']['details']) - 1) { ?>class="show"<?php } ?> />
                                    </div>
                                </div>
                            </div>
                            <!-- WITH -->
                            <div class="col-6 ">
                                <div class="row">
                                    <div class="col-7">
                                        <p><?php echo $label ?></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="value "><?php echo $value; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <hr <?php if ($counter == count($calculated['reprocessing_costs']['details']) - 1) { ?>class="show"<?php } ?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $counter ++; ?>
                    <?php } ?>
                <?php } ?>

                <?php if ($row['type'] == 'grand-total') { ?>
                    <!-- TOTAL -->
                    <div class="row result">
                        <div class="col-6 current total grand">
                            <div class="row">
                                <div class="col-7">
                                    <p>Total Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_current'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 with total grand">
                            <div class="row">
                                <div class="col-7">
                                    <p>Total Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_with'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <!-- DOWNLOAD FOOTER -->
        <div class="background blue download-footer">
            <div class="container-md">
                <div class="row">
                    <div class="col-6">
                        <h2>Single-Use. Safer Investment. </h2>
                    </div>
                    <div class="col-6">
                    <a class="button" href="bflex-savings.php?<?php echo $query; ?>">Download custom brochure</a>
                    </div>
                </div>
            </div>
        </div>