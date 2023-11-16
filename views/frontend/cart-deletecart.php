<?php

use App\Libraries\cart;

//
$id=$_REQUEST['deletecart'];
cart::deletecart($id);
header("location:index.php?option=cart");