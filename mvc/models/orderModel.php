<?php
class orderModel extends Database {

    function insertOrder($id_user) {
        $qr = "INSERT INTO `order_bill` (`id`, `id_user`, `create_at`) 
        VALUES (NULL, '$id_user', current_timestamp())";

        $rows = mysqli_query($this->con, $qr);
        $result = false;
        $id_order = mysqli_insert_id($this->con);
        if($rows) {
            $result = $id_order;
        }

        return $result;
    }

    function insertMultiTransactions($datas, $id_order) {
        $qr_mutil = [];
        foreach($datas as $data) {
            $qr_mutil [] = "
                (NULL, '{$id_order}',
                '{$data['id']}',
                '{$data['quantitySelector']}',
                '{$data['option-size']}',
                '{$data['total']}')
            ";
        }
        $qrs = join(',', $qr_mutil);
        $qr = "INSERT INTO `transactions` (`id`, `id_order`, `id_product`, `quantity`, `size`, `price`) 
        VALUES $qrs";

        $rows = mysqli_query($this->con, $qr);
        $result = false;
        if ($rows) {
            $result = true;
        }

        return json_encode($result);
    }

}