<?php include 'db.php'; ?>
<?php

    function showProducts() {
        global $connection;

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = '';
        }
        
        $perPage = 25;

        if($page == '' || $page == '1') {
            $page_1 = 0;
        } else {
            $page_1 = ($page * $perPage) - $perPage;
        }
        
        $query = "SELECT * FROM products LIMIT $page_1, $perPage";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die('Query Failed!' . mysqli_error($connection));
        }

        $table = '';
        while($row = mysqli_fetch_array($result)) {
            global $table;
            $table .= '<tr id="'.$row['SKU_Code'].'">
                    <th scope="row">' . $row['SKU_Code'] . '</th>
                        <td class="productName">' . $row['Name'] . '</td>
                        <td class="productDesc">' . $row['Description'] . '</td>
                        <td class="productQuantity">' . $row['Quantity'] . '</td>
                        <td class="productPrice">' . $row['Price'] . '</td>
                        <td><input type="button" class="btn btn-primary btn-lg updateBtn" value="Edit" data-toggle="modal" data-target="#updateModal"></td>
                        <td><input type="button" class="btn btn-primary btn-lg deleteBtn" value="Delete" data-toggle="modal" data-target="#deleteModal"></td>
                    </tr>';
        }
        return $table;
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

    function showPaginationLinks() {
        global $connection;
    
        $post_query_count = "SELECT * FROM products";
        $find_count = mysqli_query($connection, $post_query_count);
        $count = mysqli_num_rows($find_count);
    
        $perPage = 25;

        $count = ceil($count / $perPage);
    
        for($i = 1; $i <= $count; $i++) {
            echo '<li class="page-item"><a class="page-link" href="products_read.php?page='.$i.'">'.$i.'</a></li>';
        }
    }

?>

