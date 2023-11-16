<?php

use App\Models\Menu;
use App\Libaries\MyClass;
use App\Libraries\MyClass as LibrariesMyClass;

$id = $_REQUEST['id'];
$menu = Menu::find($id);
if ($menu == null) {
    LibrariesMyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header("location:index.php?option=menu");
}
$menu->status = ($menu->status == 1) ? 2 : 1;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = $_SESSION['user_id'] ?? 1;
$menu->save();
LibrariesMyClass::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
header("location:index.php?option=menu");
