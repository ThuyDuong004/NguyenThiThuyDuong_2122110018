<?php

use App\Models\post;

$id = $_REQUEST['id'];
$post = post::find($id);
if($post==null){
    header("location:index.php?option=post&cat=trash");
}
$post->delete();// xóa vv
header("location:index.php?option=post&cat=trash");