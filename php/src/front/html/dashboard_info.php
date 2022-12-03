<?php
    require ("../../conexion_bd.php");

    $query = "select e.username, count(*) as n
    FROM Events e 
    WHERE e.timestamp BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
    GROUP BY e.username
    ORDER BY n DESC LIMIT 1";

    $result = consultaBaseDatos($query);

    if (mysqli_num_rows($result) != 0) {

        while($row = mysqli_fetch_array($result)) {
            $user = $row['username'];
            $events_number = $row['n'];
        }
    }else{
        $user = "";
        $events_number = 0;
    }

    $query = "select e.id_tweet, t.description, count(*) as n
    FROM Events e, Tweets t
    WHERE e.timestamp BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()
    AND e.type_interaction = 2
    AND e.id_tweet = t.id_tweet
    GROUP BY e.id_tweet;";

    $result = consultaBaseDatos($query);

    if (mysqli_num_rows($result) != 0) {

        while($row = mysqli_fetch_array($result)) {
            $tweet = $row['n'];
            $tweet_description = $row['description'];
        }
    } else{
        $tweet = 0;
        $tweet_description = "";
    }

    $query = "select COUNT(DISTINCT (e.username)) as count
    FROM Events e
    WHERE e.timestamp BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()
    AND e.type_interaction = 0;";

    $result = consultaBaseDatos($query);

    while($row = mysqli_fetch_array($result)) {
        $num_users = $row['count'];
    }

    echo '<div class="py-3 d-flex align-items-center">
    <span class="btn btn-warning btn-circle d-flex align-items-center">
        <i class="mdi mdi-star-circle fs-4" ></i>
    </span>
    <div class="ms-3">
        <h5 class="mb-0 fw-bold">User with more events during the week</h5>
        <span class="text-muted fs-6">'.$user.'</span>
    </div>
    <div class="ms-auto">
        <span class="badge bg-light text-muted">'.$events_number.'</span>
    </div>
</div>
<div class="py-3 d-flex align-items-center">
    <span class="btn btn-success btn-circle d-flex align-items-center">
        <i class="mdi mdi-comment-multiple-outline text-white fs-4" ></i>
    </span>
    <div class="ms-3">
        <h5 class="mb-0 fw-bold">Most Commented tweet of the day</h5>
        <span class="text-muted fs-6">'.$tweet_description.'</span>
    </div>
    <div class="ms-auto">
        <span class="badge bg-light text-muted">'.$tweet.'</span>
    </div>
</div>
<div class="py-3 d-flex align-items-center">
    <span class="btn btn-info btn-circle d-flex align-items-center">
        <i class="mdi mdi-diamond fs-4 text-white" ></i>
    </span>
    <div class="ms-3">
        <h5 class="mb-0 fw-bold">Amount of users today</h5>
    </div>
    <div class="ms-auto">
        <span class="badge bg-light text-muted">'.$num_users.'</span>
    </div>
</div>'



?>
