<?php
include 'inc/header.php';
include 'inc/nav.php';
?>
<style>
  body {
  background-color: #6a9ac4;
}
</style>

<h1 class="n5 text-light" align="center">Couse Page</h1>
<div class="container my-5 ">
  <div class="row m-auto d-flex justify-content-center">
    
    <?php
  
  for($i=0;$i<10;$i++)
  {
    $no=200+$i
    ?>
    <div class="card m-3 rounded" style="width: 25rem;">
  <img src="https://source.unsplash.com/200x200/?code,language,computer<?= $no?>" class="card-img-top h-50" alt="..." style="">
  <div class="card-body">
    <h1>Python</h1>
    <p class="card-text small">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <div class="d-flex justify-content-end">
    <a href="Summery/<?= $i+1 ?>" class="btn btn-secondary ">cart <i class='fas fa-shopping-cart'></i> </a>
    </div>
  </div>
  
 
</div>
    
    <?php
  }
  
  ?>
  </div>
</div>
    <?php

include 'inc/footer.php';
?>