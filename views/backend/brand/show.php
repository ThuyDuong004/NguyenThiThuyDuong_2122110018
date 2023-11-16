<?php
use App\Models\Brand;
use App\Libraries\MyClass;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc
$id=$_REQUEST['id'];
$brand =  Brand::find($id);
if($brand==null){
   MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'denger']);
    header("location:index.php?option=brand");
}
//
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thương hiệu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->=
         <section class="content">
            <div class="card">
               <div class="card-header">

                 <div class="row">
                 <!--<div class="col-md-6">
                  <a href="index.php?option=brand">Tất cả</a> |
                  <a href="index.php?option=brand&cat=trash"> Thùng rác</a>
                 </div>-->
                  <div class="col-md-12 text-right">
                  <a href="index.php?option=brand" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về thương hiệu
                  </a>
               </div>
                 </div>

               </div>
               <div class="card-body">
                  <div class="row">
                     <!--<div class="col-md-4">
                        <div class="mb-3">
                           <label>Tên thương hiệu (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mô tả</label>
                          <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>-->
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>ID</td>
                                 <td><?= $brand->id;?></td>
                              </tr>
                              <tr>
                                 <td>name</td>
                                 <td><?= $brand->name;?></td>
                              </tr>
                              <tr>
                                 <td>slug</td>
                                 <td><?= $brand->slug;?></td>
                              </tr>
                              <tr>
                                 <td>image</td>
                                 <td><img class="img-fluid" src="../public/images/brand/<?=$brand->image;?>" 
                                 alt="<?=$brand->image;?>"></td>
                              </tr>
                              <tr>
                                 <td>sort_order</td>
                                 <td><?= $brand->sort_order;?></td>
                              </tr>
                              <tr>
                                 <td>description</td>
                                 <td><?= $brand->description;?></td>
                              </tr>
                              <tr>
                                 <td>created_at</td>
                                 <td><?= $brand->created_at;?></td>
                              </tr>
                              <tr>
                                 <td>created_by</td>
                                 <td><?= $brand->created_by;?></td>
                              </tr>
                              <tr>
                                 <td>updated_at</td>
                                 <td><?= $brand->updated_at;?></td>
                              </tr>
                              <tr>
                                 <td>updated_by</td>
                                 <td><?= $brand->updated_by;?></td>
                              </tr>
                              <tr>
                                 <td>status</td>
                                 <td><?= $brand->status;?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>