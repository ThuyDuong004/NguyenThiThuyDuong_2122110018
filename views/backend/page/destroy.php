<?php
use App\Models\Post;
use App\Libaries\MyClass;
use App\Libraries\MyClass as LibrariesMyClass;

$id = $_REQUEST['id'];
$post=Post:: find($id);

if($post == null){
    LibrariesMyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
            header('location: index.php?option=post');
}
$post->delete();
LibrariesMyClass::set_flash('message',['type'=>'success','msg'=>'Xóa thành công']);

header('location: index.php?option=post&cat=trash');

