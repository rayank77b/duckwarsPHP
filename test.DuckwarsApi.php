<?php
include('DuckwarsApi.php');

    echo "\n";
    echo "------------------------------------------\n";
    echo "   Start Tests \n";
    echo "\n";
    
    $armyOwner=1;
    $armySize=50;
    $armySource=3;
    $armyDestination=4;
    $tripLength=5;
    $remaining=4;
    echo "[+] create Army($armyOwner, $armySize, $armySource, $armyDestination, $tripLength, $remaining) object\n";
    $a = new Army($armyOwner, $armySize, $armySource, $armyDestination, $tripLength, $remaining);
    echo "[+] test pass\n";



?>
