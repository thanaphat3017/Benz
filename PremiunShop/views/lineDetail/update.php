<form method = "get" action="">
<label>COLOR<select name="icid">
    <?php foreach( $itemColor as $list )
    {  
        echo "<option value = $list->ic_id";
        if($list->ic_id == $detail->icid){echo"selected = 'selected'";}
        echo">$list->color_name</option>";
        //echo"<option value =$list->ic_id>$list->color_name</option>";
    }?>

</select></label><br>
<label>ItemName<select name="itemName">
    <?php foreach( $item as $listName ){
        echo"<option value =$listName->item_name";
        if($listName->item_name==$detail->item_name){echo "selected='selected'";}
        echo">$listName->item_name</option>";
    }?>
</select></label><br>

<label>LineID<select name="lineid"> 
    <?php foreach( $lineDetail as $listLine ){
        echo"<option value =$listLine->line_id>$listLine->line_id</option>";
    }?>
</select></label><br>


<label>จำนวน<input type="text" name ="amount"
        value="<?php echo $detail->amount;?>"/>
</label><br>
<label>จำนวนสี<input type="text" name ="amountAddOn"
        value="<?php echo $detail->amount_add_on;?>"/>
</label><br>
<input type="hidden" name="controller" value="lineDetail"/>
<button type = "submit" name="action" value="index">back</button>
<button type = "submit" name="action" value="update">add</button>

</form>