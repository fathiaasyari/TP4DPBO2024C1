<?php
include_once("conf.php");
include_once("models/Properti.class.php");
include_once("views/Properti.view.php");

class PropertiController {
  private $properti;

  function __construct(){
    $this->properti = new Properti(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->properti->open();
    $this->properti->getProperti();
    
    $data = array(
      'properti' => array(),
    );
    while($row = $this->properti->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['properti'], $row);
    }

    $view = new PropertiView();
    $view->render($data);
  }

  
  function add($data){
    $this->properti->open();
    $this->properti->add($data);
    $this->properti->close();
    
    header("location:index.php");
  }

  function edit($id){
    $this->properti->open();
    $this->properti->statusBuku($id);
    $this->properti->close();

    header("location:index.php");
  }

  function delete($id){
    $this->properti->open();
    $this->properti->delete($id);
    $this->properti->close();

    header("location:index.php");
  }

}