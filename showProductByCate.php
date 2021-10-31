 <?php
 include 'inc/headertop.php';
 include'inc/headerhidden.php';
 ?>
 <?php
if(!isset($_GET['categoryId']) || $_GET['categoryId']==NULL)
{
  echo "<script>window.location='404.php' </script>";
}
else
{
  $id=$_GET['categoryId'];
}
?>
 <link rel="stylesheet" href="css/product-item.css">
 <!-- breadcrumb  -->
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <?php
                    $title_category=$product->getTitleCategory($id);
                        if($title_category){
                        while ($result=$title_category->fetch_assoc()) {
                            
                        ?>
                <li class="breadcrumb-item active"><a href="#"><?php echo $result['category_name'] ?></a></li>
              <?php
          }
      }
              ?>
            </ol>
        </div>
    </section>
    <!-- khối sản phẩm  -->
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <!-- header của khối sản phẩm : tag(tác giả), bộ lọc và sắp xếp  -->
                <div class="header-khoi-sp d-flex">
                    <div class="tag">
                        <label>Tác giả nổi bật:</label>
                        <a href="#">Tất cả</a>
                        <a href="#" data-tacgia=".MarieForleo">Marie Forleo</a>
                        <a href="#" data-tacgia=".DeanGraziosi">Dean Graziosi</a>
                        <a href="#" data-tacgia=".DavikClark">Davik Clark</a>
                        <a href="#" data-tacgia=".TSLêThẩmDương">TS Lê Thẩm Dương</a>
                        <a href="#" data-tacgia=".SimonSinek">Simon Sinek</a>
                    </div>
                    <div class="sort d-flex ml-auto">
                        <div class="hien-thi">
                            <label for="hienthi-select" class="label-select">Hiển thị</label>
                            <select class="hienthi-select">
                                <option value="30">30</option>
                                <option value="60">60</option>
                            </select>
                        </div>
                        <div class="sap-xep">
                            <label for="sapxep-select" class="label-select">Sắp xếp</label>
                            <select class="sapxep-select">
                                <option value="moinhat">Mới nhất</option>
                                <option value="thap-cao">Giá: Thấp - Cao</option>
                                <option value="cao-thap">Giá: Cao - Thấp</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- các sản phẩm  -->
                <div class="items">
                    <div class="row">
                           <?php
                            $show_product_by_category=$product->getProductbyCategory($id);
                                if($show_product_by_category){
                                while ($result=$show_product_by_category->fetch_assoc()) {
                                    
                                ?>
                            <div class="col-lg-3 col-md-4 col-xs-6 item DeanGraziosi">
                                <div class="card ">
                                    <a href="#" class="motsanpham"
                                        style="text-decoration: none; color: black;" data-toggle="tooltip"
                                        data-placement="bottom" title="">
                                        <img class="card-img-top anh" src="admin/upload/<?php echo $result['image']?>"
                                            alt="<?php echo $result['productSlug'] ?>">
                                        <div class="card-body noidungsp mt-3">
                                            <h6 class="card-title ten"><?php echo $result['productName'] ?></h6>
                                            <div class="gia d-flex align-items-baseline">
                                                <div class="giamoi"><?php echo $fm->format_currency($result['productPrice'])."VNĐ";?></div>
                                            </div>
                                            <div class="danhgia">
                                                <ul class="d-flex" style="list-style: none;">
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <span class="text-muted">0 nhận xét</span>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                            ?>
                    </div>
                </div>

                <!-- pagination bar -->
                <div class="pagination-bar my-3">
                    <div class="row">
                        <div class="col-12">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <!-- <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li> -->
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&rsaquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!--het khoi san pham-->
            </div>
            <!--het div noidung-->
        </div>
        <!--het container-->
    </section>
    <!--het _1khoi-->