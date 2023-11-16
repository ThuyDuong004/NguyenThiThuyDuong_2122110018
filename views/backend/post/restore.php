<?php

use App\Models\post;

$id = $_REQUEST['id'];
$post =  post::find($id);
if($post==null){
    header("location:index.php?option=post&cat=trash");
}
//
$post->status =2;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$post->save();
header("location:index.php?option=post&cat=trash");