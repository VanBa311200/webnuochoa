<?php
class ajax extends Controller {

    private $productsModel;
    private $userModel;
    private $orderModel;

    function __construct() {
        $this->productsModel = $this->model('productModel');
        $this->userModel = $this->model('userModel');
        $this->orderModel = $this->model('orderModel');
    }

    function getProducts() {

        $products = $this->productsModel->getAllProduct();
        
        $pr = json_decode($products, true);
        $newProducts = [];
        foreach ($pr as $a) {
            $images = $this->productsModel->getListImagesBy_IdProduct($a['id']);
            $a['images'] = json_decode($images, true);
            
            array_push($newProducts, $a);
        }
        
        echo json_encode($newProducts);
    } 

    function checkRegister_Email() {

        $email = $_POST['email'];
        
        $c = json_decode($this->userModel->checkRegister_Email($email), true);

        if(is_array($c) == '1') {
            echo 1;
        } else {
            echo 0;
        }
        
    }

    function createOrder() {

        $listProduct = $_POST['order'];
        $id_u = $_SESSION['user']['id'];

        if(isset($_SESSION['user']['id'])) {
            $id_order = $this->orderModel->insertOrder($id_u);
            // var_dump($listProduct);
            if($id_order) {
                $result = json_decode($this->orderModel->insertMultiTransactions($listProduct, $id_order));
                echo $result;
            }
        }
    }

    function sendEmail($email) {
        $to = $email;
        $_token = rand();
        $result = json_decode($this->userModel->createToken($to, $_token));
        if ($result) {
            // mail settings
            // php.ini
            ini_set('SMTP', 'smtp.gmail.com');
            ini_set('sendmail_from', 'nampro123p12@gmail.com');
            ini_set('sendmail_path', "C:\xampp\sendmail\sendmail.exe -t");
            ini_set('smtp_port', '587');
            ini_set('mail.add_x_header', 'On');
            // sendmail.ini
            ini_set('smtp_server', 'smtp.gmail.com');
            ini_set('error_logfile', 'error.log');
            ini_set('debug_logfile', 'debug.log');
            ini_set('auth_username', 'nampro123p12@gmail.com');
            ini_set('auth_password', '0918537355');
            ini_set('force_sender', 'nampro123p12@gmail.com');
            
            $from = 'nampro123p12@gmail.com';
            $subject = 'Verify Your Account';
            $link = htmlspecialchars('
            http://localhost:8080/webnuochoa/account/changepassword/'. $email .'/'. $_token .'');

            // Message
            $message = '<html><body>';
            $message .= '<h1 style="color:#000;">Xác minh tài khoản</h1>';
            $message .= '<p>Nhấn vào đường link bên dưới để xác minh tài khoản của bạn.</p>';
            
            $message .= '<a href='.$link.'>Xác minh</a>';
            $message .= '</body></html>';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            
            // Create email headers
            $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            if(mail($to, $subject, $message, $headers)){
                echo 'Your mail has been sent successfully.';
            } else{
                echo 'Unable to send email. Please try again.';
            }
        }
    }

    function changePassWord() {
        if (isset($_POST['email']) && isset($_POST['pass'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $result = json_decode($this->userModel->changePassword($email, $pass));

            if($result == 'true') {
                echo 1;
            }
            else echo 0;
        }
    }

    function deleteproduct()
    {
        $id = $_POST['id'];

        $result = $this->productsModel->deleteproduct($id);

        echo ($result);
    }
    function deletebrand()
    {
        $id = $_POST['id'];
        $result = $this->productsModel->deletebrand($id);
        echo ($result);
    }
}
?>