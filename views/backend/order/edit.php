<?php

use App\Models\Order;
use App\Models\User;

$list_user = user::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();

$user_id_html = "";


// foreach ($list_user as $user) {
//    $user_id_html .= "<option value ='$user->id'>$user->name</option>";
// }


$id = $_REQUEST['id'];
$order =  order::find($id);

foreach ($list_user as $user) {
  if ($order->user_id == $user->id) {
    $user_id_html .= "<option value='$user->id' selected>$user->id</option>";
  } else {
    $user_id_html .= "<option value='$user->id'>$user->id</option>";
  }
}
$user_id_html .= "</select>";

if ($order == null) {
  header("location:index.php?option=order");
}


?>

<?php require_once '../views/backend/header.php'; ?>
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
  <div class="content-wrapper">
    <!-- Content Header (order header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <strong class="text-dark text-lg">CẬP NHẬT ĐƠN HÀNG</strong>
          </div>

        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col md-12 text-right">
              <button name="CAPNHAT" type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save"></i> Lưu[Cập nhật]
              </button>
              <a class="btn btn-sm btn-info" href="index.php?option=order">
                <i class="fas fa-arrow-left"></i> Về danh sách
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <input type="hidden" name="id" value="<?= $order->id; ?>">

            <div class="col-md-9">
              <div class="mb-3">
                <label>User_Id</label>
                <select name="user_id" class="form-control">
                  <option value="">User_Id</option>
                  <?= $user_id_html; ?>
                </select>
              </div>
              <div class="mb-3">
                <label>Deliveryaddress</label>
                <input type="text" id="Deliveryaddress" placeholder="Nhập deliveryaddress" name="deliveryaddress" value="<?= $order->deliveryaddress; ?>" class="form-control">
              </div>
              <div class="mb-3">
                <label>deliveryname</label>
                <textarea name="deliveryname" id="deliveryname" placeholder="Nhập deliveryname" class="form-control"><?= $order->deliveryname; ?> </textarea>
              </div>
              <div class="mb-3">
                <label>Deliveryphone</label>
                <textarea name="deliveryphone" id="deliveryphone" placeholder="Nhập deliveryphone" class="form-control"><?= $order->deliveryphone; ?> </textarea>
              </div>
            </div>

            <div class="col-md-3">
              <div class="mb-3">
                <label>Deliveryemail</label>
                <textarea name="deliveryemail" id="deliveryemail" placeholder="Nhập deliveryemail" class="form-control"><?= $order->deliveryemail; ?></textarea>
              </div>
              <div class="mb-3">
                <label>Note</label>
                <textarea name="note" id="note" placeholder="Nhập note" class="form-control"><?= $order->note; ?></textarea>
              </div>
              <div class="mb-3">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                  <option value="1" <?= ($order->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                  <option value="2" <?= ($order->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

</form>