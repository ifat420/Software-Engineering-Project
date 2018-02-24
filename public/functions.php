<?php
function addNewApp($sID, $date, $des, $conn) {

  $sql = "INSERT INTO app (Date, Des, Status, StudentID) VALUES (CURDATE(), '$des', 0, $sID)";
  $result = $conn->query($sql);

  if($result) {
    // echo "Success";
  } else {
    // echo "Failed";
  }
}

function getInfo($conn, $sID, &$dep, &$roll, &$sess, &$name) {
  $sql = "SELECT `first_name`, `last_name`, `roll`, `dept`, `session` FROM `student_info` WHERE `s_id` = 12";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $dep = $row['dept'];
      $roll = $row['roll'];
      $sess = $row['session'];
      $name = $row['first_name'] . ' ' . $row['last_name'];
    }
  }
}
?>
