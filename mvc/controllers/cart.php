<?php
    class cart extends Controller {
        
        public function index() {

            if (isset($_SESSION['user'])) {
                $this->view('master2', [
                    "page"=>"cart",
                ]);
            }  else {
                $this->view('master2', [
                    "page"=>"login",
                ]);
            }
            
        }
    }
?>