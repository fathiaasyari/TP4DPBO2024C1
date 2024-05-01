<?php
include_once("conf.php");
include_once("models/Pemilik.class.php");
include_once("views/Pemilik.view.php");

class PemilikController {
  private $pemilik;

  function __construct(){
      $this->pemilik = new Pemilik(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
      $this->pemilik->open();
      $this->pemilik->getPemilik();
      $data = array(
        'pemilik' => array(),
      );
      while($row = $this->pemilik->getResult()){
        array_push($data['pemilik'], $row);
      }
      $this->pemilik->close();

      $view = new PemilikView();
      $view->render($data);
  }

  function add($data){
      $this->pemilik->open();
      $this->pemilik->addPemilik($data);
      $this->pemilik->close();
      
      header("location:pemilik.php");
  }

  function edit($id){
      $this->pemilik->open();
      $this->pemilik->getPemilikById($id);
      $this->pemilik->close();
      
      header("location:pemilik.php?id_edit=" . $id);
  }

  function delete($id){
      $this->pemilik->open();
      $this->pemilik->deletePemilik($id);
      $this->pemilik->close();
      
      header("location:pemilik.php");
  }
}