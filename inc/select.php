<?php
$sql_winner = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
$result_winner = mysqli_query($conn, $sql_winner);
$winner = mysqli_fetch_assoc($result_winner);
?>