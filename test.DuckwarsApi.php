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

equal("getDestination()", $a->getDestination(), $armyDestination);
equal("getMancount()", $a->getMancount(), $armySize);
equal("getOwner()", $a->getOwner(),$armyOwner);
equal("getSource()", $a->getSource(),$armySource);
equal("getTripDuration()", $a->getTripDuration(),$tripLength);
equal("getTurnsRemaining()", $a->getTurnsRemaining(),$remaining);

$id=0; $campOwner=1; $campMancount=30; $campSize=2; $posX=5; $posY=6;
echo "[+] create Camp($id, $campOwner, $campMancount, $campSize, $posX, $posY) object\n";
$c = new Camp($id, $campOwner, $campMancount, $campSize, $posX, $posY);
echo "[+] test pass\n";
equal("getID()", $c->getID(), $id);
equal("getMancount()", $c->getMancount(),$campMancount );
equal("getMaxMancount()", $c->getMaxMancount(), $campSize*20);
equal("getGrowthrate()", $c->getGrowthrate(), 1+$campMancount/20);
equal("getOwner()", $c->getOwner(), $campOwner);
equal("getSize()", $c->getSize(), $campSize);
equal("getX()", $c->getX(), $posX);
equal("getY()", $c->getY(), $posY);


    echo "\n[+] All tests passed ....\n\n";
?>
