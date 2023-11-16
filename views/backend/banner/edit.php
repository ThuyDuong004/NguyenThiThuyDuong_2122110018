<?php

use App\Models\banner;
use App\libraries\MyClass;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM banner wher status!=0 and id=1 order by created_at desc
$id = $_REQUEST['id'];
$banner = banner::find($id);
if ($banner == null) {
    header("location:index.php?option=banner");
}

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->

<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Cập nhật banner</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">

                    <button class="btn btn-sm btn-success" type="subumit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                    </button>
                    <a href="index.php?option=banner" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về banner
                    </a>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?= $banner->id; ?>" />
                                <label>Tên Banner (*)</label>
                                <input type="text" value="<?= $banner->name; ?>" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Liên kết</label>
                                <input type="text" name="link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?= ($banner->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                                    <option value="2" <?= ($banner->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Vị trí (*)</label>
                                <select name="position" class="form-control">
                                    <option value="">None</option>
                                    <option value="1">Tên danh mục</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sắp Xếp</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="1">None</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>