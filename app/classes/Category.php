<?php

require_once("./conectorDB.php");
require_once("./Filters.php");
$category = $_POST['id_category'];
//$category = 1;

$filtro = new Filters;
$result = $filtro->get_by_content($category);


$data['title_category'] = $result[0]['title'];
$data['lat'] = $result[0]['position_lat'];
$data['lng'] = $result[0]['position_lng'];
$data['subcategory'] = $result[0]['coll_categories_subcategory'];
echo json_encode($data);

?>