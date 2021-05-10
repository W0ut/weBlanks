<?php
$postData = $_POST;
echo json_encode($postData);

if ( $postData['loadFile'] == 1 ) { echo json_encode($_FILES); }

?>