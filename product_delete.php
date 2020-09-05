<?php include 'functions.php'; ?>
<?php
    $SKU_Code = $_GET['SKU_Code'];
    $name = $_GET['name'];

    if(isset($_POST['delete'])) {
        deleteProduct();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Product</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
                <p><?php echo $name; ?></p>
                <form method="post">
                    <a href="products_read.php"><button type="submit" name="delete" class="btn btn-danger">Delete</button></a>
                    <a href="products_read.php"><input type="button" class="btn btn-light" value="Cancel"></a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // show modal on page load
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</html>