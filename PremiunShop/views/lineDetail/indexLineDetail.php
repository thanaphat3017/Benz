new itemdetail<a href=?controller=lineDetail&action=create>Click</a>
<h1 > นาย ธนภัทร ทุเรียนงาม 6320503017</h1>
<br>
<form method ="get" action="">
       <input type = "text" name="key">
       <input type="hidden" name="controller" value="lineDetail"/>
       <button type="submit" name ="action" value ="search">Search</button>
</form>

<table border = 1>
<tr></tr><td>ID_LINE</td><td>ID_ITEM</td><td>Name</td><td>Color</td><td>AMOUNT</td><td>AMOUNT_ADD_ON</td><td>ICID</td><td>line_detail_id</td><td>Update</td><td>delete</td></tr>
<?php foreach($lineDetail as $line)
{
    echo"<tr><td>$line->line_id</td>
            <td>$line->item_id</td>
            <td>$line->item_name</td>
            <td>$line->item_color</td>
            <td>$line->amount</td>
            <td>$line->amount_add_on </td>
            <td>$line->icid</td>
            <td>$line->line_detail_id</td>
            <td>
            <a href=?controller=lineDetail&action=updateFrom&line_detail_id=$line->line_detail_id&line_id=$line->line_id
            >update</a>
            </td>
            <td>
            <a href=?controller=lineDetail&action=deleteConfirm&line_detail_id=$line->line_detail_id
            >delete</a>
            </td>
            </tr>";
}
echo "</table>";

?>



