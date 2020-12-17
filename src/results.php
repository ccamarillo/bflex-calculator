        <?php  require_once('./includes/calculator-results-language.php'); // brings in $rows ?>

        <!-- RESULTS HEADER -->
        <div class="background white receipt-header sticky-top">
            <div class="container-md">
                <div class="row">
                    <div class="col-6">
                        <h2>Current operating costs</h2>
                        <p>Using reusable bronchoscopes only</p>
                    </div>
                    <div class="col-6">
                        <h2 class="cyan">With BFlex</h2>
                        <p>Combined with existing reusable bronchoscope inventory</p>
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
                                    <p>Annual cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_current'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 with total">
                            <div class="row">
                                <div class="col-7">
                                    <p>Annual cost</p>
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
                                        <p><?php echo getReprocessingTextFromName($label); ?></p>
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
                                        <p><?php echo getReprocessingTextFromName($label) ?></p>
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
                                    <p>Estimated Cost</p>
                                </div>
                                <div class="col-5">
                                    <p class="value"><?php echo $row['value_current'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 with total grand">
                            <div class="row">
                                <div class="col-7">
                                    <p>Estimated Cost</p>
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
                        <h2>Single-Use. Safer Investment.</h2>
                    </div>
                    <div class="col-6">
                    <a class="button" href="bflex-savings.php?<?php echo $query; ?>" target="new">Download Results</a>
                    </div>
                </div>
            </div>
        </div>