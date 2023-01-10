<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "shopping";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$name           = "";
$address        = "";
$phonenumber    = "";
$zipcode        = "";
$sukses         = "";
$error          = "";


if (isset($_POST['simpan'])) { //untuk create
    $name       = $_POST['name'];
    $address   = $_POST['address'];
    $phonenumber  = $_POST['phonenumber'];
    $zipcode   = $_POST['zipcode'];

   if($name && $address && $phonenumber && $zipcode){
    $sql1   ="insert into customer(name,address,phonenumber,zipcode) values ('$name','$address','$phonenumber','$zipcode')";
    $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Thank you for filling in your data, please confirm via CS on the WA contact listed";
            } else {
                $error      = "Failed enter a data";
            }
   }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data | Basic Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
     
        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h3>Thank you for purchasing, after your fill your data , you must confirm to our CS 082369988298(Whatsapp) for</h3>
    <h3>confirm your order and send proof of your payment</h3>
    <br>
    <br>
    <h5>Payments are only made through the Bank account below:</h5>
        <h5>BNI 9274814749</h5>
        <h5>in the name of Basic coffee-customer</h5>
         <br>
         
      


  <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Please fill in the personal data form with the actual data, because the shipping address will be sent based on the data you fill in. 
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                 
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                 
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
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="zipcode" class="col-sm-2 col-form-label">Zip code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $zipcode ?>">
                        </div>
                    </div>
                   

                    <div class="col-12">
                        <input type="submit" name="simpan" value="Submit" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        
            </div>
        </div>
    </div>
</body>

</html>