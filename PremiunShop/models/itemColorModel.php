<?php class itemColorModel
{
    public $color_name, $item_id,$ic_id;

    public function __construct($color_name, $ic_id, $item_id)
    {
        $this->ic_id = $ic_id;
        $this->item_id = $item_id;
        $this->color_name = $color_name;
    }
    public static function getAll()
    {
        require("connection_connect.php");
        $List = [];
        
        $sql = "select  * from itemcolor;";
        $result = $conn->query($sql);
        while($myRow = $result->fetch_assoc()){
            $ic_id = $myRow['ic_id'];
            $item_id = $myRow['item_id'];
            $color_name = $myRow['color_name'];
            $List[] = new itemColorModel($color_name, $ic_id, $item_id);
        }
       
        require("connection_close.php");
        return $List;
    }
    public static function get($line_Detail_Id)
    {
        $colorCheck = array();
        $itemCheck = array();
        $check = true;
        require("connection_connect.php");
        $sql = "SELECT * 
            FROM itemcolor 
            LEFT JOIN line_detail
            ON itemcolor.ic_id = line_detail.ic_id
            WHERE line_detail.line_detail_id = $line_Detail_Id ;";
        $result = $conn->query($sql);
        $myRow = $result->fetch_assoc();
        $line_id = $myRow["line_id"];
        $item_id = $myRow["item_id"];
        $item_color =  $myRow["color_name"] ;
        $icid =$myRow["ic_id"];
        $listAll = itemColorModel::getAll();
        foreach($listAll as $list){
            if($list->item_id == $item_id){
                $listColor[] = new itemColorModel($list->color_name, $list->ic_id, $list->item_id);
            }
        }
        
        require("connection_close.php");
        return $listColor;
    }
}

?>
