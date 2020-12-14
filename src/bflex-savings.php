<?php

require __DIR__ . '/vendor/autoload.php';

header('Content-Type: application/pdf');

use \CloudConvert\CloudConvert;
use \CloudConvert\Models\Job;
use \CloudConvert\Models\Task;

$cloudconvert = new CloudConvert([
    'api_key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTAxOThlNWRjODVkYWNhNDU4YThhNDhjZWFkNDc5NTllNjRkNTViNmNlMzk2ZjFlZmFjZWVkZjE0NGVkYzg2MzJhOGU3MGEzNTAxNWFjNWEiLCJpYXQiOiIxNjA3OTY5ODk4LjA3ODU2MCIsIm5iZiI6IjE2MDc5Njk4OTguMDc4NTYzIiwiZXhwIjoiNDc2MzY0MzQ5OC4wMzA5OTAiLCJzdWIiOiI0NzU5NTcyNSIsInNjb3BlcyI6WyJ0YXNrLndyaXRlIiwidGFzay5yZWFkIl19.HmEWMxShHnW0k4bOyChJDKFpo_WGBowgPV6bVne_DHMFFBaEgxx73DIZYc7im3uzajgZI8vn8z1Lsh7V5ZqWlIW28lkJI1TsSKLR1DP-kTQBpO_xvEiD1e8msHOYCV9bUp6kNk-r5Wp3i4j_Z2LsuXfUSLXBxm3ItNAJTra9VRcX0FwSe-DLAyA0YGO1SjTh3eakh6-uaisWmqNATavAgjfDW-YQFzcwkiSztSWHO-5RtvsjCDRXNQVtGAvS75aiNSURXaWEigmb8urGdk3NKFWCpsOzmNyneLZhNboPtb6sRIjPLDiicWWol4KfrYfIsJF7BSnkuYHDanbtX2koeCXClGOxGqfNqkZ_HlKPD9ssTNY-uZahMy1qJvBfR7h5BZeFje_azTixrHqHsuBhIUCbQIjC5B54z1hduCHZ7539RHP9xPVHMuD1cCOHxChZTYoLn4bcfef68npKSmOX3jKbdIrviAuUZec6NT9OsFqYdNxfGMduvGJMjEYatcRLlT4KguMkmBLk0r60szWRCy-7sTMhpqgi3hM7xlUDlVSOB8tRj-TGRbbmt6et1kh_AYGl4GGKcKpuYCGDa6lfA8tt5-kTzsueIuBCDbFvKZ-5aRLzSBfQsQ3xnUxd-Gqj0W3LEcoDdp4zoceO1UC15vjseWo8lEXSNaryciX3E6U',
    'sandbox' => false
]);

// use mikehaertl\wkhtmlto\Pdf;

$query = http_build_query($_GET);

// $pdf = new Pdf();
// $pdf->addPage('http://localhost/pdf.php?' . $query);

// if (!$pdf->send()) {
//     throw new \Exception($pdf->getError());
// }

?>
<?php
    $pdf = <<<DOC
<!doctype html>
<html lang="en">
    <head>
        <title>The Hidden ROI of Single-Use Bronchoscopes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet" />
    </head>
    <body>
DOC;

    ob_start();
    require_once('results.php');
    $pdf .= ob_get_clean();


    $pdf .= <<<DOC
        <!-- BOOTSTRAP -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
DOC;

$job = (new Job())
    ->setTag('bflex-calculator-results')
    ->addTask(
        (new Task('capture-website', 'import-html'))
            ->set('url', 'http://cmd-dev.frb.io/bflex-calculator/src/pdf.php?' . $query)
            ->set('filename', 'pdf.pdf')
            ->set('output_format', 'pdf')
    )
    ->addTask(
        (new Task('export/url', 'export-pdf'))
            ->set('input', 'import-html')
    );

$cloudconvert->jobs()->create($job);
$cloudconvert->jobs()->wait($job); // Wait for job completion

// if ($job->getStatus() != 'finished') {
//     // if 
//     echo '<pre>';
//     echo var_dump($job->getTasks());
//     echo '</pre>';
// }

foreach ($job->getExportUrls() as $file) {
    // $source = $cloudconvert->getHttpTransport()->download($file->url)->detach();
    $source = $cloudconvert->getHttpTransport()->download($file->url);
    // var_dump($source);
    echo $source;
    // $dest = fopen('output/' . $file->filename, 'w');
    // stream_copy_to_stream($source, $dest);
}






?>