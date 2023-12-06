<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <?php include '../includes/header-admin.php'; ?>

    <form class="container mt-5 p-3 w-50" method="post">
        <div class="form-group row">
            <div class="col-12 text-signup text-center">
                Sign in
            </div>
        </div>
        <div class="form-group row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-8 custom-form">
                <input class="form-control" type="text" id="email" name="email" placeholder="Email address"required>
            </div>
        </div>
        <div class="form-group row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-8 custom-form">
                <input class="form-control" type="text" id="password" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6 mt-3">
                <button class="form-control custom-btn btn" type="submit" name="submit">Submit</button>
            </div>
        </div>
    </form>

</body>

</html>