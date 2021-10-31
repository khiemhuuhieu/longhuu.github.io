<?php include 'inc/header.php';?>

<?php
include '../classes/category.php';
?>
<?php

$cat= new category();
if(isset($_GET['categoryId']) && $_GET['categoryId']==NULL)
{
  echo "<script>window.location='allCategory.php' </script>";
}
else
{
  $id=$_GET['categoryId'];
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $category_name=$_POST['category_name'];
  $category_slug=$_POST['category_slug'];
  $category_desc=$_POST['category_desc'];
  $updateCat=$cat->updateCategory($category_name, $category_slug, $category_desc, $id);
}
?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <?php
                                if(isset($updateCat))
                                {
                                  echo $updateCat;
                                }
                                ?>
                                <?php
                                $get_category=$cat->getcatebyId($id);
                                if($get_category)
                                {
                                  while($result=$get_category->fetch_assoc())
                                  {
                                   
                            ?>
                            <div class="position-center">
                                 <form role="form" method="POST" autocomplete="off" action="">
                                <div class="form-group">
                                    <label for="exampleInputCategory">Tên danh mục</label>
                                    <input type="text" class="form-control" name="category_name" id="slug" onkeyup="ChangeToSlug();" placeholder="Sửa danh mục" value="<?php echo $result['category_name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSlug">Slug</label>
                                    <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="category_slug" value="<?php echo $result['category_slug']?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDecs">Mô tả</label>
                                    <input type="text" class="form-control" id="exampleInputDecs" placeholder="Desc" name="category_desc" value="<?php echo $result['category_desc']?>">
                                </div>
                                <button type="submit" name="editcategory" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                               <?php
                                  }
                                }
                               ?>
                        </div>
                    </section>
            </div>        
</div>

<?php include 'inc/footer.php';?>