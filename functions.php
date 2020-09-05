<?php include 'db.php'; ?>
<?php

    function showCreateForm() {
        echo '<h2>Welcome to Product Page</h2>
        <div class="card mt-3">
            <div class="card-body text-center">
                <h3>Add Product</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Description" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Quantity" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Price" autocomplete="off">
                    </div>
                <button type="submit" name="submit" class="btn btn-primary" onclick="createConfirm()">Submit</button>
                </form>
            </div>
        </div>
        <br><a href="products_read.php"><input type="button" class="btn btn-primary btn-lg mr-5" name="back" value="All Products"></a><a href="welcome.php"><input type="button" class="btn btn-primary btn-lg " name="back" value="Home"></a>';
    }

    function createProduct() {
        global $connection;

        $name = $_POST['name'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        $query = "INSERT INTO products(name, description, quantity, price) ";
        $query .= "VALUES ('$name', '$description', '$quantity', '$price')";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die('Query Failed!' . mysqli_error($connection));
        }
    }

    function showProducts() {
        global $connection;
        $query = "SELECT * FROM products";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die('Query Failed!' . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($result)) {
            echo '<tr>
                    <th scope="row">' . $row['SKU_Code'] . '</th>
                        <td>' . $row['Name'] . '</td>
                        <td>' . $row['Description'] . '</td>
                        <td>' . $row['Quantity'] . '</td>
                        <td>' . $row['Price'] . '</td>
                        <td><a href="product_update.php?SKU_Code='.$row['SKU_Code'].'&name='.$row['Name'].'&description='.$row['Description'].'&quantity='.$row['Quantity'].'&price='.$row['Price'].'"><input type="button" class="btn btn-primary btn-lg" value="Edit"></a></td>
                        <td><a href="product_delete.php?SKU_Code='.$row['SKU_Code'].'&name='.$row['Name'].'&description='.$row['Description'].'&quantity='.$row['Quantity'].'&price='.$row['Price'].'"><input type="button" class="btn btn-primary btn-lg" value="Delete"></a></td>
                    </tr>';
        }
    }
        
    function updateProduct() {
        global $connection;
        global $SKU_Code, $name, $description, $quantity, $price;

        $name = $_POST['name'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        $query = "UPDATE products SET ";
        $query .= "name = '$name', ";
        $query .= "description = '$description', ";
        $query .= "quantity = $quantity, ";
        $query .= "price = $price ";
        $query .= "WHERE SKU_Code = $SKU_Code ";
   
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die('Query Failed' . mysqli_error($connection));
        }
        header("Location: products_read.php");
        exit();
    }   

    function deleteProduct() {

        global $connection;
        global $SKU_Code, $name;

        $query = "DELETE FROM products WHERE SKU_Code = $SKU_Code ";
   
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die('Query Failed' . mysqli_error($connection));
        }
        header("Location: products_read.php");
        exit();
    }

?>