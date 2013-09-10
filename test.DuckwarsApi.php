<?php
include('DuckwarsApi.php');


function equal($msg, $v1, $v2) {
    if($v1==$v2) {
        echo "[+] Test passed.. ($msg)..\n";
    } else {
        echo "[-] FAIL/ERROR..: $msg\n[-]  Value not equal:  $v1 !=  $v2\n\n";
        exit(-1);
    }
}

echo "\n------------------------------------------\n   Start Tests \n\n";

$armyOwner=1;
$armySize=50;
$armySource=3;
$armyDestination=4;
$tripLength=5;
$remaining=4;
echo "[+] create Army($armyOwner, $armySize, $armySource, $armyDestination, $tripLength, $remaining) object\n";
$a = new Army($armyOwner, $armySize, $armySource, $armyDestination, $tripLength, $remaining);
echo "[+] test pass\n";

equal("getDestination", $a->getDestination(), $armyDestination);
equal("getMancount", $a->getMancount(), $armySize);


    echo "\n[+] All tests passed ....\n\n";
?>
