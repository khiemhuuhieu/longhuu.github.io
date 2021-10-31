
<?php
  $filepath=realpath(dirname(__FILE__));
  require_once ($filepath.'/../lib/database.php');
  require_once ($filepath.'/../helper/format.php');
?>
<?php
/**
 * 
 */
class product
{ 
     private $db;
     private $fm;	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function search_product($tukhoa){
		$tukhoa=$this->fm->validation($tukhoa);
		$query="SELECT * FROM tbl_products where productName like '%$tukhoa%'";
		$result=$this->db->select($query);
		return $result;
	}
	public function insert_product($data,$files)
	{
		$productName= mysqli_real_escape_string($this->db->link,$data['productName']);
		$productSlug= mysqli_real_escape_string($this->db->link,$data['productSlug']);
		$productPrice= mysqli_real_escape_string($this->db->link,$data['productPrice']);
		$productQuantity=mysqli_real_escape_string($this->db->link,$data['productQuantity']);
		$productDesc= mysqli_real_escape_string($this->db->link,$data['productDesc']);
		$category_id= mysqli_real_escape_string($this->db->link,$data['category_id']);
		$orderbydisplay= mysqli_real_escape_string($this->db->link,$data['orderbydisplay']);

		$primited = array('jpg','png','gif' );
		
		$file_name=$_FILES['image']['name'];
		$file_size=$_FILES['image']['size'];
		$file_tmp=$_FILES['image']['tmp_name'];
		$div=explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image="upload/".$unique_image;

	  if($productName=="" || $productSlug=="" || $productPrice=="" || $productQuantity=="" || $productDesc=="" || $category_id=="" || $orderbydisplay=="" || $file_name=="")
	  {
	  $alert="<span class='error'>Bạn phải điền đầy đủ thông tin</span>";
	  return $alert;
	  }
	  else
	  {
	  	move_uploaded_file($file_tmp,$upload_image);

	  	$query="INSERT INTO tbl_products(productName,productSlug,image,productPrice,productQuantity,productDesc,category_id,orderbydisplay) values('$productName','$productSlug','$unique_image','$productPrice','$productQuantity','$productDesc','$category_id','$orderbydisplay')";

	  	$result=$this->db->insert($query);
	  	if($result)
	  	{
	  		$alert = "<span class='success'>Thêm sản phẩm thành công</span>";
	  		return $alert;
	  	}
	  	else
	  	{
	  	  $alert="<span class='error'>Thêm sản phẩm thất bại</span>";
	  	  return $alert;
	  	}
	  
	  }

	}
	 public function show_product() 
	{
		$query="SELECT tbl_products.* ,tbl_category.category_name

		from tbl_products 
		inner join tbl_category 
		on tbl_products.category_id = tbl_category.category_id 
		 order by tbl_products.productId desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function getproductbyId($id)
	{
		$query="SELECT * from tbl_products  where productId= '$id' order by productId desc";
		$result=$this->db->select($query);
		return $result;

	}
	public function updateProduct($data,$files,$id)
	{
		$productName= mysqli_real_escape_string($this->db->link,$data['productName']);
		$productSlug= mysqli_real_escape_string($this->db->link,$data['productSlug']);
		$productPrice= mysqli_real_escape_string($this->db->link,$data['productPrice']);
		$productQuantity=mysqli_real_escape_string($this->db->link,$data['productQuantity']);
		$productDesc= mysqli_real_escape_string($this->db->link,$data['productDesc']);
		$category_id= mysqli_real_escape_string($this->db->link,$data['category_id']);
		$orderbydisplay= mysqli_real_escape_string($this->db->link,$data['orderbydisplay']);

		$primited = array('jpg','png','gif' );
		
		$file_name=$_FILES['image']['name'];
		$file_size=$_FILES['image']['size'];
		$file_tmp=$_FILES['image']['tmp_name'];
		$div=explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image="upload/".$unique_image;

	  if($productName=="" || $productSlug=="" || $productPrice=="" || $productQuantity=="" || $productDesc=="" || $category_id=="" || $orderbydisplay=="" )
	  {
	  $alert="Không được để trống";
	  return $alert;
	  }
	  else
	  {
	  	if(!empty($file_name))
	  	{
	  		if($file_size>204800)
	  		{
	  			$alert= "<span class='error'>file không dưới 20MB</span>";
	  			return $alert;
	  		}
	  		elseif(in_array($file_ext,$primited)==false)
	  		{
	  			$alert= "<span class='error'>bạn có thể uploaf fle".implode(',',$primited)."</span>";
	  			return $alert;
	  		}
	  		move_uploaded_file($file_tmp,$upload_image);
	  		$query="
	  		UPDATE tbl_products set 
	  		productName='$productName',
	  		productSlug='$productSlug',
	  		image='$unique_image',
	  		productPrice='$productPrice',
	  		productQuantity='$productQuantity',
	  		productDesc='$productDesc',
	  		category_id='$category_id',
	  		orderbydisplay='$orderbydisplay',
	  		where productId='$id'";
	  	    $result=$this->db->update($query);
	  	}
	  	else
	  		//người dùng không chon ảnh
	  	{
	  		$query="
	  		UPDATE tbl_products set 
	  		productName='$productName',
	  		productSlug='$productSlug',
	  		productPrice='$productPrice',
	  		productQuantity='$productQuantity',
	  		productDesc='$productDesc',
	  		category_id='$category_id',
	  		orderbydisplay='$orderbydisplay'
	  		where productId='$id'";
	  	    $result=$this->db->update($query);
	  	}
	  	if($result)
	  	{
	  		$alert = "<span class='success'>Cập nhật thành công</span>";
	  		return $alert;
	  	}
	  	else
	  	{
	  	  $alert="<span class='error'>Cập nhật thất bại</span>";
	  	  return $alert;
	  	}
	  
	  }
	}
	public function del_product($id)
	{
		$query="DELETE from tbl_products where productId='$id'";
		$result=$this->db->delete($query);
		if($result)
		{
			$alert = "<span class='success'>Xóa thành công</span>";
	  		return $alert;
		}
		else
		{
			$alert = "<span class='success'>Xóa thất bại</span>";
			return $alert;

		}
	}
	public function insert_Slider($data,$files)
	{
		$sliderName= mysqli_real_escape_string($this->db->link,$data['sliderName']);
		$status      = mysqli_real_escape_string($this->db->link,$data['staus']);

		$primited = array('jpg','png','gif' );
		
		$file_name=$_FILES['image']['name'];
		$file_size=$_FILES['image']['size'];
		$file_tmp=$_FILES['image']['tmp_name'];
		$div=explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image="upload/".$unique_image;

	  if($sliderName=="" || $file_name=="" || $status=="")
	  {
	  $alert="<span class='error'>Bạn phải điền đầy đủ thông tin</span>";
	  return $alert;
	  }
	  else
	  {
	  	move_uploaded_file($file_tmp,$upload_image);

	  	$query="INSERT INTO tbl_slider(sliderName,image,status) values('$sliderName','$unique_image','$status')";

	  	$result=$this->db->insert($query);
	  	if($result)
	  	{
	  		$alert = "<span class='success'>Thêm slider thành công</span>";
	  		return $alert;
	  	}
	  	else
	  	{
	  	  $alert="<span class='error'>Thêm slider thất bại</span>";
	  	  return $alert;
	  	}
	  
	  }
	}
	public function show_slider_admin(){
		$query="SELECT * from tbl_slider";
		$result=$this->db->select($query);
		return $result;
	}
	public function update_slider($id,$status){
		$status=mysqli_real_escape_string($this->db->link,$status);
		$id=mysqli_real_escape_string($this->db->link,$id);
		$query="UPDATE tbl_slider SET status='$status' WHERE id='$id'";
		$result=$this->db->update($query);
	}
	//xuat sp ra index.
	public function show_slider_index(){
		$query="SELECT * from tbl_slider where status='1' order by id desc limit 5";
		$result=$this->db->select($query);
		return $result;
	}
	public function del_slider($id){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$query="DELETE FROM tbl_slider WHERE id='$id'";
		$result=$this->db->delete($query);
		if($result){
			$alert="<span class='success'>Xoa thanh cong</span>";
			return $alert;
		}
		else
		{
			$alert="<span class='error'>Xoa that bai</span>";
			return $alert;
		}
	}
	public function show_product_hot(){
		$query="SELECT * from tbl_products where orderbydisplay= '0' order by productId desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function show_product_sales(){
		$query="SELECT * from tbl_products where orderbydisplay= '1' order by productId desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function show_product_coming(){
		$query="SELECT * from tbl_products where orderbydisplay= '2' order by productId desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function show_product_good(){
		$query="SELECT * from tbl_products where orderbydisplay= '3' order by productId desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function getProductbyCategory($id)
	{
		$query="SELECT * from tbl_products  where category_id= '$id' order by productId desc";
		$result=$this->db->select($query);
		return $result;

	}
	public function getTitleCategory($id)
	{
		$query="SELECT * from tbl_category  where category_id= '$id' order by category_id limit 1";
		$result=$this->db->select($query);
		return $result;
	}
	public function show_product_new(){
		if(!isset($_GET['trang'])){
			$trang=1;
		}
		else
		{
			$trang=$_GET['trang'];
		}
		$sotrang_mot=8;
		$sotrang_tiep=($trang-1)*$sotrang_mot;
		$query="SELECT * from tbl_product order by productId desc limit $sotrang_tiep,$sotrang_mot";
		$result=$this->db->select($query);
		return $result;
	}
	public function show_product_all(){
		$query="SELECT * FROM tbl_product";
		$result=$this->db->select($query);
		return $result;
	}
	public function show_product_detail($id){
		$query="SELECT tbl_products.* ,tbl_category.category_name
		from tbl_products 
		inner join tbl_category 
		on tbl_products.category_id = tbl_category.category_id 
		where tbl_products.productId='$id' 
		 order by tbl_products.productId desc";
		$result=$this->db->select($query);
		return $result;
	}
	
	public function insert_like($customer_id,$productid){
		$customer_id=mysqli_real_escape_string($this->db->link,$customer_id);
		$productid=mysqli_real_escape_string($this->db->link,$productid);
		$check_like="SELECT * FROM tbl_like where customerId='$customer_id' and productId='$productid'";
		$result_checkLike=$this->db->select($check_like);
		if($result_checkLike){
			$alert="<span class='error'>Sản phẩm đã thêm vào trước đó</span>";
			return $alert;
		}
		else
		{
			$query_product="SELECT * FROM tbl_products where productId='$productid'";
			$result_product=$this->db->select($query_product)->fetch_assoc();
			$productName=$result_product['productName'];
			$productPrice=$result_product['productPrice'];
			$image=$result_product['image'];
			$query_insertLike="INSERT INTO tbl_like(customerId,productId,productName,price,image) values('$customer_id','$productid','$productName','$productPrice','$image')";
			$result_insertLike=$this->db->insert($query_insertLike);
			if($result_insertLike){
				$alert="<span class='success'>Thêm thành công</span>";
				return $alert;
			}
			else
			{
				$alert="<span class='error'>Thêm thất bại</span>";
				return $alert;
			}
		}
	}
	public function show_like($customerid){
		$query_like="SELECT * from tbl_like where customerId='$customerid' order by id desc";
		$result_like=$this->db->select($query_like);
		return $result_like;
	}
	public function del_like($customer_id,$proid){
		$customer_id=mysqli_real_escape_string($this->db->link,$customer_id);
		$proid=mysqli_real_escape_string($this->db->link,$proid);
		$query_delLike="DELETE FROM tbl_like WHERE customerId='$customer_id' AND productId='$proid'";
		$result_delLike=$this->db->delete($query_delLike);
	}
}


?>