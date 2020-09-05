<?php include 'functions.php'; ?>
<?php
    $SKU_Code = $_GET['SKU_Code'];
    $name = $_GET['name'];
    $description = $_GET['description'];
    $quantity = $_GET['quantity'];
    $price = $_GET['price'];

    if(isset($_POST['submit'])) {
        updateProduct();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5 pt-5 mb-3">
        <div class="row mx-auto" style="width: 600px;">
            <div class="col text-center">
                <h2>Welcome to Product Page</h2>
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <h3>Edit Product</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" autocomplete="off" value=<?php echo $_GET['name']; ?>>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" autocomplete="off" value=<?php echo $_GET['description']; ?>>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" autocomplete="off" value=<?php echo $_GET['quantity']; ?>>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" autocomplete="off" value=<?php echo $_GET['price']; ?>>
                            </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <br><a href="products_read.php"><input type="button" class="btn btn-primary btn-lg mr-5" name="back" value="All Products"></a><a href="welcome.php"><input type=button class="btn btn-primary btn-lg" name="back" value="Home"></a>
            </div>
        </div>
    </div>
</body>
</html>