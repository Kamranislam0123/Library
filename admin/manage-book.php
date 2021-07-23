<?php
require_once './header.php';
?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a herf="javascript:avoid(0)">Manage books</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Students</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Book Author Name</th>
                                <th>Book Publication Name</th>
                                <th>Book Price</th>
                                <th>Book Quantity</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($con, query: "SELECT * FROM `books`");
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>

                                    <td><?= $row['book_name'] ?></td>
                                    <td><img style="width: 60px;" src="../images/books/<?= $row['book_image'] ?>"></td>
                                    <td><?= $row['book_author_name'] ?></td>
                                    <td><?= $row['book_publication_name'] ?></td>
                                    <td><?= $row['book_price'] ?></td>
                                    <td><?= $row['book_qty'] ?></td>
                                    <td>
                                        <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id'] ?>"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                                        <a href="delete.php?bookdelete=<?= base64_encode($row['id']) ?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$result = mysqli_query($con, query: "SELECT * FROM `books`");
while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="modal fade" id="book-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Book Name</th>
                            <td><?= $row['book_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Image</th>
                            <td><img style="width: 60px;" src="../images/books/<?= $row['book_image'] ?>"></td>
                        </tr>
                        <tr>
                            <th>Book Author Name</th>
                            <td><?= $row['book_author_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Publication Name</th>
                            <td><?= $row['book_publication_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Price</th>
                            <td><?= $row['book_price'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Quantity</th>
                            <td><?= $row['book_qty'] ?></td>
                        </tr>

                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
$result = mysqli_query($con, query: "SELECT * FROM `books`");
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $book_info = mysqli_query($con, query: "SELECT *FROM `books` WHERE `id`='$id'");
    $book_info_row = mysqli_fetch_assoc($book_info);
?>
    <div class="modal fade" id="book-update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i> Update Book Info</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="book_name">Book Name</label>
                                            <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" value="<?= $book_info_row['book_name'] ?>">
                                            <input type="hidden" class="form-control" name="id" value="<?= $book_info_row['id'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name">Author Name</label>

                                            <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Author Name" value="<?= $book_info_row['book_author_name'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name"> Publication
                                                Name</label>

                                            <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Publication Name" value="<?= $book_info_row['book_publication_name'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_image"> Book Image</label>

                                            <input type="file" class="form-control" id="book_image" name="book_image" placeholder="Book Image">
                                            <img style="width: 60px;" src="../images/books/<?= $book_info_row['book_image'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_price"> Book Price</label>

                                            <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book Price" value="<?= $book_info_row['book_price'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty"> Book Quantity</label>

                                            <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity" value="<?= $book_info_row['book_qty'] ?>">

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="update-book" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
<?php
}
if (isset($_POST['update-book'])) {
    $book_name = $_POST['book_name'];
    $id = $_POST['id'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];



    if ($result) {
        $result = mysqli_query($con, query: "UPDATE `books` SET `book_name`='$book_name',`book_author_name`=' $book_author_name
',`book_publication_name`='$book_publication_name',`book_price`=' $book_price',`book_qty`='$book_qty',`librarian_username`='',`datetime`='' WHERE `id`='$id'");
    }
}
?>

<?php require_once './footer.php'; ?>