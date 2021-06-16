<?php
  require_once('config.php');
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php
    $hasil = 'active'; 
    include('navbar.php') ?>
    <!-- Content -->
    <div class="container my-5">
      <canvas id="myChart" ></canvas>    
    </div>

    <?php
      $sql = "SELECT candidates.name, candidates.chart_color'color',COUNT(votes.id)'votes' from votes 
      JOIN candidates on candidates.id = votes.candidate_id
      GROUP BY votes.candidate_id";
      $query = mysqli_query($con,$sql);
      $total_votes = 0;
      while($data = mysqli_fetch_array($query)){
        $nama[] = $data['name'];
        $votes[] = $data['votes'];
        $color[] = $data['color'];
        $total_votes += $data['votes'];
      }
    ?>

    <script>
      new Chart("myChart", {
        type: "bar",
        data: {
          labels: <?php echo json_encode($nama); ?>,
          datasets: [{
            backgroundColor: <?php echo json_encode($color); ?>,
            data: <?php echo json_encode($votes); ?>,
          }]
        },
        options: {
          legend: {display: false},
          title: {
            display: true,
            text: "Hasil Voting <?= date('D, d M Y');?>"
          },
          scales: {
            yAxes: [{
              display: true,
              ticks: {
                suggestedMax :<?=$total_votes;?>,
                beginAtZero:true
              }
            }]
          }
        }
      });
    </script>

    <!-- Optional JavaScript; -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </body>
</html>