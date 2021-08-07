<?php
    class account extends Controller {

        public $users;
        function __construct() {
            $this->users = $this->model('userModel');
        }

        function index() {
            
            echo "Profile Account Here";

            // $this->view('master2', [
            //     "page"=>"login",
            // ]);
        }

        function login() {
            if(isset($_SESSION['user'])) {
                if ($_SESSION['user']['state'] == '0')
                    header('Location: http://localhost:8080/webnuochoa/');
                else header('Location: http://localhost:8080/webnuochoa/admin/home');
            } else {
                $this->view('master2', [
                    "page"=>"login",
                ]);
            }
        }
        
        function register() {
            $this->view('master2', [
                "page"=>"register",
            ]);
        }

        function forgetpass() {
            $this->view('master2', [
                "page"=>"forgetpass",
            ]);
        }

        // function sendEmail($email=0) {
        //     $to = $_POST['email'];
        //     $result = $this->users->checkRegister_Email($email);
            
        //     echo ($random);
        //     var_dump($result);


        //     $to = '19001772@lttc.edu.vn';
        //     $from = 'nampro123p12@gmail.com';
        //     $subject = 'Verify Your Account';
            
        //     // Message
        //     $message = '<html><body>';
        //     $message .= '<h1 style="color:#000;">Xác minh tài khoản</h1>';
        //     $message .= '<p>Nhấn vào đường link bên dưới để xác minh tài khoản của bạn.</p>';
            
        //     $message .= '<a href="/webnuochoa/account/verifyAccount/'. $to .'/'. $_token .'">Xác minh</a>';
        //     $message .= '</body></html>';

        //     // To send HTML mail, the Content-type header must be set
        //     $headers  = 'MIME-Version: 1.0' . "\r\n";
        //     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        //     // Create email headers
        //     $headers .= 'From: '.$from."\r\n".
        //     'Reply-To: '.$from."\r\n" .
        //     'X-Mailer: PHP/' . phpversion();
            
        //     if(mail($to, $subject, $message, $headers)){
        //         echo 'Your mail has been sent successfully.';
        //     } else{
        //         echo 'Unable to send email. Please try again.';
        //     }
        // }

        function changepassword($e=0, $t=0) {
            $result = json_decode($this->users->checkToken($e,$t));
            if ($result) {
                $this->view('master2', [
                    "page"=>"changepass",
                    "email"=>$e,
                    "token"=>$t,
                ]);
            } else {
                $this->view('master2', [
                    "page"=>"404",
                ]);
            }
        }

        function registerSucess() {
            $this->view('master2', [
                "page"=>"registerSucess",
            ]);
        }

        function checkLog() {
            if(isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $data = json_decode($this->users->checkLogin($email, $password), true);


                echo ($data);
                if (is_bool($data)) {
                    $this->view('master2', [
                        "page"=>"login",
                        "result"=> false,
                    ]);
                } else {
                    $_SESSION['user'] = $data;
                    if ($_SESSION['user']['state'] == '0')
                        header("Location: http://localhost:8080/webnuochoa/");
                    else header("Location: http://localhost:8080/webnuochoa/admin/home"); 
                }
            }
        }

        function logout() {
            unset($_SESSION['user']);
            header("Location: http://localhost:8080/webnuochoa/");
        }

        function registerAccount() {
            if(isset($_POST['register-button'])) {
                $hoten = $_POST['name'] . " " . $_POST['firstname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $result = $this->users->registerAccount($hoten, $email, $password);

                if ($result) echo "Successfully registered";
                else echo "Faild registered";
            }


        }
    
    }
?>