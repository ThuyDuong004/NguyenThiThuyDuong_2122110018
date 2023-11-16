<?php

use App\Models\product;

$id = $_REQUEST['id'];
$product =  product::find($id);
if($product==null){
    header("location:index.php?option=product&cat=trash");
}
//
$product->status =2;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$product->save();
header("location:index.php?option=product&cat=trash");