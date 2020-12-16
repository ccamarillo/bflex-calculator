<?php

require __DIR__ . '/vendor/autoload.php';

header('Content-Type: application/pdf');

use \CloudConvert\CloudConvert;
use \CloudConvert\Models\Job;
use \CloudConvert\Models\Task;

$cloudconvert = new CloudConvert([
    // FIXME REPLACE WITH PRODUCTION ENV VAR
    'api_key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTAxOThlNWRjODVkYWNhNDU4YThhNDhjZWFkNDc5NTllNjRkNTViNmNlMzk2ZjFlZmFjZWVkZjE0NGVkYzg2MzJhOGU3MGEzNTAxNWFjNWEiLCJpYXQiOiIxNjA3OTY5ODk4LjA3ODU2MCIsIm5iZiI6IjE2MDc5Njk4OTguMDc4NTYzIiwiZXhwIjoiNDc2MzY0MzQ5OC4wMzA5OTAiLCJzdWIiOiI0NzU5NTcyNSIsInNjb3BlcyI6WyJ0YXNrLndyaXRlIiwidGFzay5yZWFkIl19.HmEWMxShHnW0k4bOyChJDKFpo_WGBowgPV6bVne_DHMFFBaEgxx73DIZYc7im3uzajgZI8vn8z1Lsh7V5ZqWlIW28lkJI1TsSKLR1DP-kTQBpO_xvEiD1e8msHOYCV9bUp6kNk-r5Wp3i4j_Z2LsuXfUSLXBxm3ItNAJTra9VRcX0FwSe-DLAyA0YGO1SjTh3eakh6-uaisWmqNATavAgjfDW-YQFzcwkiSztSWHO-5RtvsjCDRXNQVtGAvS75aiNSURXaWEigmb8urGdk3NKFWCpsOzmNyneLZhNboPtb6sRIjPLDiicWWol4KfrYfIsJF7BSnkuYHDanbtX2koeCXClGOxGqfNqkZ_HlKPD9ssTNY-uZahMy1qJvBfR7h5BZeFje_azTixrHqHsuBhIUCbQIjC5B54z1hduCHZ7539RHP9xPVHMuD1cCOHxChZTYoLn4bcfef68npKSmOX3jKbdIrviAuUZec6NT9OsFqYdNxfGMduvGJMjEYatcRLlT4KguMkmBLk0r60szWRCy-7sTMhpqgi3hM7xlUDlVSOB8tRj-TGRbbmt6et1kh_AYGl4GGKcKpuYCGDa6lfA8tt5-kTzsueIuBCDbFvKZ-5aRLzSBfQsQ3xnUxd-Gqj0W3LEcoDdp4zoceO1UC15vjseWo8lEXSNaryciX3E6U',
    'sandbox' => false
]);

$query = http_build_query($_GET);

$job = (new Job())
    ->setTag('bflex-calculator-results')
    ->addTask(
        (new Task('capture-website', 'import-html'))
            ->set('url', 'http://cmd-dev.frb.io/bflex-calculator/src/pdf-pg-2.php?' . $query)
            ->set('filename', 'pdf.pdf')
            ->set('output_format', 'pdf')
            ->set('engine', 'wkhtml')
            ->set('page_width', 21.59)
            ->set('page_height', 27.94)
            ->set('margin_top', 0)
            ->set('margin_right', 0)
            ->set('margin_bottom', 0)
            ->set('margin_left', 0)
    )
    ->addTask(
        (new Task('export/url', 'export-pdf'))
            ->set('input', 'import-html')
    );

$cloudconvert->jobs()->create($job);
$cloudconvert->jobs()->wait($job); // Wait for job completion



foreach ($job->getExportUrls() as $file) {
    // $source = $cloudconvert->getHttpTransport()->download($file->url)->detach();
    $source = $cloudconvert->getHttpTransport()->download($file->url);
    // var_dump($source);
    echo $source;
    // $dest = fopen('output/' . $file->filename, 'w');
    // stream_copy_to_stream($source, $dest);
}






?>