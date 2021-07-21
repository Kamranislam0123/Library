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
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered"
                               cellspacing="0" width="100%">
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
                                        <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?=$row['id']?>"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a href="delete.php?bookdelete=<?=base64_encode($row['id'])?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="book-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
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

require_once './footer.php';
?>