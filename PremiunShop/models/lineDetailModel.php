<?php class lineDetailModel{
    public $line_detail_id,$line_id,$item_id,$item_name,$item_Description,$item_color,$amount,$amount_add_on,$icid;

    public function __construct($line_detail_id,$line_id,$item_id,$item_name,$item_color,$amount,$amount_add_on,$icid){
        $this->line_detail_id = $line_detail_id;
        $this->line_id = $line_id;
        $this->item_id = $item_id;
        $this->item_name = $item_name;
        $this->item_color = $item_color ;
        $this->amount = $amount ;
        $this->amount_add_on = $amount_add_on ;
        $this->icid = $icid;

    }
    public static function getAll(){
        require("connection_connect.php");
        $itemList=[];
        $sql = "select  * from line_Detail natural join ItemColor natural join Item ";
        $result = $conn->query($sql);
        while($myRow = $result->fetch_assoc())
        {   
            $line_id = $myRow["line_id"];
            $item_id = $myRow["item_id"];
            $item_name = $myRow["item_name"];
            $line_detail_id = $myRow["Line_detail_id"];         
            $item_color =  $myRow["color_name"] ;
            $amount = $myRow["amount"] ;
            $amount_add_on  = $myRow["addon_amount"] ;
            $icid =$myRow["ic_id"];
            $itemList[]= new lineDetailModel($line_detail_id,$line_id,$item_id,$item_name,$item_color,$amount,$amount_add_on,$icid );
            
        }
        
        require("connection_close.php");
        return $itemList;
    }
    public static function addDetail($line_id,$amount,$addon_amount,$icid){
        echo"$line_id,$amount,$addon_amount,$icid";
        echo"=========";
        require("connection_connect.php");
        echo "==============1================";
        $sql = "insert into Line_Detail (line_id,ic_id,amount,addon_amount) VALUES ('$line_id','$icid','$amount','$addon_amount');";
        // $sql = "insert into line_detail (color_name,item_name,item_Description,item_id,line_id,amount,addon_amount) VALUES
        // ('$color_name','$item_name','$item_Des','$item_id','$line_id','$amount','$addon_amount')";
        echo "==============2================";
        $result =$conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";

    }
    public static function search($key){
        echo $key;
        require("connection_connect.php");
        $sql = "select  *
        from Line_Detail natural join ItemColor natural join Item 
        where Line_Detail.line_id like '%$key%' or Item.item_id like '%$key%'
        ";
        echo "=======111==";
        $result = $conn->query($sql);
        while($myRow = $result->fetch_assoc()){
            $line_id = $myRow["line_id"];
            $item_id = $myRow["item_id"];
            $item_name = $myRow["item_name"];
            $line_detail_id = $myRow["Line_detail_id"];         
            $item_color =  $myRow["color_name"] ;
            $amount = $myRow["amount"] ;
            $amount_add_on  = $myRow["addon_amount"] ;
            $icid =$myRow["ic_id"];
            $itemList[]= new lineDetailModel($line_detail_id,$line_id,$item_id,$item_name,$item_color,$amount,$amount_add_on,$icid );
        }
        require("connection_close.php");
        return $itemList;

    }
    public static function get($line_detail_id)
    {
        require("connection_connect.php");
        $sql = "select  * from line_Detail natural join ItemColor natural join Item 
            where Line_detail_id = $line_detail_id";
        $result = $conn->query($sql);
        $myRow = $result->fetch_assoc();
        $line_id = $myRow["line_id"];
        $item_id = $myRow["item_id"];
        $item_name = $myRow["item_name"];
        $line_detail_id = $myRow["Line_detail_id"];
        $item_color =  $myRow["color_name"] ;
        $amount = $myRow["amount"] ;
        $amount_add_on  = $myRow["addon_amount"] ;
        $icid =$myRow["ic_id"];
      
        require("connection_close.php");
        return new lineDetailModel($line_detail_id,$line_id,$item_id,$item_name,$item_color,$amount,$amount_add_on,$icid );
    }
    public static function update($line_detail_id,$amount,$addon_amount,$icid){
        echo"$line_id,$amount,$addon_amount,$icid";
        echo"=========";
        require("connection_connect.php");
        echo "==============1================";
        $sql = " update  Line_Detail SET amount = '$amount',addon_amount = '$addon_amount',ic_id ='$icid'
                where Line_detail_id ='$line_detail_id' ";
        
        $result =$conn->query($sql);
        require("connection_close.php");
        return "update success $result rows";
    }
    public static function delete($line_detail_id){
        echo"$line_detail_id";
        echo"=========";
        require("connection_connect.php");
        echo "==============1================";
        $sql = " delete from Line_Detail 
                where Line_detail_id ='$line_detail_id' ";
        
        $result =$conn->query($sql);
        require("connection_close.php");
        return "delete success $result rows";
    }
}
   
?>