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
        <div class="container mt-5 pt-5">
            <div class="row mx-auto" style="width: 600px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="welcome.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter Username" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>