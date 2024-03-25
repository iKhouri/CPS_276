<?php
require_once 'listFilesProc.php';

$files = getListOfFiles();

if ($files) {
    foreach ($files as $file) {
        echo '<a href="' . $file['file_path'] . '" target="_blank">' . $file['file_name'] . '</a><br>';
    }
} else {
    echo "No files uploaded yet.";
}
?>
<li><a target='_blank' href='files/newsletterorform1.pdf'>test 1</a></li>