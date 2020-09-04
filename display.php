<?php
ob_start();
require_once('conn.php');

$sql_pull = mysqli_query($conn,"SELECT * FROM mobiles");

if(!$sql_pull){
    die('Error with pulling'. mysqli_error($conn));
}
?>


<?php
while($row = mysqli_fetch_array($sql_pull)){
    $id = $row['id'];
    $mobile = $row['mobile'];
 ?>

                <tr>
                    
                    <td>
                       <?php echo $id ?> 
                    </td>

                    <td>
                      <a rel="<?php echo $id ?>" class="title" href="javascript:void(0)" style="color:black"> <?php echo $mobile ?></a>
                    </td>

                </tr>
            
 <?php  
}

?>
 
<script>
    $('.title').click(function(){
        $('.action_center').fadeIn();
        const id = $(this).attr('rel');

        $.post('process.php',{id:id},function(callback_data){
        $('.action_center').html(callback_data);

        })

    })
</script>