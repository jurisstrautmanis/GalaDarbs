<?php 
  require_once __DIR__ . "/database_wrapper.php";

  $id = $_GET["id"];
  $sql = "DELETE FROM todo WHERE id=$id";
  // $dbConnection->query($sql);
  DB::run($sql);

  Header('Location: /gala_uzd/?papa=list')
?>
