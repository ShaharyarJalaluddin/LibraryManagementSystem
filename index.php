<?php

require_once("./php/component.php");
require_once("./php/operations.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fa fa-book"></i> Book Store</h1>
        <div class="d-flex justify-content-center">

            <form action="" method="post" class="w-50">
                <div class="py-2">
                    <?php inputForm("<i class='fa fa-id-badge' ></i>", "ID", "book_id", ""); ?>
                </div>

                <div class="pt-2">
                    <?php inputForm("<i class='fa fa-book'></i>", "Book Name", "book_name", ""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputForm("<i class='fa fa-pencil-square'></i>", "Publisher", "book_publisher", ""); ?>
                    </div>
                    <div class="col">
                        <?php inputForm("<i class='fa fa-usd'></i>", "Price", "book_price", ""); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "<i class='fa fa-plus'></i>", "create", "data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                    <?php buttonElement("btn-read", "btn btn-primary", "<i class='fa fa-refresh'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                    <?php buttonElement("btn-update", "btn btn-light border", "<i class='fa fa-pencil'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fa fa-trash'></i>", "delete", "data-toggle='tooltip' data-placement='bottom' title='delete'"); ?>
                    <?php deleteBtn(); ?>
                </div>
            </form>
        </div>

        <!-- Bootstrap Table -->
        <div class="d-flex table-data">
            <table class="table table-stripped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    if (isset($_POST['read'])) {
                        $result = getData();
                        if ($result) {

                            while ($row = mysqli_fetch_assoc($result)) { ?>

                            <tr>
                            <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                            <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                            <td data-id = "<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                            <td data-id = "<?php echo $row['id']; ?>"><?php echo '$' . $row['book_price']; ?></td>
                            <td><i class="fa fa-edit btnedit" data-id = "<?php echo $row['id']; ?>"></i></td>
                            </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="./php/main.js"></script>
</body>

</html>