<?php class lineList{
        public $line_id;
        public $date;
        public $cus_id;
        public $emp_id;
        public $payment_type;
        public $percent;
        
        public function __construct($line_id,$date,$cus_id,$emp_id,$payment_type,$percent){
            $this->line_id = $line_id;
            $this->date = $date;
            $this->cus_id = $cus_id;
            $this->emp_id = $emp_id;
            $this->payment_type = $payment_type;
            $this->percent = $percent;
        }
        public static function getAll(){
            $lineLists = [];
            require("connection_connect.php");
            $sql = "select * from line_list";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $line_id = $my_row["line_id"];
                $date = $my_row["date"];
                $cus_id = $my_row["cus_id"];
                $emp_id = $my_row["emp_id"];
                $payment_type = $my_row["payment_type"];
                $percent = $my_row["percent"];
                $lineLists[] = new lineList($line_id,$date,$cus_id,$emp_id,$payment_type,$percent);
            }
            require("connection_close.php");
            return $lineLists;
        }
        public static function add($line_id,$date,$cus_id,$emp_id,$payment_type,$percent){
            require("connection_connect.php");
            $sql = "insert into line (lineID,lineDate,linePayment,linePercent)values('$line_id','$date','$payment_type','$percent')";
            $result = $conn->query($sql);
            require("connection_close.php");
            return "add success $result rows";
        }
        
    }
?>