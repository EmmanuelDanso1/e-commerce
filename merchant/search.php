<?php
include_once "../db.php";
include_once "../generate_code.php";

$search_term = $_GET["search_term"];
$results = fetch_searchresults($conn, $search_term);
echo json_encode($results);
?>