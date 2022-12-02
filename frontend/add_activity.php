<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/db9ef70621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="m-3 p-3">

    <form class="form" action="../backend/handle_activity.php" method="post">
        <h1 class="login-title mb-2"><b><u>Add Activity</u></b></h1>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Activity Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Activity Name">
                
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label" >Activity Description</label>
            <div class="col-sm-10">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="description" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Activity Description</label>
                </div>
            </div>
        </div>
       
        <input type="submit" name="add_activity" value="ADD" class="login-button float-center">

    </form>

</body>

</html>