<?php
header('Content-Type: application/pdf');
header("Content-disposition: inline; filename=bfex-savings.pdf");
echo $_POST['blob'];