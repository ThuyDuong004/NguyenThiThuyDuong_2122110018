<?php

use App\Models\product;

$id = $_REQUEST['id'];
$product = product::find($id);
if($product==null){
    header("location:index.php?option=product&cat=trash");
}
$product->delete();// xóa vv
header("location:index.php?option=product&cat=trash");