<?php 

class UserStats {
    public $dateFrom;
    public $dateTo;
    public $totalClicks;

    public function getStats($dateTo, $dateFrom, $totalClicks){
        $base = 'datos';
        $user = 'root';
        $pass = '';

        $conexion = mysqli_connect('localhost', $user, $pass, $base);

        

        $resultado = $conexion->query("
            SELECT 
                concat(`users`.first_name, ' ', `users`.last_name) AS 'full_name',
                `user_stats`.views AS 'total_views',
                `user_stats`.clicks AS 'total_clicks',
                `user_stats`.conversions AS 'total_conversions',
                ROUND((((`user_stats`.conversions)/(`user_stats`.clicks))*100),2) AS 'cr'
            FROM `users`
            INNER JOIN `user_stats` ON `users`.id = `user_stats`.user_id
            WHERE(`user_stats`.date <= '$dateFrom') AND (`user_stats`.date >= '$dateTo') AND (`users`.status = 'active') AND ('$totalClicks' >= `user_stats`.clicks);
        ");

        // echo ($dateFrom);
        // echo ($dateTo);
        // echo ($totalClicks);


        $resultado = mysqli_fetch_array($resultado);

        print_r($resultado);
    }
};

?>