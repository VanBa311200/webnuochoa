<?php
    class productModel extends Database {

        public function getAllProduct() {
            $qr = 'SELECT p.*,b.name as brand , i.image FROM products p 
            INNER JOIN images i ON p.id = i.id_product 
            INNER JOIN brand b WHERE b.id = p.id_brand 
            GROUP BY i.id_product';
            $rows = mysqli_query($this->con, $qr);
            
            $result = mysqli_fetch_all($rows, MYSQLI_ASSOC);
            
            return json_encode($result);
        }

        public function getProduct_Limit($limit) {
            $qr = 'SELECT p.*,b.name as brand , i.image FROM products p 
            INNER JOIN images i ON p.id = i.id_product 
            INNER JOIN brand b WHERE b.id = p.id_brand 
            GROUP BY i.id_product LIMIT '.$limit.'';

            $rows = mysqli_query($this->con, $qr);
            
            $result = mysqli_fetch_all($rows, MYSQLI_ASSOC);
            
            return json_encode($result);
        }

        public function getListImagesBy_IdProduct($idProduct) {
            $qr = "SELECT image FROM images WHERE images.id_product = {$idProduct}";
            $rows = mysqli_query($this->con, $qr);

            $result = mysqli_fetch_all($rows, MYSQLI_ASSOC);

            return json_encode($result);
        }

        public function getProductBy_IdProduct($idProduct) {
            $qr = "SELECT p.*,b.name as brand FROM products p 
            INNER JOIN images i ON p.id = i.id_product 
            INNER JOIN brand b 
            WHERE b.id = p.id_brand 
            AND p.id = {$idProduct} 
            GROUP BY i.id_product";

            $rows = mysqli_query($this->con, $qr);

            $result = mysqli_fetch_all($rows, MYSQLI_ASSOC);

            return json_encode($result);
        }

        // 02/08/

        public function deleteproduct($id)
        {
            $qr = "DELETE FROM images where id_product = '$id';";
            $qr .= "DELETE FROM transactions where id_product = '$id';";
            $qr .= "DELETE FROM products where id = '$id'";
            echo $qr;
            return json_encode(mysqli_multi_query($this->con, $qr));
        }


    public function deletebrand($id)
    {
        $qr = "DELETE FROM products where id_brand = '$id';";
        $qr .= "DELETE FROM brand where id = '$id';";
        return json_encode(mysqli_multi_query($this->con, $qr));
    }
    public function getAllBrand()
    {
        $qr = "SELECT * FROM brand";
        $rows = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_all($rows, MYSQLI_ASSOC);
        return json_encode($result);
    }
    public function getAllImg()
    {
        $qr = "SELECT * FROM images";
        $rows = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_all($rows, MYSQLI_ASSOC);
        return json_encode($result);
    }
    public function addProduct($id_brand, $name, $description, $price, $pricesale, $percentsale)
    {
        $qr = "INSERT INTO products VALUES(NULL,'$id_brand',' $name',' $description', '$price', '$pricesale', '$percentsale',NULL,NULL)";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function addPic($name, $img)
    {
        $maspqr = "SELECT id FROM products ORDER BY id DESC LIMIT 1";
        $masp = mysqli_query($this->con, $maspqr);
        $outp =  mysqli_fetch_row($masp);

        $qr = "INSERT INTO images VALUES(null,'$outp[0]','$name','$img')";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function addBrand($name)
    {
        $qr = "INSERT INTO brand VALUES(null,'$name')";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function updateProduct($id, $id_brand, $name, $description, $price, $pricesale, $percentsale)
    {
        $qr = "UPDATE products SET id_brand='$id_brand', name =' $name', description =' $description',
        price = '$price', pricesale ='$pricesale', percentsale = '$percentsale' WHERE id ='$id'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function updateImg($id, $id_product, $img)
    {
        $qr = "UPDATE images SET image = '$img' WHERE id='$id' AND id_product='$id_product'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function updateUser($fullname, $phone, $newpass)
    {
        if (isset($_SESSION['user'])) {
            $ss = $_SESSION['user'][0];
        }
        $qr = "UPDATE users SET fullname = '$fullname', phone = '$phone', password = '$newpass' WHERE id='$ss'";
        $result = false;
        if (mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }
    public function getAllUser()
    {
        if (isset($_SESSION['user'])) {
            $ss = $_SESSION['user'][0];
        }
        $qr = "SELECT * FROM users where id = '$ss' and state = '1'";
        $rows = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_all($rows, MYSQLI_ASSOC);
        return json_encode($result);
    }
    }
?>