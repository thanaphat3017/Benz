<?php echo"<br>Are you sure to delete this student<br>
            <br> $lineDetail->line_id $lineDetail->item_id $lineDetail->item_name  <br>

            "?>
<form method ="get" action = "">
    <input type ="hidden" name="controller" value="lineDetail"/>
    <input type = "hidden" name="line_detail_id" value="<?php echo $lineDetail->line_detail_id;?>"/>
    <button type = "submit" name="action" value="index">back</button>
    <button type = "submit" name="action" value="delete">delete</button>

    
    </form>