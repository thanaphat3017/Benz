<?php class lineDetailController {
    public function index(){
        $lineDetail = lineDetailModel::getAll();

        require_once('views/lineDetail/indexLineDetail.php');
       
    }
    public function create(){
        $lineDetail = lineDetailModel::getAll();
        $itemColor = itemColorModel::getAll();
        $item  = Item::getAll();
  
        require_once('views/lineDetail/create.php');
       
    }
    public function search(){
        $key = $_GET['key'];
        $lineDetail = lineDetailModel::search($key);
        require_once('views/lineDetail/indexLineDetail.php');
       
    }
    public function updateFrom(){
        echo "========1========\n";
        $line_Detail_Id =$_GET['line_detail_id'];
        $line_id = $_GET['line_id'];
        echo "========2=====";
        $detail = lineDetailModel::get($line_Detail_Id);
        $lineDetail = lineDetailModel::getAll();
        $itemColor = itemColorModel::get($line_Detail_Id);
        $item  = Item::getAll();
        require_once('views/lineDetail/update.php');
       
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
    public function update(){
        // $color_name = $_GET['colorName'];
        // $item_name = $_GET['itemName'];
        // $item_id = $_GET['itemid'];
        
        $line_id= $_GET['lineid'];
        $amount = $_GET['amount'];
        $icid = $_GET['icid'];
        $addon_amount = $_GET['amountAddOn'];
        lineDetailModel::update($line_id,$amount,$addon_amount,$icid);
        echo"===================3=================";
        lineDetailController::index();
    }
    public function deleteConfirm(){
                    $line_detail_id = $_GET['line_detail_id'];
                    $lineDetail = lineDetailModel::get($line_detail_id);
                    echo $lineDetail->line_detail_id;
                    require_once('views/lineDetail/deleteConfirm.php');
        
    }
    public function delete(){
        $line_detail_id = $_GET['line_detail_id'];
        lineDetailModel::delete($line_detail_id);
        lineDetailController::index();



}
    public function error(){
        require_once('views/pages/error.php');
    }
}
?>