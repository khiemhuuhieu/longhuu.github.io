<?php 
	include 'inc/headertop.php';
	include 'inc/headerhidden.php'
?>

 <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $tukhoa = $_POST['tukhoa'];
                        $search_product = $product->search_product($tukhoa);
                        
                    }
                ?>
                <div class="items">
                     <h3>Từ khóa tìm kiếm : <?php echo $tukhoa ?></h3>
                    <div class="row">
                          <?php
                             if($search_product){
                                while($result = $search_product->fetch_assoc()){
                            ?>
                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <!-- 1 sản phẩm  -->
                            <div class="card">
                                <a href="#" class="motsanpham"
                                    style="text-decoration: none; color: black;" data-toggle="tooltip"
                                    data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                                    <img class="card-img-top anh" src="admin/upload/<?php echo $result['image'] ?>" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                                    <div class="card-body noidungsp mt-3">
                                        <h6 class="card-title ten"><?php echo $result['productName'] ?></h6>
                                        <small class="tacgia text-muted"><?php echo $result['productName'] ?></small>
                                        <div class="gia d-flex align-items-baseline">
                                            <div class="giamoi"><?php echo $fm->format_currency($result['productPrice'])." "."VNĐ" ?></div>
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

                                }else{
                                    echo 'Đang cập nhật';
                                }
                            ?>
                    </div>
                </div>
                <!-- pagination bar  -->
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
<?php 
	include 'inc/footer.php';
?>
