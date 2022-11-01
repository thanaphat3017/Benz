<?php  
    $controllers = array('pages'=>['home','error'],'stock'=>['index','newStock','addStock','search','deleteConfirm','delete','updateForm','update'],'linelist'=>['index','newLine','addLine','search','deConfirm','delete','error','updateForm','update'],'lineDetail'=>['index','error','create','add','search','updateFrom','update','deleteConfirm','delete']);

    function call($controller,$action){
        require_once("controllers/".$controller."_controller.php");
        switch($controller){
            case "pages":       $controller = new PagesController(); break;
            case "lineDetail":  require_once("models/itemModel.php");
                                require_once("models/lineDetailModel.php");
                                require_once("models/itemColorModel.php");
                                $controller = new lineDetailController();break;
        }
        $controller->{$action}();
    }

    if(array_key_exists($controller,$controllers)){
        if(in_array($action,$controllers[$controller])){
            call($controller,$action);
        }
        else{
            call('pages','error');
        }
    }
    else{
        call('pages','error');
    }
?>