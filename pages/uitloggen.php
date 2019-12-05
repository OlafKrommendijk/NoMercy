<!--Zo kan de admin uitloggen-->

<?php
include('../header.php');
//maakt de session kapot.
session_destroy();
echo "<script> location.href='http://localhost/NoMercy/index.php'; </script>";

?>