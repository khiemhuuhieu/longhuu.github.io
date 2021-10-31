<?php
   include_once 'lib/database.php';
   include_once 'lib/session.php';
   include_once 'helper/format.php';
   session::init();
   ob_start();
?>
<?php
spl_autoload_register(function($class){
    require_once "classes/".$class.".php";
});
$db=new Database();
$fm=new Format();
$product=new product();
$user=new user();
$cate=new category();
$cart=new cart();
$customer=new customer();
?> 
 <?php
      if(isset($_GET['customer_id'])){
        $customerid=session::get('customer_id');
        $delCart=$cart->del_all_cart();
        // $delCompare=$cart->dell_all_compare($customerid);
        session::destroy();
      }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>LongHuu</title>
    <meta name="description"
        content="Mua sách online hay, giá tốt nhất, combo sách hot bán chạy, giảm giá cực khủng cùng với những ưu đãi như miễn phí giao hàng, quà tặng miễn phí, đổi trả nhanh chóng. Đa dạng sản phẩm, đáp ứng mọi nhu cầu.">
    <meta name="keywords" content="nhà sách online, mua sách hay, sách hot, sách bán chạy, sách giảm giá nhiều">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo BASE_URL?>/css/home.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
</head>

<body>
    <!-- code cho nut like share facebook  -->
    <!-- header -->
    <nav class="navbar navbar-expand-md bg-white navbar-light">
        <div class="container">
            <!-- logo  -->
            <a class="navbar-brand" href="index.php=" style="color: #CF111A;"><b>LongHuu</b>.com</a>

            <!-- navbar-toggler  -->
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- form tìm kiếm  -->
                <form class="form-inline ml-auto my-2 my-lg-0 mr-3" action="search.php" method="POST">
                    <div class="input-group" style="width: 520px;">
                        <input type="text" class="form-control" aria-label="Small" name="tukhoa" placeholder="Nhập sách cần tìm kiếm...">
                        <div class="input-group-append">
                            <button type="submit" name="search_product" class="btn" style="background-color: #CF111A; color: white;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
                <ul class="navbar-nav mb-1 ml-auto">
                    <div class="dropdown">
                        <li class="nav-item account" type="button" class="btn">
                              <?php
                                  $login_check=session::get('customer_login');
                                  if($login_check==true){
                                    echo '<a href="profile.php" class="btn btn-secondary rounded-circle"><i class="fa fa-user"></i></a>';
                                  }
                                  else{
                                    echo '<a href="#" class="btn btn-secondary rounded-circle"><i class="fa fa-user"></i></a>';
                                  }
                              ?> 
                                <?php
                                    $login_check=session::get('customer_login');
                                    if($login_check==false)
                                    {
                                            echo '<a class="nav-link text-dark text-uppercase" href="login.php" style="display:inline-block">Tài khoản</a>';
                                    }
                                    else
                                    {
                                        echo '<a class="nav-link text-dark text-uppercase" href="?customer_id='.session::get('customer_id').'" style="display:inline-block">Đăng xuất</a>';
                                    }
                                ?>
                        </li>
                    </div>
                    <li class="nav-item">
                        <a href="cart.php" class="btn btn-secondary rounded-circle">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="cart-amount">
                               <?php
                                    $check_cart=$cart->check_session_cart();
                                    if($check_cart){
                                    $qty=session::get("qty");
                                    echo $qty;
                                }
                                else
                                {
                                    echo "0";
                                }
                                ?>
                            </div>
                        </a>
                        <a class="nav-link text-dark text-uppercase" href="cart.php"
                            style="display:inline-block">Giỏ
                            Hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
