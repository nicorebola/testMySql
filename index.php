<?php 
    include('UserStats.php');

    $userStats = new UserStats;
    $userStats->getStats('2022-10-01', '2022-10-15', 9000);

?>