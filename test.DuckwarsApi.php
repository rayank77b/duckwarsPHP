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
echo "\n------------------------------------------\n";
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
echo "\n------------------------------------------\n";
$message="C 2 2 1 40 3\nC 20 2 3 40 3\nC 2 20 4 40 3\nC 20 20 2 40 3\nC 5 2 0 5 1\nC 2 5 0 5 1\nC 5 5 0 15 1\nC 17 2 0 5 1\nC 20 5 0 5 1\nC 17 5 0 15 1\nC 2 17 0 5 1\nC 5 20 0 5 1\nC 5 17 0 15 1\nC 20 17 0 5 1\nC 17 20 0 5 1\nC 17 17 0 15 1\nC 11 6 0 25 2\nC 6 11 0 25 2\nC 16 11 0 25 2\nC 11 16 0 25 2\nC 11 11 0 50 3\nA 1 9 4 3 24 3\nA 4 12 11 19 8 2\nA 3 30 1 18 10 5\nA 2 12 3 7 19 17\nA 4 9 10 12 3 1\nA 2 6 3 7 19 18\n";
echo "[+] create GameState(message) object\n";
$gs = new GameState($message);
echo "[+] test pass\n";
equal("getNumArmies()",$gs->getNumArmies(),6);
equal("getNumCamps()",$gs->getNumCamps(),21);
$c1=new Camp(0, 1,11, 3, 1, 1);
$c2=new Camp(1, 1,12, 3, 4, 4);
equal("calculateDistance()", $gs->calculateDistance($c1,$c2), 5);
$a=$gs->getArmy(0);
equal("gs->getArmy(0)", $a->getOwner(), 1);
$c=$gs->getCamp(1);
equal("gs->getCamp(1)", $c->getOwner(), 3);
equal("gs->getCamps()", count($gs->getCamps()), 21);
equal("gs->getHostileCamps()", count($gs->getHostileCamps()), 3);
equal("getMyArmies()", count($gs->getMyArmies()), 1);
equal("getMyCamps()", count($gs->getMyCamps()), 1);
equal("getNeutralCamps()", count($gs->getNeutralCamps()), 17);
equal("getNotMyCamps()", count($gs->getNotMyCamps()), 20);
equal("getProduction()", $gs->getProduction(4), 3);
equal("getTotalMancount()", $gs->getTotalMancount(4), 61);
equal("isAlive()", $gs->isAlive(4), TRUE);
equal("isAlive()", $gs->isAlive(6), FALSE);
$src=$gs->getCamp(0);
$dst=$gs->getCamp(2);
$gs->issueOrder($src, $dst, 2);
equal("getNumArmies()",$gs->getNumArmies(),7); 
equal("man count in source", $src->getMancount(), 38);

echo "\n\n[+] All tests passed ....\n\n";



?>
