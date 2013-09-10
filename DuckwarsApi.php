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
        $hits->owner = $armyOwner;
        $hits->mancount = $armySize;
        $hits->source = $armySource;
        $hits->destination = $armyDestination;
        $hits->turnsRemaining = $remaining;
        $hits->tripDuration = $tripLength;
    }

    /**
     * Liefert die ID des Zielcamps.
     */
    function getDestination()
    {
        return $hits->destination;
    }

    /**
     * Liefert die Mannstärke der Armee.
     */
    function getMancount()
    {
        return $hits->mancount;
    }

    /**
     * Liefert den Spieler dem die Armee gehört.
     */
    function getOwner()
    {
        return $hits->owner;
    }

    /**
     * Liefert die ID des Ausgangscamps.
     */
    function getSource()
    {
        return $hits->source;
    }

    /**
     * Liefert die Reisedauer.
     */
    function getTripDuration()
    {
        return $hits->tripDuration;
    }

    /**
     * Liefert die verbleibende Reisezeit.
     */
    function getTurnsRemaining()
    {
        return $hits->turnsRemaining;
    }
}


?>
