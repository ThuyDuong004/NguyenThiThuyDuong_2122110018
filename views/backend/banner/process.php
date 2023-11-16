<?php


use App\Models\Banner;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $banner = new Banner();
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link'];
    $banner->position = $_POST['position'];
    //$data['sort_order'] = $_POST['sort_order'];
    $banner->sort_order = $_POST['sort_order'];
    $banner->status = $_POST['status'];
    // Thêm hình
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/banner/";
        $target_FILES = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_FILES, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $banner->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $banner->image = $filename;
        }
    }

    $banner->created_at = date('Y-m-d h:i:s');
    $banner->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($banner);

    $banner->save();

    header("location:index.php?option=banner");
}
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $banner =  banner::find($id);
    if ($banner == null) {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi trang 404']);
        header("location:index.php?option=banner");
    }
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link'];
    $banner->position = $_POST['position'];

    $banner->status = $_POST['status'];
    $banner->sort_order = $_POST['sort_order'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/banner/";
        $target_FILES = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_FILES, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $banner->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $banner->image = $filename;
        }
    }
    $banner->updated_at = date('Y-m-d h:i:s');
    $banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($banner);

    $banner->save();

    header("location:index.php?option=banner");
}
