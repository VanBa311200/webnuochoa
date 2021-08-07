<?php
    class home extends Controller {

        private $productModel;

        function index() {

            $this->productModel = $this->model('productModel');

            $data = $this->productModel->getProduct_Limit(8);
            
            $result = json_decode($data, true);

            $this->view('master1', [ 
                "page"=>"home",
                "products"=>$result,
            ]);
        }
    }
?>