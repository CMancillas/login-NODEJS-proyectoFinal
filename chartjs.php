<?php

$username = "root";
$password = "";
$database = "chartjs";

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
      $sql = "SELECT * FROM chartjs.barchart";   
      $result = $pdo->query($sql);
      if($result->rowCount() > 0) {
        $revenue = array();
        $cost = array();
        $profit = array();

        while($row = $result->fetch()) {
          $revenue[] = $row["revenue"];
          $cost[] = $row["cost"];
          $profit[] = $row["profit"];
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
  
  const revenue = <?php echo json_encode($revenue); ?>;
  const cost = <?php echo json_encode($cost); ?>;
  const profit = <?php echo json_encode($profit); ?>;
    
  const data = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'ABC', '8', '9', '10'],
    datasets: [{
      label: '# of Votes',
      data: revenue,
      borderWidth: 1
    }, {
      label: '# of Votes',
      data: cost,
      borderWidth: 1
    },{
      label: '# of Votes',
      data: profit,
      borderWidth:1
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

   
    
    
    
  </body>
</html>
