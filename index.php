<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <img src="img/git.png" rel="icon">

    <title>Ajax Built</title>
</head>

<body>
    <!-- NAV BAR -->
<nav class="navbar navbar-dark bg-info mb-3">
    <div class="container">
      <a href="#" class="navbar-brand">AJAX|Php <i class="fa fa-code"></i></a>
    </div>
</nav>
<!--  -->

<div class="container">
    <!-- SEARCH CONTAINER -->
    <div class="search card card-body ">
    <p class="lead">Custom Search  <i class="fa fa-search"></i></p>
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Keyword here..." >
    </div>
    <!--  -->

    <!-- RESULT DIV -->

    <div class="row mt-2 mx-auto col-md-5" id="result" >
        
    </div>

    <!--  -->

    <!-- FORM FOR ADDING ITEM -->
    <form class="mt-5 " method="post" id="form" action="add.php">
        <p class="lead">Add An Item  <i class="fa fa-plus"></i></p>
        <div class="input-group">
        <input type="text" id="add_item" name="item_name" class="form-control" placeholder="Enter Name here..." Required>
        <button type="submit" class="btn btn-info" id="add_btn">Add Item</button>
        </div>    
    </form>
    <!--  -->

    <!-- LIST OF ITEMS -->
    <div class="row">
    <div class="mt-3 col-md-6" >
        <table class="table">
            <thead>
                <tr>
                    <td>
                        <b>Id</b>
                    </td>

                    <td>
                        <b>Name</b>
                    </td>
                </tr>    
            </thead>

            <tbody id="add_results">
               
            </tbody>
        </table>    
    </div>
    <!--  -->

<style>
.action_center{
    display:none;
}
</style>
    <div class="mt-3 col-md-6 action_center" >
       
    </div>


<div>


</div>














</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/custom.js"></script>

