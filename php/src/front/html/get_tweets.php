<?php

    function vista_principal(){
        require ("../../conexion_bd.php");
        $query = "select e.id_event, u.name, e.username, e.timestamp, t.description
        FROM Events e, Tweets t, Users u
        WHERE e.id_tweet = t.id_tweet
        AND e.username = u.username
        AND e.type_interaction = 1
       ORDER BY e.timestamp DESC LIMIT 10";
    
        $result = consultaBaseDatos($query);
    
        while($row = mysqli_fetch_array($result)) {
            echo '<div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img src="../assets/images/users/1.jpg" alt="user" width="50"
                    class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">'.$row['name'].'</h6>
                <span class="m-b-15 d-block">'.$row['description'].'</span>
                <div class="comment-footer">
                    <span class="text-muted float-end">'.$row['timestamp'].'</span>
                    <form id=tweet action = "./retweet/save_id.php" method=post class="action-icons">
                    <button id=tweet name=tweet type=submit value='.$row['id_event'].'><i class="ti-pencil-alt"></i></button>
                </form>
                </div>
            </div>
        </div>';
        }
    }






?>