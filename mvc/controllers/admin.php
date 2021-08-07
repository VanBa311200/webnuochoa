<?php
class admin extends Controller
{
    public $products;
    function __construct()
    {
        $this->products = $this->model("productModel");
    }
    public function home()
    {
        $this->productModel = $this->model('productModel');
        $data = $this->productModel->getAllProduct();
        $result = json_decode($data, true);

        $brand = json_decode($this->products->getAllBrand(), true);
        $this->view('master3', [
            "page" => "productAdmin",
            'pro' => $result,
            'brand' => $brand,
        ]);
    }
    public function addnewproduct()
    {
        $brand = json_decode($this->products->getAllBrand(), true);
        $this->view('master3', [
            "page" => "addnewproduct",
            'brand' => $brand,
        ]);
    }
    public function newproduct()
    {
        if (isset($_POST['btn-add-product'])) {
            $name = $_POST['name-product'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $percent = $_POST['percent-price'];
            $sale = $_POST['sale-price'];
            $img = substr(md5(microtime()), Rand(0, 26), 11) . $_FILES['input-file-home']['name'];
            move_uploaded_file($_FILES['input-file-home']['tmp_name'], 'public/image/' . $img);
            $linkimg = '/webnuochoa/public/image/' . $img;
            $brand = $_POST['brand'];
            json_decode($this->products->addProduct($brand, $name, $description, $price, $sale, $percent), true);
            $kq = json_decode($this->products->addPic($name, $linkimg), true);
            if ($kq == true) {
                header('Location: http://localhost:8080/webnuochoa/admin/addnewproduct');
            }
        }
    }
    function addbrand()
    {
        if (isset($_POST['btn-add-new-brand'])) {
            $name = $_POST['brand'];
            $result = json_decode($this->products->addBrand($name), true);
            if ($result == 'true') {
                header('location: http://localhost:8080/Webnuochoa/admin/home');
            }
        }
    }
    public function editproduct($id)
    {
        $img = json_decode($this->products->getAllImg(), true);
        $this->productModel = $this->model('productModel');
        $data = $this->productModel->getAllProduct();
        $result = json_decode($data, true);
        $brand = json_decode($this->products->getAllBrand(), true);
        foreach ($result as $pro) {
            if ($pro['id'] == $id) {
                $result =  $pro;
            }
        }
        $this->view('master3', [
            "page" => "editproduct",
            'pro' => $result,
            'brand' => $brand,
            'img' => $img,
        ]);
    }
    public function editproduct1($id)
    {
        if (isset($_POST['btn-add-product'])) {
            $name = $_POST['name-product'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $percent = $_POST['percent-price'];
            $sale = $_POST['sale-price'];
            $img =  substr(md5(microtime()), Rand(0, 26), 11) . $_FILES['input-file-home']['name'] . $_FILES['input-file-home']['name'];
            move_uploaded_file($_FILES['input-file-home']['tmp_name'], 'public/image/' . $img);
            $linkimg = '/webnuochoa/public/image/' . $img;
            $brand = $_POST['brand'];
            $id_img = $_POST['id-img'];
            json_decode($this->products->updateProduct($id, $brand, $name, $description, $price, $sale, $percent), true);
            json_decode($this->products->updateImg($id_img, $id, $linkimg), true);
            $url = 'location: http://localhost:8080/Webnuochoa/admin/editproduct/';
            header($url . " " . $id);
        }
    }
    function deleteproduct()
    {
        if (isset($_POST['delete-select-pro'])) {
            if (isset($_POST['id'])) {
                foreach ($_POST['id'] as $id) {
                    $kq =   json_decode($this->products->deleteproduct($id), true);
                    echo $kq . "<br>";
                }
            }
            header('location: http://localhost:8080/Webnuochoa/admin/home');
        }
    }
    function accountadmin()
    {
        if (isset($_SESSION['user'])) {
            // $user = json_decode($this->products->getAllUser(), true);
            $this->view('master3', [
                "page" => "accountadmin",
                "user" => $_SESSION['user'],
            ]);
            // var_dump($_SESSION['user']);
        } else {
            $this->view('master3', [
                "page" => "accountadmin",
            ]);
        }
    }
    function editprofile()
    {
        if (isset($data['btn-account-edit'])) {
            $fullname = $_POST['name-account'];
            $phone = $_POST['phone'];
            $newpass = $_POST['newpassword'];
            json_decode($this->products->updateUser($fullname, $phone, $newpass), true);
            header('location: http://localhost:8080/Webnuochoa/admin/accountadmin');
        }
    }
}
