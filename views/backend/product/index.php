<?php
use App\Models\Product;
use App\Models\category;
use App\Models\Brand;


$list = Product::join('category', 'product.category_id', '=', 'category.id')
 ->join('brand', 'product.brand_id', '=', 'brand.id')
 ->where('product.status', '!=', 0)
 ->orderBy('product.created_at', 'desc')
 ->select("product.*", "brand.name as brand_name", "category.name as category_name")
 ->get();

?>


<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả sản phẩm</h1>
                        <a href="index.php?option=product&cat=create" class="btn btn-sm btn-primary">Thêm sản phẩm</a>
                     </div>
                  </div>
               </div>
            </section>
            <!-- Main content --> 
            <section class="content">
               <div class="card">
                  <div class="card-header">             
                        <select name="" id="" class="form-control d-inline" style="width:100px;">
                        <option value="">Xoá</option>
                        </select>
                        <button class="btn btn-sm btn-success" type ="submit" name ="THEM">Áp dụng</button>
                     <div class="row">
                     <div  div class="col-md-6">
                        <a href="index.php?option=product">Tất cả</a> |
                        <a href="index.php?option=product&cat=trash"> Thùng rác</a>
                     </div>
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered" id="mytable">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th class="text-center" style="width:130px;">Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Tên danh mục</th>
                              <th>Tên thương hiệu</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php if(count($list) > 0) : ?>
                              <?php foreach($list as $item   ):?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                              <img class="img-fluid" src="../public/images/product/<?=$item->image;?>" alt="<?=$item->image;?>">
                              </td>
                              <td>
                                 <div class="name">
                                 <?= $item->name ; ?> 
                                    
                                 </div>
                                 <div class="function_style">
                                 <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=product&cat=status&id=<?=$item->id; ?>" class="btn 
                                       btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i> Hiện
                                       </a>
                                       <?php else : ?>
                                       <a href="index.php?option=product&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i> Ẩn
                                       </a>
                                       <?php endif; ?>
                                       <a href="index.php?option=product&cat=edit&id=<?=$item->id; ?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa
                                       <a href="index.php?option=product&cat=show&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết
                                       </a>
                                       <a href="index.php?option=product&cat=delete&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá
                                       </a>
                                 </div>
                              </td>
                           
                              <td><?= $item->category_name ; ?> </td>
                              <td><?= $item->brand_name ; ?> </td>
                           </tr>
                           <?php endforeach;?>
                              <?php endif;?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </section>
         </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>