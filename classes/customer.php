<?php
  $filepath=realpath(dirname(__FILE__));
  require_once ($filepath.'/../lib/database.php');
  require_once ($filepath.'/../helper/format.php');
?>
<?php
/**
 * 
 */
class customer
{ 
     private $db;
     private $fm;	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insert_commnet(){
		$product_id=$_POST['product_id_binhluan'];
		$tenbinhluan=$_POST['tennguoibinhluan'];
		$binhluan=$_POST['binhluan'];
		if($tenbinhluan=='' || $binhluan==''){
			$alert="<span class='error'>Bạn điền đầy đủ thông tin</span>";
			return $alert;
		}
		else
		{
			$query_insertComment="INSERT INTO tbl_comment(tenbinhluan,binhluan,product_id) VALUES('$tenbinhluan','$binhluan','$product_id')";
			$result_insertComment=$this->db->insert($query_insertComment);
			if($result_insertComment){
				$alert="<span class='success'>Admin sẽ sớm trả lời bạn</span>";
				return $alert;
			}
			else
			{
				$alert="<span class='error'>Bình luận thất bại</span>";
				return $alert;
			}
		}
	}
	public function insert_customer($data)
	{
		$name= mysqli_real_escape_string($this->db->link,$data['name']);
		$email= mysqli_real_escape_string($this->db->link,$data['email']);
		$phone= mysqli_real_escape_string($this->db->link,$data['phone']);
		$address= mysqli_real_escape_string($this->db->link,$data['address']);
		$password= mysqli_real_escape_string($this->db->link,md5($data['password']));

		if($name=="" || $email=="" || $phone=="" || $address=="" || $password==""){

			$alert="<span style='color:red'>Bạn phải điền đầy đủ thông tin</span>";
			return $alert;
		}
		else
		{
			$check_email="select * from tbl_customer where customer_email ='$email' limit 1";
			$result_email=$this->db->select($check_email);
			if($result_email){
				$alert="<span style='color:red'>Email đã tồn tại</span>";
				return $alert;
			}	
			else
			{
				$query="insert into tbl_customer(
				customer_name,customer_phone,customer_address,customer_password,customer_email) values('$name','$phone','$address','$password','$email')";
				$result=$this->db->insert($query);
				if($result)
				{
					$alert="<span style='color:red'>Đăng kí thành công</span>";
					return $alert;
				}
				else
				{
					$alert="<span style='color:red'>Đăng kí thất bại</span>";
					return $alert;
				}
			}		
		}
	}
	public function login_customer($data){
		$email= mysqli_real_escape_string($this->db->link,$data['email']);
		$password= mysqli_real_escape_string($this->db->link,md5($data['password']));
		if($email=='' || $password=='')
		{
			$alert="<span style='color:red'>Bạn phải nhập đầy đủ</span>";
			return $alert;
		}
		else
		{
			$check_login="select * from tbl_customer where customer_email='$email' and customer_password='$password' limit 1";
			$result_checkLogin=$this->db->select($check_login);
			if($result_checkLogin){
				$value=$result_checkLogin->fetch_assoc();
				session::set('customer_login',true);
				session::set('customer_id',$value['customer_id']);
				session::set('customer_name',$value['customer_name']);
				session::set('customer_email',$value['customer_email']);
				header('location:cart.php');
			}
			else
			{
				$alert="<span style='color:red'>Bạn nhập sai mật khẩu hoặc email</span>";
				return $alert;
			}

		}
	}
	public function show_customer($id){
		$query="select * from tbl_customer where customer_id='$id'";
		$result=$this->db->select($query);
		return $result;
	}
	public function showCustomerInfo(){
		$query="select * from tbl_customer order by customer_id desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function update_customers($data,$id){
		$name= mysqli_real_escape_string($this->db->link,$data['name']);
		$email= mysqli_real_escape_string($this->db->link,$data['email']);
		$phone= mysqli_real_escape_string($this->db->link,$data['phone']);
		$address= mysqli_real_escape_string($this->db->link,$data['address']);
		if($name=="" ||  $email=="" || $phone=="" || $address=="" ){

			$alert="<span style='color:red'>Bạn phải điền đầy đủ thông tin</span>";
			return $alert;

		}
		else
		{
			$query_updateCus="update tbl_customer set customer_name='$name',customer_phone='$phone',customer_address='$address' , customer_email='$email'";
			$result_update=$this->db->insert($query_updateCus);
			if($result_update){
				$alert="<span style='color:blue'>Cập nhật thành công</span>";
				return $alert;
			}	
			else
			{
				$alert="<span style='color:red'>Cập nhật thất bại</span>";
				return $alert;
			}		
		}

	}
}
?>