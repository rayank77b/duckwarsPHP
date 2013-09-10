<?php



/**
 * Repräsentiert eine Armee die auf dem Weg zu einem anderen Camp ist.
 */
class Army 
{
    private $destination=0;
    private $mancount=0;
    private $owner=0;
    private $source=0;
    private $tripDuration=0;
    private $turnsRemaining=0;

    /**
     * Konstruktor
     */
    function Army($armyOwner, $armySize, $armySource, $armyDestination, $tripLength, $remaining)
    {
        $this->owner = $armyOwner;
        $this->mancount = $armySize;
        $this->source = $armySource;
        $this->destination = $armyDestination;
        $this->turnsRemaining = $remaining;
        $this->tripDuration = $tripLength;
    }

    /**
     * Liefert die ID des Zielcamps.
     */
    function getDestination()
    {
        return $this->destination;
    }

    /**
     * Liefert die Mannstärke der Armee.
     */
    function getMancount()
    {
        return $this->mancount;
    }

    /**
     * Liefert den Spieler dem die Armee gehört.
     */
    function getOwner()
    {
        return $this->owner;
    }

    /**
     * Liefert die ID des Ausgangscamps.
     */
    function getSource()
    {
        return $this->source;
    }

    /**
     * Liefert die Reisedauer.
     */
    function getTripDuration()
    {
        return $this->tripDuration;
    }

    /**
     * Liefert die verbleibende Reisezeit.
     */
    function getTurnsRemaining()
    {
        return $this->turnsRemaining;
    }
}
################################################################################
/**
 * Repräsentiert ein Camp.
 */
class Camp
{
    private $id;
    private $mancount;
    private $owner;
    private $size;
    private $x;
    private $y;

    /**
     * Konstruktor
     */
    function Camp($id, $campOwner, $campMancount, $campSize, $posX, $posY)
    {
        $this->id = $id;
        $this->owner = $campOwner;
        $this->mancount = $campMancount;
        if ($campSize < 1)
        {
            $campSize = 1;
        }
        if ($campSize > 5)
        {
            $campSize = 5;
        }
        $this->size = $campSize;
        $this->x = $posX;
        $this->y = $posY;
    }

    /**
     * Liefert die ID des Camps.
     */
    function getID()
    {
        return $this->id;
    }

    /**
     * Liefert die Mannstärke des Camps.
     */
    function getMancount()
    {
        return $this->mancount;
    }

    /**
     * Liefert die maximale Anzahl Männer die dieses Camp aufnehmen kann.
     */
    function getMaxMancount()
    {
        return $this->size * 20;
    }
    
    /**
     * Liefert die Wachstumsrate um der die Anzahl Männer pro Runde steigt.
     */
    function getGrowthrate()
    {
        return 1 + $this->mancount / 20;
    }

    /**
     * Liefert die ID des Spielers dem dieses Camp gehört.
     */
    function getOwner()
    {
        return $this->owner;
    }

    /**
     * Liefert die Größe des Camps (1-5).
     */
    function getSize()
    {
        return $this->size;
    }

    /**
     * Liefert die X-Koordinate des Camps.
     */
    function getX()
    {
        return $this->x;
    }

    /**
     * Liefert die Y-Koordinate des Camps.
     */
    function getY()
    {
        return $this->y;
    }
}
################################################################################
/**
 * Dieses Interface sollte vom Bot implementiert werden.
 */
interface IBot
{
    /**
     * Wird aufgerufen wenn der nächste Zug durchgeführt werden kann. Der
     * aktuelle Spielzustand wird dabei übergeben.
     */
    public function doTurn($gamestate);

    /**
     * Wird aufgerufen um den Namen des Bots abzufragen.
     */
    public function getName();
}


?>
