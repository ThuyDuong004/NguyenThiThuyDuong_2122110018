<?php
use App\Models\Post;

$list = Post::where('status','=',0)->orderBy('created_at','DESC')->get();
?>
<?php require_once '../views/backend/header.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <strong class="text-dark text-lg">THÙNG RÁC TRANG ĐƠN</strong>
          </div>
       
      </div><!-- /.container-fluid -->
    </section>

    
<!-- Main content -->
      <section class="content">

<!-- Default box -->
  <div class="card">
  <div class="card-header ">
               <div class="row"> 
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-right">
                     <a class="btn btn-sm btn-info" href="index.php?option=page">
                        <i class="fas fa-arrow-left"></i> Về danh sách
                     </a>
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>

               <div class="row">
                  <div class="col-md-12">
                  <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th class="text-center" >Tiêu đề bài viết </th>
                                 <th class="text-center" >Chi tiết</th>
                                 <th class="text-center" style="width:170px">Chức năng</th>
                                 <th class="text-center" style="width:30px">ID</th>
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
                                 <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">                              </td>
                                 </td>
                                 <td class="text-center">
                                         <?= $item->title ; ?> 
                                 </td>
                                 <td class="text-center"><?= $item->detail?></td>
                                 <td class="text-center">
                                 <a href="index.php?option=page&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                                 <a href="index.php?option=page&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                                 </td>
                                 <td class="text-center" ><?= $item->id?></td>
                              </tr>
                              <?php endforeach;?>
                              <?php endif;?>
                           </tbody> 
                        </table>
                     </table>
                  </div>
               </div>
        <!-- /.card-body -->
        <div class="card-footer">
        
        <script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>