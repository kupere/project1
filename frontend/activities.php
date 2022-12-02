<?php
include "../backend/db.php";
include "../backend/handle_login.php";




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/db9ef70621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
    <title>Dashboard</title>
</head>




<?php
//selecting data from the database
$sql = "SELECT * FROM `activity`";
#execute query
$result = mysqli_query($link, $sql);

#check
if ($result) {
    $data = mysqli_num_rows($result);
    #is there data here?
    if ($data > 0) {
?>
        <table class="table table-havor m-3 p-2 text-center">
            <tr>
                <th>#</th>
                <th>ACTIVITY NAME</th>
                <th>ACTIVITY DESCRIPTION</th>

              

            </tr>
            



            <?php

            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $name = $row["name"];
                $decription = $row["decription"];

            ?>
                <tr>
                    <td>
                        <?php echo $id ?>
                    </td>
                    <td>
                        <?php echo $name ?>
                    </td>
                    <td>
                        <?php echo $decription ?>
                    </td>


                    <td>
                        <a href="delete_activity.php?id=<?php echo $id  ?>"><span class='fa fa-trash'></span></a>
                    </td>
                    <td>
                        <a href="update_activity.php?id=<?php echo $id  ?>"><span class='fa fa-refresh'></span></a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </table>
        </div>
        <div class="row p-2">
            <div class="col-md-12">
                <a class="btn btn-danger" href="dashboard.php">BACK</a>
            </div>
        </div>
            </body>
    <?php
    } else {
        echo "no records were found in your database!";
    }
}
    ?>
        </div>
        </div>
        </div>

        </div>


        </body>