<?php
include("connction.php");

$sql = "SELECT * FROM form_data ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-md-12">
        <h2>Specimen Distribution Report list</h2>
        <a class="btn btn-primary" href="index.php">Add New</a>
    </div>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Project Name</th>
                <th>Tso Name</th>
                <th>Zoon/Aria</th>
                <th>Division Name</th>
                <th>Region Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $row) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['project_name']; ?></td>
                    <td><?php echo $row['tso_name']; ?></td>
                    <td><?php echo $row['zoon_aria']; ?></td>
                    <td><?php echo $row['division_name']; ?></td>
                    <td><?php echo $row['region_name']; ?></td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Action
                        </button>
                        <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                            <div style="padding:0px; display: flex; flex-direction: column">
                                <a class="bg-danger text-white text-bold" style="border: 1px solid gray;margin: 3px;text-align: center;border-radius: 4px;font-weight: bold;"  href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                                <a class="bg-primary text-white text-bold" style="border: 1px solid gray;margin: 3px;text-align: center;border-radius: 4px;font-weight: bold;" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a class="bg-success text-white text-bold" style="border: 1px solid gray;margin: 3px;text-align: center;border-radius: 4px;font-weight: bold;" href="print.php?id=<?php echo $row['id']; ?>">Print</a>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>