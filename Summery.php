<?php
include 'inc/header.php';
include 'inc/nav.php';
?>
<style>
  body {
  background-color: #6a9ac4;
  color:white;
}
</style>
<?php
    if(isset($_REQUEST['alias']))
    {
        echo "<pre>";
        print_r($_REQUEST);
    }
?>
<?php

include 'inc/footer.php';
?>