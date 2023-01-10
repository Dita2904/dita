<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "shopping";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //ngecek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$name       = "";
$coffee      ="";
$quantity   = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from products where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Success delete data";
    }else{
        $error  = "Failed detele data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from products where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $name       = $r1['name'];
    $coffee    = $r1['coffee'];
    $quantity     = $r1['quantity'];
 

    if ($name == '') {
        $error = "Data not found";
    }
}
if (isset($_POST['simpan'])) { //buat create
   $name       = $_POST['name'];
   $coffee      = $_POST['coffee'];  
    $quantity     = $_POST['quantity'];


    if ($name && $coffee && $quantity ) {
        if ($op == 'edit') { //buat update
            $sql1       = "update products set name='$name',coffee='$coffee',quantity = '$quantity' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data successful updated";
            } else {
                $error  = "Data failed updated";
            }
        } else { //untuk insert
            $sql1   = "insert into products(name,coffee,quantity) values ('$name','$coffee','$quantity')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Success input new data";
            } else {
                $error      = "Failed to input data";
            }
        }
    } else {
        $error = "Insert all data";
    }
}
?>




<! DOCTYPE html>
<html lang="en">
<head>
    <meta charsed="UTF-8">
    <title>Order | Home </title>
    <link rel="stylesheet" href="CSS2(2).css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,300&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>

<body>

    
    <div style ="background-color: #dddd;">



    <div class ="header">
    <div class="header-part">
        <div class="logo"><h1> Basic Coffee</h1>
        </div>
<div class="navbar">
    <ul class="menu">
       <li><a href="Main web.php">Home</a></li>
        <li><a href="index.php">Order</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
</div>
</div>
</div>
<div class="content2">
    <br>
    <br>
    <br>
    <br>

<div class="mx-auto">
        <!-- buat memasukkan data -->
        <div class="card">
            <div class="card-header">
                Please fill in your data to add to cart
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=orindex.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                        </div>
                    </div>

                     <div class="mb-3 row">
                        <label for="coffee" class="col-sm-2 col-form-label">Coffee</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="coffee" id="coffee">
                                <option value="">- Choose Coffee -</option>
                                <option value="arabica"<?php if ($coffee == "Arabica") echo "selected" ?>>Arabica Rp.75000 </option> 
                                <option value="robusta" <?php if ($coffee == "Robusta") echo "selected" ?>>Robusta Rp.72000</option>
                                

                                <option value="toraja" <?php if ($coffee == "Toraja") echo "selected" ?>>Toraja Rp.76000</option>
                                <option value="kolombia" <?php if ($coffee == "Kolombia") echo "selected" ?>>Kolombia Rp.76000</option>
                                <option value="Liberika" <?php if ($coffee == "Liberika") echo "selected" ?>>Liberika Rp.76000</option>
                                <option value="Kintanami" <?php if ($coffee == "Kintanami") echo "selected" ?>>Kintanami Rp.76000</option>
                                <option value="Java Ijen" <?php if ($coffee == "Java Ijen") echo "selected" ?>>Java Ijen Rp.75000</option>
                                <option value="Wamena" <?php if ($coffee == "Wamena") echo "selected" ?>>Wamena Rp.74000</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity ?>">
                        </div>
                    </div>

                   


                    <div class="col-12">
                        <input type="submit" name="simpan" value="Add to Cart" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
               Your Cart
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Coffee</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from products order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                                  $id         = $r2['id'];
                            $name      = $r2['name'];
                            $coffee      = $r2['coffee'];
                            $quantity    = $r2['quantity'];

                        ?>
                            < <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $name ?></td>
                                    <td scope="row"><?php echo $coffee ?></td>
                                <td scope="row"><?php echo $quantity ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
                <a href="form.php"><button class ="button">Order</button></a>

            </div>
        </div>
    </div>
<h4>***Press order if you are ready to order </h4> 

</div>
</div>
</div>
<div class="footer">
    <br>
    <p>dita regita</p> 
</div>


</body>
</html>

