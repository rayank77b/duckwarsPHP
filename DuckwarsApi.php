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


?>
