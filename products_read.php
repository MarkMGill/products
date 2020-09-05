<?php include 'functions.php'; ?>

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
        <div class="row mx-auto" style="width: 1000px;">
            <div class="col text-center">
                <h2>Welcome to Product Page</h2>
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <h3>Products</h3>
                    </div>
                    <form method="post">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SKU Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php showProducts(); ?>
                        </tbody>
                    </table>
                    </form>
                </div>
                <br>
                <a href="product_create.php"><input type="button" class="btn btn-primary btn-lg mr-5" name="back" value="Create New"></a>
                <a href="welcome.php"><input type="button" class="btn btn-primary btn-lg" name="back" value="Home"></a>
            </div>
        </div>
    </div>  
</body>
</html>