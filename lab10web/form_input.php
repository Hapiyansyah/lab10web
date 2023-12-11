<?php
include "form.php";
echo "<html><head><title>Mahasiswa</title></head><body>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="container">
        <?php
        // Create a new instance of the Form class
        $form = new Form("", "Input Form");

        // Add fields to the form
        $form->addField("txtnim", "Nim");
        $form->addField("txtnama", "Nama");
        $form->addField("txtalamat", "Alamat");

        echo "<h3>Silahkan isi form berikut ini :</h3>";

        // Display the form
        $form->displayForm();
        ?>
    </div>
</body>
</html>
