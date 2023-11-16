<?php

use App\Models\Order;
use App\Libaries\MyClass;
use App\Libraries\MyClass as LibrariesMyClass;

$id = $_REQUEST['id'];
$order = Order::find($id);

if ($order == null) {
    LibrariesMyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header('location: index.php?option=order');
    
}

$order->status = 2;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = 1;

$order->save();

LibrariesMyClass::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công >']);

header('location: index.php?option=order');

