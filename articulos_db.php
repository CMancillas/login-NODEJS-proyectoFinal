<?php

$username = "root";
$password = "";
$database = "articulos_db";

try{
  $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  die("ERROR: Could not connect. " . $e->getMessage());
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Creating DB the connection | Chart JS Mysql Database Series</title>
    <style type="text/css">
      .chartBox{
        width: 700px;
      }
    </style>
  </head>
  <body>

    <?php 
    // Attempt select query execution
    try{
      $sql = "SELECT * FROM articulos_db.articulos";   
      $result = $pdo->query($sql);
      if($result->rowCount() > 0) {
        $descripcion = array();
        $precio = array();
        $stock = array();

        while($row = $result->fetch()) {
          $descripcion[] = $row["descripcion"];
          $precio[] = $row["precio"];
          $stock[] = $row["stock"];
        }

      unset($result);
      } else {
        echo "No records matching your query were found.";
      }
    } catch(PDOException $e){
      die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    
    // Close connection
    unset($pdo);
    ?>


  <div class="chartBox">
    <canvas id="myChart"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  
  // Setup Block
  
  const descripcion = <?php echo json_encode($descripcion); ?>;
  const precio = <?php echo json_encode($precio); ?>;
  const stock = <?php echo json_encode($stock); ?>;
    
  const data = {
    labels: ['Coca Cola', 'Galletas Oreo', 'Vino Malbec', 'Desodorante Axe', 'Arroz', 'Tortillas', 'Frijoles', 'Leche', 'Agua', 'Queso'],
    datasets: [{
      label: 'Precio',
      data: precio,
      borderWidth: 1
    }, {
      label: 'Stock',
      data: stock,
      borderWidth: 1
    }]
  };  
    
  // Config Block
  const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }

  }; 
    
  // Render Block
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
    
    
  </script>

   
  <a href="php/cerrar_sesion.php">Cerrar sesion</a>
    
    
  </body>
</html>
