<?php include 'functions.php'; ?>
<?php
    session_start();

    if(isset($_POST['submit'])) {
        createProduct();
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
                <?php
                    if(isset($_SESSION['username'])) {
                        showCreateForm();
                    } else {
                        echo "<script>location.href='index.php'</script>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>