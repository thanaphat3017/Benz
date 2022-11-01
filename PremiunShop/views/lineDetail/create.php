<form method = "get" action="">

<label>COLOR<select name="icid">
    <?php foreach( $itemColor as $list ){
        echo $list->ic_id;
        echo"<option value =$list->ic_id>$list->color_name</option>";
    }?>

</select></label><br>
<label>ItemName<select name="itemName">
    <?php foreach( $item as $listName ){
        echo"<option value =$listName->item_name>$listName->item_name</option>";
    }?>
</select></label><br>

<label>LineID<select name="lineid">
    <?php foreach( $lineDetail as $listLine ){
        echo"<option value =$listLine->line_id>$listLine->line_id</option>";
    }?>
</select></label><br>
<!-- <label>ItemID<select name="itemid">
    <?php foreach( $item as $list ){
        echo"<option value =$list->item_id>$list->item_id</option>";
    }?> -->
</select></label><br>
<!-- <label>ICID<select name="icid">
    <?php foreach( $itemColor as $list){
        echo"<option value =$list->icid>$list->icid</option>";
    }?>
</select></label><br> -->

<label>จำนวน<input type="text" name ="amount"/></label><br>
<label>จำนวนสี<input type="text" name ="amountAddOn"/></label><br>
<input type="hidden" name="controller" value="lineDetail"/>
<button type = "submit" name="action" value="index">back</button>
<button type = "submit" name="action" value="add">add</button>

</form>