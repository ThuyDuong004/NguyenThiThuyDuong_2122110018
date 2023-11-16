<?php
use App\Models\Order;
use App\Libaries\MyClass;
use App\Libraries\MyClass as LibrariesMyClass;

$id = $_REQUEST['id'];
$order=Order:: find($id);

if($order == null){
    LibrariesMyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
            header('location: index.php?option=order');
}
$order->delete();
LibrariesMyClass::set_flash('message',['type'=>'success','msg'=>'Xóa khỏi CSDL thành công']);

header('location: index.php?option=order&cat=trash');

