<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Pemilik.controller.php");

$author = new PemilikController();

if (isset($_POST['add'])) {
    //memanggil add
    $author->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $author->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $author->edit($id);
}
else{
    $author->index();
}

