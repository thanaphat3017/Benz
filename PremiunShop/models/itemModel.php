<?php
    class Item{
        public $item_id;
        public $cate_id;
        public $item_name;
        public $item_Description;
        public $item_minimum;


        public function __construct($item_id,$cate_id,$item_name,$item_Description,$item_minimum)
        {
            $this->item_id = $item_id;
            $this->cate_id = $cate_id;
            $this->item_name = $item_name;
            $this->item_Description = $item_Description;
            $this->item_minimum = $item_minimum;
        }

        public static function getAll()
        {
            $itemList = [];
            require("connection_connect.php");
            $sql = "select * from item";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc())
            {
            $item_id = $my_row["item_id"];
            $cate_id = $my_row["cate_id"];
            $item_name = $my_row["item_name"];
            $item_Description = $my_row["item_Description"];
            $item_minimum = $my_row["item_minimum"];
            $itemList[] = new Item($item_id,$cate_id,$item_name,$item_Description,$item_minimum);
            }
            require("connection_close.php");
            return $itemList;
        }

}
?>