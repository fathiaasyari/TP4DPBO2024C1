<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Properti.controller.php");

$properti = new PropertiController();

if (isset($_POST['add'])) {
    //memanggil add
    $properti->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $properti->delete($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $properti->edit($id);
} else{
    $properti->index();
}
