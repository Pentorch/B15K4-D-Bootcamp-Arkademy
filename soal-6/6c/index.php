<?php
// require function.php
require 'functions.php';
// tampilkan data ke tabel, jalankan fungsi
$data = query("SELECT cashier.name as cashier, cashier.id as cashier_id, product.name as product, category.id as category_id, category.name as category, product.price, product.id as product_id FROM product INNER JOIN cashier ON product.id_cashier = cashier.id INNER JOIN category ON product.id_category = category.id ORDER BY product.id DESC;");
// modal add
$data_cashier = query("SELECT cashier.id as cashier_id, cashier.name as cashier_name  FROM cashier");
$data_category = query("SELECT category.id as category_id, category.name as category_name  FROM category");
// 
// $data_edit = query("SELECT cashier.id as cashier_id, cashier.name as cashier_name, ")
// var_dump($data);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arkademy</title>
    <link href="assets/img/favicon.ico" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap online -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- boostrap offline -->
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
    <!-- self css -->
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>

<!-- menu -->
<nav class="menu navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/img/logo_arkademy.png" alt="logo" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <input class="form-control mr-sm-2 btn-lg" type="search" placeholder="Search" aria-label="Search" size="165">
                </li>
            </ul>
        </div>
        <!-- button add -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="col-md text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning text-white btn-lg" data-toggle="modal" data-target="#modalAdd">
                    ADD
                </button>
            </div>
        </div>
    </div>
</nav>
<!-- container body -->
<div class="container">
    <!-- tabel -->
    <div class="row mt-5 mb-5">
        <div class="col-md">
            <table class="table">
                <tr class="tb-head p-4 mb-2 bg-warning text-white">
                    <th>No</th>
                    <th>Cashier</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php $no=1; ?>
                <?php foreach ($data as $row): ?>
                    <tr class="tb-body">
                        <td><b><?= $no; ?></b></td>
                        <td><?= $row['cashier']; ?></td>
                        <td><?= $row['product']; ?></td>
                        <td><?= $row['category']; ?></td>
                        <td><?= $row['price']; ?></td>
                        <td>
                            <a class="action" href="index.php?id=<?= $row['product_id']; ?>">
                                <button type="button" class="btn-edit-delete" data-toggle="modal" data-target="#modalEdit">
                                    <span style="color: lightgreen;"><i class="fa fa-edit"></i></a></span>
                                </button>
                            </a>
                            |
                            <a class="action" href="hapus.php?id=<?= $row['product_id']; ?>">
                                <button type="button" class="btn-edit-delete" data-toggle="modal" data-target="#modalDelete">
                                    <span style="color: red;"><i class="fa fa-trash-o"></i></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div><!-- end container -->

<!-- MODALS -->
<!-- Modal ADD -->
<!-- PHP -->
<?php
    // ketika button add ditekan
    if(isset($_POST['btn-add'])){
        // jalankan method tambah, sebari cek jika fungsi tambah me-return nilai lebih dari nol(0)
        if(tambah($_POST) > 0){
            // maka berhasil
            echo "
                <script>
                    // alert('berhasil menambahkan data!');
                    document.location.href = 'index.php';
                    </script>
                    ";
                }else{
                echo "
                <script>
                    // alert('gagal menambahkan data!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
    // var_dump(tambah($_POST));
?>
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content modal-radius">
    <div class="modal-header no-border">
        <!-- <div class="row"> -->
            <div class="col-md pl-4 pt-3" style="background:;">
                <h5 class="modal-title" id="exampleModalCenterTitle">ADD</h5>
            </div>
            <div class="col-md pr-2" style="background:;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    <img src="assets/img/close_button.png" alt="close" width="25">
                </button>
            </div>
        <!-- </div> -->
    </div>
    <div class="modal-body modal-body-padding">
        <!-- input form -->
        <form action="" method="post">
            <div class="form-group">
                <div class="select-side" id="click-me">
                    <!-- <label for="sel1"> -->
                        <!-- <img src="assets/img/downwards-arrow-key.png" alt="arrow" width="30"> -->
                    <!-- </label> -->
                </div>
                <select name="cashier" class="form-control form-control-lg placeholder appearance-none no-border border-bot" id="sel1">
                    <?php foreach( $data_cashier as $row ): ?>
                        <option value="<?= $row['cashier_id']; ?>"><?= $row['cashier_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <div class="select-side" id="click-me">
                    <!-- <label for="sel1"> -->
                        <!-- <img src="assets/img/downwards-arrow-key.png" alt="arrow" width="30"> -->
                    <!-- </label> -->
                </div>
                <select name="product" class="form-control form-control-lg placeholder appearance-none no-border border-bot" id="sel1">
                    <?php foreach( $data as $row ): ?>
                        <option value="<?= $row['product']; ?>"><?= $row['product']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="form-group">
                <input name="product" class="form-control form-control-lg placeholder no-border border-bot" type="text" placeholder="Product .." value="">
            </div> -->
            <div class="form-group">
                <div class="select-side"></div>
                <select name="category" class="form-control form-control-lg placeholder appearance-none no-border border-bot" id="sel2">
                    <?php foreach( $data_category as $row ): ?>
                        <option value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input name="price" class="form-control form-control-lg placeholder no-border border-bot" type="text" placeholder="Price .." value="">
            </div>
    </div>
    <div class="modal-footer no-border pr-5 pb-4">
        <button type="submit" class="btn-add bg-warning" name="btn-add">ADD</button>
        </form>
    </div>
    </div>
</div>
</div>
<!-- end modal ADD -->

<!-- modal DELETE -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-radius">
            <div class="modal-header no-border">
                <div class="col-md pr-2" style="background:;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="assets/img/close_button.png" alt="close" width="25">
                    </button>
                </div>
            </div>
            <div class="modal-body text-center">
                <p class="placeholder mb-4">Data Raisa Adriani ID <span style="color:#FF8FB2;">#1</span></p>
                <img src="assets/img/checked.png" alt="checked" width="110">
                <p class="placeholder mt-4 mb-5">berhasil dihapus</p>
            </div>
        </div>
    </div>
</div>
<!-- end moda DELETE -->

<!-- Modal EDIT -->
<?php
// 
if(isset($_POST['btn-edit'])){
    // 
    if(edit($_POST) > 0){
        // berhasil
        echo "
            <script>
                // alert('data berhasil diubah');
                document.location.href = 'index.php';
                </script>
                ";
            }else{
                // gagal
            echo "
            <script>
                // alert('data gagal diubah');
            document.location.href = 'index.php';
            </script>
            ";
        }
    }
// ambil id 
    $id = $_GET['id'];
    // var_dump($id>0);
?>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content modal-radius">
    <div class="modal-header no-border">
        <!-- <div class="row"> -->
            <div class="col-md pl-4 pt-3" style="background:;">
                <h5 class="modal-title" id="exampleModalCenterTitle">EDIT</h5>
            </div>
            <div class="col-md pr-2" style="background:;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.location.href = 'index.php';">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    <img src="assets/img/close_button.png" alt="close" width="25">
                </button>
            </div>
        <!-- </div> -->
    </div>
    <div class="modal-body modal-body-padding">
        <!-- input form -->
        <form action="" method="post">
        <div class="form-group">
            <input type="hidden" value="<?= $id; ?>" name="id_product">
            <div class="select-side" id="click-me">
                <!-- <label for="sel1"> -->
                    <!-- <img src="assets/img/downwards-arrow-key.png" alt="arrow" width="30"> -->
                <!-- </label> -->
            </div>
            <select name="cashier" class="form-control form-control-lg placeholder appearance-none no-border border-bot" id="sel1">
                <?php foreach( $data_cashier as $row ): ?>
                    <!-- hanya menampilkan data cashier yang sesuai -->
                    <?php if( $row['cashier_id'] === $id ){ ?>
                        <option selected value="<?= $row['cashier_id']; ?>"><?= $row['cashier_name']; ?></option>
                    <?php } else{ ?>
                        <option value="<?= $row['cashier_id']; ?>"><?= $row['cashier_name']; ?></option>
                    <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" value="<?= $id; ?>" name="id_product">
            <div class="select-side" id="click-me"></div>
            <select name="product" class="form-control form-control-lg placeholder appearance-none no-border border-bot" id="sel1">
                <?php foreach( $data as $row ): ?>
                    <!-- hanya menampilkan data cashier yang sesuai -->
                    <?php if( $row['product_id'] === $id ){ ?>
                        <option selected value="<?= $row['product']; ?>"><?= $row['product']; ?></option>
                    <?php } else{ ?>
                        <option value="<?= $row['product']; ?>"><?= $row['product']; ?></option>
                    <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <div class="select-side"></div>
            <select name="category" class="form-control form-control-lg placeholder appearance-none no-border border-bot" id="sel2">
                <?php foreach( $data_category as $row ): ?>
                    <?php if( $row['category_id'] === $id ){ ?>
                        <option selected value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
                    <?php }else{ ?>
                        <option value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
                    <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
        <?php foreach( $data as $row ): ?>
            <?php if( $row['product_id'] === $id ): ?>
            <input name="price" class="form-control form-control-lg placeholder no-border border-bot" type="text" placeholder="Price .." value="<?= $row['price']; ?>">
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="modal-footer no-border pr-5 pb-4">
        <button type="submit" class="btn-add bg-warning" name="btn-edit">EDIT</button>
        </form>
    </div>
    </div>
</div>
</div>
<!-- end moda EDIT -->

<!-- js online -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<!-- js offline-->
<script src="assets/js/jquery-3.4.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- self js -->
<script>
    // modal edit show ketika ada id di url
    if(<?= $id; ?> > 0){
        $('#modalEdit').modal('show')
    }
</script>

</body>
</html>
