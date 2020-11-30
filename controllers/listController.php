<?php

require_once __DIR__ . "/../database_wrapper.php";


$sql = "SELECT * FROM todo";
$response = DB::run($sql)->fetch_all(MYSQLI_ASSOC);

if (isset($_GET["id"])) {
  $sql = "SELECT * FROM todo WHERE id=" . $_GET["id"];
  $product = DB::run($sql)->fetch_assoc();
}

if (!empty($_POST["id"])) {
  $name = $_POST["name"];
  $id = $_POST["id"];
  $updateSql = "UPDATE todo SET name='$name' WHERE id=$id";

  DB::run($updateSql);

  Header("Location: /gala_uzd/?papa=list");
} else if (isset($_POST["id"])) { 
  $name = $_POST["name"];
  $addSql = "INSERT INTO todo (name) VALUES ('$name')";

  DB::run($addSql);

  Header("Location: /gala_uzd/?papa=list");
}

if (isset($_POST["logOut"])) {
  session_destroy();
  Header("Location: /gala_uzd/?papa=login");
}
?>
<!-- ---------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product list</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body style="display:flex; justify-content:center; flex-wrap:wrap; ">


<form method="POST" style="display:flex;  width:100%; justify-content:center; padding:5px 0 10px 0; ">
      <input type="hidden" name="logOut">
      <button type="submit">Log out</button>
  </form>

  <table style="border:1px solid pink; border-radius:8px; padding:20px 50px 50px 50px; display:flex; flex-direction:column; width:max-content; background:rgba(160,23,32, 0.04); font-family:Arial, Helvetica, sans-serif;">
    <thead >
      <tr style="display:flex; justify-content:center;">
        <td colspan="3" style="font-size:larger; padding:10px 0;">TODO list</td>
      </tr>
      <tr style="display: flex;">
        <td style=" padding: 0 10px;">Name</td>
        <!-- <td >Checkbox</td> -->
        <td></td>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($response as $products) { ?>
        <tr>

          <td style="display: flex; padding: 0 10px; "><?= $products['name'] ?></td>
          <td><input type="checkbox" name="checkbox" id="checkbox" onchange="checked()"></td>
          <td >
            <a href="#editlogs/?id=<?= $products["id"] ?>" style="padding-left: 60px;">Edit</a>
            <a href="/gala_uzd/delete.php?id=<?= $products["id"] ?>" >Delete</a>
          </td>

        </tr>
      <?php } ?>
    </tbody>
  </table>

        <div style="display:flex;  width:100%; justify-content:center; padding:20px;">
          <form method="POST" id="editlogs" class="editlogs"  >
            <input name="name" value="<?= $products["name"] ?? '' ?>">
            <input type="hidden" name="id" class="id" value="<?= $products["id"] ?? ''  ?>">
            <button >Save</button>

          </form>
        </div>

</body>
</html>