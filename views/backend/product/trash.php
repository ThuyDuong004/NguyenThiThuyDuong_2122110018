<?php
use App\Models\product;
use App\Models\category;
use App\Models\Brand;


$list = Product::join('category', 'product.category_id', '=', 'category.id')
 ->join('brand', 'product.brand_id', '=', 'brand.id')
 ->where('product.status', '=', 0)
 ->orderBy('product.created_at', 'desc')
 ->select("product.*", "brand.name as brand_name", "category.name as category_name")
 ->get();

?>


<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1 class="d-inline">Thùng rác sản phẩm</h1>
                         <!-- <a href="index.php?option=product&cat=create" class="btn btn-sm btn-primary">Thêm sản phẩm</a>--> 
                     </div>
                  </div>
               </div>
            </section>
            <!-- Main content --> 
            <section class="content">
               <div class="card">
                  <div class="card-header"> 
                  <div class="row">
                     <div  div class="col-md-6">
                        <a href="index.php?option=product">Tất cả</a> |
                        <a href="index.php?option=product&cat=trash"> Thùng rác</a>
                     </div>            
                  <div class="col-md-6 text-right">
               <a href="index.php?option=product" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
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
                                       <a href="index.php?option=product&cat=restore&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i> Khôi Phục 
                                       </a>
                                       <a href="index.php?option=product&cat=destroy&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xóa VV
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
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>