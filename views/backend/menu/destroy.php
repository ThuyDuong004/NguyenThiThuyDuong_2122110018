<?php

use App\Models\Menu;
use App\Libaries\MyClass;
use App\Libraries\MyClass as LibrariesMyClass;

$id = $_REQUEST['id'];

$menu = Menu::find($id);

if ($menu == null) {
    LibrariesMyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header("location:index.php?option=menu&cat=trash");
}
$menu->delete();

LibrariesMyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thành công']);

header("location: index.php?option=menu&cat=trash");
