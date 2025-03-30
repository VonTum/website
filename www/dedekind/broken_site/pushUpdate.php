<?php
$mysqli = mysqli_connect('localhost', 'lennart', '', 'dedekind');

if(isset($_GET['token']) && $_GET['token'] == 'xk5uhqk8468sz5duhkqdz3452') {
  $job = $_GET['job'];
  $st = $_GET['status'];
  $fpga = $_GET['fpga'];
  if ($job != '' && $job >= 0 && $job < 20000 && ($st == 'done' || $st == 'running' || $st == 'waiting' || $st == 'failed')) {
    $fpgaStatus = ($st == 'running') ? 1 : 0;
    $taskQ = 'REPLACE INTO tasks (id, status) VALUES (' . $job . ',\'' . $st . '\');';
    $fpgaQ = 'REPLACE INTO fpgas (id, status) VALUES (\'' . $fpga . '\',' . $fpgaStatus . ');';
    $logQ = 'INSERT INTO log (job, fpga, status, timestamp) VALUES (' . $job . ',\'' . $fpga . '\',\'' . $st . '\',CURRENT_TIMESTAMP);';
    $res = mysqli_query($mysqli, $taskQ);
    if($res != 1) echo 'Error tasks query failed: ' . $mysqli->error;
    $res = mysqli_query($mysqli, $fpgaQ);
    if($res != 1) echo 'Error tasks query failed: ' . $mysqli->error;
    $res = mysqli_query($mysqli, $logQ);
    if($res != 1) echo 'Error tasks query failed: ' . $mysqli->error;
  } else {
    echo 'Invalid pushUpdate.php request: ' . $_SERVER['REQUEST_URI'] . "\n";
  }
} else{
  echo '<h0>Error 401 - Unauthorized<h0>';
}
?>
