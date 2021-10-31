<?php include 'inc/header.php';?>
<?php include '../classes/category.php';?>

<?php
$category = new category();
if(isset($_GET['delid']))
{
   $id=$_GET['delid'];
   $delCat=$category->del_category($id); 

}

?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    Quản lý danh mục
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12 text-left">
        <button type="submit" class="btn btn-primary">
        <a href="addCategory.php" style="font-size: 18px;font-weight: bold;color: white">Thêm danh mục</a>
      </button>
                      
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         <?php
            $show_category = $category->show_category();
            if($show_category){
              $i=0;
              while($result=$show_category->fetch_assoc()){
                $i++;
            
            ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $result['category_name'] ?></td>
            <td><?php echo $result['category_desc'] ?></td>
           <td>
              <a href="editCategory.php?categoryId=<?php echo $result['category_id']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a onclick="return confirm('Bạn có chắc muốn xóa hay không?')" href="?delid=<?php echo $result['category_id']?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
            <?php
             }
             }
            ?>
      </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
         <!--  <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> -->
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
  
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
<?php include 'inc/footer.php';?>

