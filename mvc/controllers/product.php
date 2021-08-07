<?php
    class product extends Controller {
        public $productModel;
        

        function __construct() {
            $this->products = $this->model('productModel');
        }

        function prefume($id) {
            $data = json_decode($this->products->getProductBy_IdProduct($id), true);
            $images = json_decode($this->products->getListImagesBy_IdProduct($id), true);

            $product = $data[0];
            $product['images'] = $images;

            $this->view('master2', [
                "page"=>"products",
                "Product"=>$product,
            ]);
        }
    }
?>