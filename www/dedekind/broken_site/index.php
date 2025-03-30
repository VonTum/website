<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body {
        background-color: #eeeeff;
      }
      .content{
        background-color: #aaccff;
        border: 1px solid rgba(0, 0, 0, 0.8);
      }
      .header-container{
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        text-align: center;
        margin: 0.4em;
      }
      .header-item {
        border: 1px solid rgba(0, 0, 0, 0.8);
        background-color: #2196F3;
        margin: 0.5em 0.1em 0.5em 0.1em;
        padding: 0.5em;
      }
      .task-grid-container {
        line-height: 0px;
        padding: 0px 8px 0px 8px;
      }
      .fpga-grid-container {
        text-align: center;
        padding: 0px 8px 0px 8px;
        margin: 8px 8px 8px 8px;
        margin: 0.5em 0.5em 0.5em 0.5em;
      }
      .fpga-grid-container > div {
        width: 150px;
        display: inline-block;
        border: 0.1em solid rgba(0, 0, 0, 0.8);
        margin: 0.1em;
        padding: 0.5em;
      }
      .active {
        background-color: #00FF00;
      }
      .inactive {
        background-color: #AAAAAA;
      }
      .task-grid-container > div {
        height: 5px;
        width: 5px;
        display: inline-block;
        line-height: 0px;
        padding: 0;
        margin: 0;
        border: 0px solid rgba(0, 0, 0, 0.8);
        border-style: solid;
        border-color: grey;
        border-width: thin;
      }
      .done {
        background-color: #00FF00;
      }
      .running {
        background-color: #FFA500;
      }
      .failed {
        background-color: #FF0000;
      }
      .waiting {
        background-color: #AAAAAA;
      }
    </style>
  </head>
  <body>
    <?php
      header("refresh: 10");
      $mysqli = mysqli_connect("localhost", "lennart", "", "dedekind");

      echo "<div class='content'>";
        echo "<div class='header-container'>";
          $result = mysqli_query($mysqli, "SELECT count(*) FROM tasks");
          $row = mysqli_fetch_assoc($result);
          echo "<div class='header-item'>Total: " . $row['count(*)'] . "</div>";

          $result = mysqli_query($mysqli, "SELECT count(*) FROM tasks where status = 'waiting'");
          $row = mysqli_fetch_assoc($result);
          echo "<div class='header-item'>Waiting: " . $row['count(*)'] . "</div>";

          $result = mysqli_query($mysqli, "SELECT count(*) FROM tasks where status = 'running'");
          $row = mysqli_fetch_assoc($result);
          echo "<div class='header-item'>Running: " . $row['count(*)'] . "</div>";

          $result = mysqli_query($mysqli, "SELECT count(*) FROM tasks where status = 'done'");
          $row = mysqli_fetch_assoc($result);
          echo "<div class='header-item'>Completed: " . $row['count(*)'] . "</div>";

          $result = mysqli_query($mysqli, "SELECT count(*) FROM tasks where status = 'failed'");
          $row = mysqli_fetch_assoc($result);
          echo "<div class='header-item'>Failed: " . $row['count(*)'] . "</div>";
        echo "</div>";

        echo "<div class='task-grid-container'>";
          $results = mysqli_query($mysqli, "SELECT status FROM tasks ORDER BY id");
          // echo print_r($results);
          foreach ($results as $result) {
            echo "<div class='" . $result['status'] . "'></div>";
          }
        echo "</div>";

        echo "<div class='fpga-grid-container'>";
          $results = mysqli_query($mysqli, "SELECT * FROM fpgas ORDER BY id");
          foreach ($results as $result) {
            echo "<div class='" . ($result['status'] ? "active" : "inactive") . "'>" . $result['id'] . "</div>";
          }
        echo "</div>";
      echo "</div>";
    ?>
  </body>
</html>
