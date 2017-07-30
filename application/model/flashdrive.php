
<?php
include 'dbs.php';
class flashdrive{

	private $db;

	
	public $order_total;
	public $customer_cash;
	public $customer_change;
	public $date_ordered;

	public $flash_drive_id;
	public $quantity;
	public $price;

	public $customer_account_id;
	public $customer_firstname;
	public $customer_lastname;
	public $customer_gender;
	public $customer_email;
	public $customer_address;
	public $customer_contact_number;

	public $brand;
	public $model;
	public $capacity;
	public $stock;
	public $details;
	public $flashdrive_photo;


	public function __construct(){
		$this->db = new dbs();
	}

	public function getAllFlashdrive(){
		$sql = "select * from flash_drives";
		return $this->db->execute_query($sql);
	}

	public function getFlashdriveByCapacity($capacity){
		$sql = "select * from flash_drives where capacity='$capacity'";
		return $this->db->execute_query($sql);
	}

	public function getFlashdriveByBrand($brand){
		$sql = "select * from flash_drives where brand='$brand'";
		return $this->db->execute_query($sql);
	}

	public function getFlashdriveByBrandAndCapacity($brand,$capacity){
		$sql = "select * from flash_drives where brand='$brand' and capacity='$capacity'";
		return $this->db->execute_query($sql);
	}

	public function getFlashdriveByID($pid){
		$sql = "select * from flash_drives where flash_drive_id='$pid'";
		return $this->db->execute_query($sql);

	}

	public function addToOrderDetails(){
		
		$sql = "insert into order_details(order_id,customer_account_id,flash_drive_id,quantity,price) values('$this->order_id','$this->customer_account_id','$this->flash_drive_id','$this->quantity','$this->price')";
		return $this->db->execute_query($sql);
	}

	public function addToCustomersOrders(){
		$sql = "insert into customer_order(customer_account_id,order_total,customer_cash,customer_change) values('$this->customer_account_id','$this->order_total','$this->customer_cash','$this->customer_change')";
		$result =  $this->db->execute_query($sql);
		$this->order_id = $this->db->getID();
		return $result;
	}

	public function addToCustomers(){
		$sql = "insert into customer(customer_account_id,customer_firstname,customer_lastname,customer_gender,customer_email,customer_address,customer_contact_number) values('$this->customer_account_id','$this->customer_firstname','$this->customer_lastname','$this->customer_gender','$this->customer_email','$this->customer_address','$this->customer_contact_number')";
		return $this->db->execute_query($sql);
	}

	public function addFlashdrive(){
		$sql = "insert into flash_drives(brand,model,capacity,price,stock,details,flashdrive_photo) values('$this->brand','$this->model','$this->capacity','$this->price','$this->stock','$this->details','$this->flashdrive_photo')";
		$result =  $this->db->execute_query($sql);
		if($result){
			return true;
		}else return false;
	}


	public function uploadImage(){
		

			$allowedExts = array("gif","GIF", "jpeg","JPEG", "jpg","JPG", "png","PNG");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);


			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& in_array($extension, $allowedExts)) {
			  if ($_FILES["file"]["error"] > 0) {
			    //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			    return false;
			  } else {
			    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
			    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

			    $filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
				$coverExtension =  pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			    $newCoverName = $filename.".".$coverExtension;
			    $this->flashdrive_photo = $newCoverName;

			    if (file_exists("../../pendrives/" . $_FILES["file"]["name"])) {
			      //echo $_FILES["file"]["name"] . " already exists. ";
			    	return false;
			    } else {
			      move_uploaded_file($_FILES["file"]["tmp_name"],
			      "../../pendrives/" . $newCoverName);
			      //echo "Stored in: " . "../../pendrives/" . $newCoverName;
			      return true;
			    }
			    
			  }
			} else {
			  //echo "Invalid file";
				return false;
			}


		}

		public function removeFlashdrive($pid){
			$sql = "delete from flash_drives where flash_drive_id='$pid'";
			$result =  $this->db->execute_query($sql);
			if($result){
				return true;
			}else return false;

		}
		public function editFlashDrive($pid){
			$sql = "update flash_drives set brand = '$this->brand',model = '$this->model',capacity = '$this->capacity',price = '$this->price',stock = '$this->stock',details='$this->details',flashdrive_photo='$this->flashdrive_photo' where flash_drive_id='$pid'";
			$result =  $this->db->execute_query($sql);
			if($result){
				return true;
			}else return false;
		}
		
		public function searchFlashDrive($key){
			$sql = "select * from flash_drives where brand LIKE '%$key%' or model LIKE '%$key%' or capacity LIKE '%$key%'  or price LIKE '%$key%'";
			return $this->db->execute_query($sql);
		
		}
		public function getCustomerOrders(){
			$sql = "select * from customer_order order by order_id desc";
			return $this->db->execute_query($sql);
		}

		public function getCustomerOrderDetails($order_id){
			$sql = "select * from order_details where order_id = '$order_id'";
			return $this->db->execute_query($sql);
		}
		public function getCustomer($id){
			$sql = "select * from customer where customer_account_id = '$id'";
			return $this->db->execute_query($sql);
		}
		public function getAllCustomers(){
			$sql = "select * from customer";
			return $this->db->execute_query($sql);
		}
		public function getAllUsers(){
			$sql = "select * from accounts where account_type = 'user'";
			return $this->db->execute_query($sql);
		}
		public function getAllAdmins(){
			$sql = "select * from accounts where account_type = 'admin'";
			return $this->db->execute_query($sql);
		}
		
}


?>