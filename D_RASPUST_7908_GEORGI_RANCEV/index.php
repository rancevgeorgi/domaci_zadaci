
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Citati</title>
    <link rel="stylesheet" href="stil.css">
</head>

<?php 
    $images = ["cvet.jpg", "kolaci.jpg", "labud.jpg", "pas.jpg", "priroda.jpg", "sampanjac.jpg", "sat.jpg", "ukras.jpg", "vatra.jpg", "zena.jpg"];
  shuffle($images);
?>

<body>
<div class="container-fluid">
  <div class="container">
    <h1><a class ="h1" href="./">Citati</a></h1>
    <div class="carousel slide carousel-fade" id="featured" data-ride="carousel">
      <ul class="carousel-indicators">
      <?php for ($i=0; $i < 3; $i++) { ?>
        <li data-target="#featured" data-slide-to="<?php echo $i; ?>" class="<?php if ($i == 0) { echo "active";} ?>"></li>
      <?php } ?>
      </ul>
    
      <div class="carousel-inner">
      <?php for ($i=0; $i < 3; $i++) { ?>
        <div class="carousel-item <?php if ($i == 0) { echo "active";} ?>">
          <img  class="d-block w-100" src="images/<?php echo $images[$i]; ?>" alt="cvet">
        </div>
      <?php } ?>
      </div>
      <a class="carousel-control-prev" href="#featured" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#featured" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>

  <?php
      $files = ["ljubav.txt", "motivacija.txt", "posao.txt", "zdravlje.txt"];
      shuffle($files);
      $file = $files[0];
  
      if(isset($_GET["category"])) 
      {
          $file = $_GET["category"] . ".txt";
      }
  
      $txtFile = file($file);
      $totalLines = count($txtFile);
      $lastIndex = $totalLines -1;
      $randIndex = rand(0, $lastIndex);
      $randomTekst = $txtFile[$randIndex];
  
      if ($randIndex % 2 == 0)
      {
          $quote = $randomTekst;
          $author = $txtFile[$randIndex + 1];
      }
      else
      {
          $quote = $txtFile[$randIndex - 1];
          $author = $randomTekst;
      }
  
  ?>
  <div class="container ">
      <div class="row">
        <div class="col-sm-4">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?category=ljubav">Ljubav</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?category=motivacija">Motivacija</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?category=posao">Posao</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?category=zdravlje">Zdravlje</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-8 pt-4">
          <h2> <?php echo $quote; ?> </h2>
          <p><?php echo $author; ?></p>
        </div>
      </div>
  </div>
  <footer class="fixed-bottom">
    <?php 
      echo date('d. F Y');
      echo "<br>";
      echo date('H:i');
    ?>
  </footer>
</div>
</body>
</html>