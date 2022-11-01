<?php class lineDetailController {
    public function index(){
        $lineList = lineDetailModel::getAll();
        require_once('views/linedetail/indexLineDetail.php');
       
    }
    public function create(){
        $lineList = lineDetailModel::getAll();
        $itemColor = itemColorModel::getAll();
        $item  = Item::getAll();
        require_once('views/linedetail/create.php');
       
    }
    public function search(){
        $key = $_GET['key'];
        $lineList = lineDetailModel::search($key);
        require_once('views/linedetail/indexLineDetail.php');
       
    }
    public function add(){
        // $color_name = $_GET['colorName'];
        // $item_name = $_GET['itemName'];
        // $item_id = $_GET['itemid'];
        
        $line_id= $_GET['lineid'];
        $amount = $_GET['amount'];
        $icid = $_GET['icid'];
        $addon_amount = $_GET['amountAddOn'];
        lineDetailModel::addDetail($line_id,$amount,$addon_amount,$icid);
        echo"===================3=================";
        lineDetailController::index();
    }
    public function error(){
        require_once('views/pages/error.php');
    }
}
?>
