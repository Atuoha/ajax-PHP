<?php
ob_start();
require_once('conn.php');
global $conn;


// PREVIEWING EDIT ITEM CODE
    $id =  $_POST['id'];
    $sql_pull_details = mysqli_query($conn,"SELECT * FROM mobiles WHERE id = '$id' ");
    if(!$sql_pull_details){
        die('Error with pulling details '.mysqli_error($conn));
    }

    while($row = mysqli_fetch_array($sql_pull_details)){
        $mb_id = $row['id'];
        $mobile = $row['mobile'];
    }

  ?>
            <!-- FORM FOR EDITING ITEM -->
    <form class="mt-5 " method="post" id="form_edit">
        <p class="lead">Edit Item  <i class="fa fa-pencil"></i></p>
        <div class="input-group">
        <input type="text" id="add_item" value="<?php echo $mobile ?>" name="mobile_name" class="form-control" placeholder="Enter Name here...">
        <input type="hidden" name="mobile_id" id="mobile_id" value="<?php echo $id ?>">

        <button type="submit" class="btn btn-success" name="edit" id="add_btn">Edit Item</button>
        <button  class="btn btn-secondary"  id="remove_btn">Remove Item</button>
        <button  class="btn btn-danger"  id="cancel_btn">Cancel</button>

        </div>    
    </form>
    <!--  -->
  <?php  


























// EDITTING CODDE
if(isset($_POST['mobile_id'])){
    $edit_id = $_POST['mobile_id'];
    $editing_name = $_POST['mobile_name'];
   
     if(!empty($_POST['mobile_name'])){
            $sql_edit = mysqli_query($conn,"UPDATE mobiles SET mobile = '{$editing_name}' WHERE id = '$edit_id' ");
            if(!$sql_edit){
                die('Error with editing ' . mysqli_error($conn));
            }
            // header('location:index.php');

        }
}  



// Deleting Code
if(isset($_POST['del_id'])){
     $del_id = $_POST['del_id'];
    
    $sql_remove = mysqli_query($conn,"DELETE FROM mobiles WHERE id = '$del_id' ");
    if(!$sql_remove){
        die('Error with deleting ' . mysqli_error($conn));
    }
    // header('location:index.php');
 
 }  
 
?>




<script>


//EDITING SCRIPT 

    $('#form_edit').submit(function(e){
        e.preventDefault();
        const postData = $(this).serialize();

        $.post('process.php',postData,function(callback_data){
            // alert('alert alert-success','Edit Success');
            const div = document.createElement('div');
            div.className = 'alert alert-success';
            div.appendChild(document.createTextNode('EDIT SUCCESS'));
            document.querySelector('.action_center').appendChild(div);
            setTimeout(() => {
            const element =  document.querySelector('.alert');
            element.style.display = 'none';
            $('.action_center').fadeOut();
            }, 2000);
           
        })

    })



//Deleting Data Script
$('#remove_btn').click(function(e){
    e.preventDefault();

    const del_id = $('#mobile_id').attr('value');
if(confirm('Do you want to delete this')){
    $.ajax({
        url:'process.php',
        data:{del_id:del_id},
        type:'POST',
        success: function(data){
            if(!data.error){
                const div = document.createElement('div');
            div.className = 'alert alert-success';
            div.appendChild(document.createTextNode('DELETE SUCCESS'));
            document.querySelector('.action_center').appendChild(div);
            setTimeout(() => {
            const element =  document.querySelector('.alert');
            element.style.display = 'none';
            $('.action_center').fadeOut();
            }, 2000);
            }
        }
    })

}  
})    




// cancel script

$('.cancel_btn').click(function(){
    $('.action_center').fadeOut();
})
</script>


