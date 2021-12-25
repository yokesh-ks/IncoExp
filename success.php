<?php

session_start();
if($_SESSION['sessionid']==""){
    echo "no script kiding";
}
else{
    echo $_SESSION['sessionid'];
    echo "<br>";
    echo $_SESSION['sessiontype'];
    echo "<br>";
    echo $_SESSION['profile'];
    echo "<br>";
    echo $_SESSION['name'];
    
    echo "<br>";
    echo "confidential data only for authorised users";
    echo "<br>";
    if($_SESSION['sessiontype']=='admin'){
    echo "Highly Confidential";
    }
    else{
        echo "";
    }
}

?>