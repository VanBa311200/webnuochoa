<?php

    class userModel extends Database {

        public function checkLogin($u , $p) {
            $qr = "SELECT * FROM users WHERE email = '{$this->con->real_escape_string($u)}' 
                    AND password = '{$this->con->real_escape_string($p)}'";
            $rows = mysqli_query($this->con ,$qr);

            if (mysqli_num_rows($rows) > 0) {
                $result = mysqli_fetch_array($rows, MYSQLI_ASSOC);
                return json_encode($result);
            } else {
                $result = false;
                return json_encode($result);
            }
        }

        public function checkRegister_Email($email) {
            $qr = "SELECT * FROM users WHERE email = '{$this->con->real_escape_string($email)}'";

            $rows = mysqli_query($this->con, $qr);

            return  json_encode(mysqli_fetch_assoc($rows));
        }

        public function registerAccount($n, $e,  $p) {
            $qr = "INSERT INTO users (fullname, email, password)
            VALUES (
                '{$this->con->real_escape_string($n)}', 

                '{$this->con->real_escape_string($e)}', 
                '{$this->con->real_escape_string($p)}'
            )";

            $rows = mysqli_query($this->con, $qr);

            if ($rows) {
                return true;
            } else return false;
        }


        public function createToken($email, $token) {
            $qr = "UPDATE users SET _token = '{$this->con->real_escape_string($token)}' 
            WHERE email = '{$this->con->real_escape_string($email)}'";

            $rows = mysqli_query($this->con, $qr);
            $result = false;

            if ($rows) {
                $result = true;
            }
            return json_encode($rows);
        }

        public function checkToken($email, $token) {
            $qr = "SELECT * FROM users 
            WHERE email = '{$this->con->real_escape_string($email)}' 
            AND _token = '{$this->con->real_escape_string($token)}'";

            $rows = mysqli_query($this->con, $qr);
            $result = false;

            if(mysqli_num_rows($rows)) {
                $result = true;
            }

            return json_encode($result);
        }
        

        public function changePassword($email, $password) {
            $qr = "UPDATE users SET password = '{$this->con->real_escape_string($password)}', _token = '0'
            WHERE email = '{$this->con->real_escape_string($email)}'";

            $rows = mysqli_query($this->con, $qr);
            $result = false;

            if ($rows) {
                $result = true;
            }

            return json_encode($result);
        } 
    }