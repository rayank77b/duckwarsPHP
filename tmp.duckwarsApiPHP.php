
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
        this.id = id;
        owner = campOwner;
        mancount = campMancount;
        if (campSize < 1)
        {
            campSize = 1;
        }
        if (campSize > 5)
        {
            campSize = 5;
        }
        size = campSize;
        x = posX;
        y = posY;
    }

    /**
     * Liefert die ID des Camps.
     */
    function getID()
    {
        return id;
    }

    /**
     * Liefert die Mannstärke des Camps.
     */
    function getMancount()
    {
        return mancount;
    }

    /**
     * Liefert die maximale Anzahl Männer die dieses Camp aufnehmen kann.
     */
    function getMaxMancount()
    {
        return size * 20;
    }
    
    /**
     * Liefert die Wachstumsrate um der die Anzahl Männer pro Runde steigt.
     */
    function getGrowthrate()
    {
        return 1 + mancount / 20;
    }

    /**
     * Liefert die ID des Spielers dem dieses Camp gehört.
     */
    function getOwner()
    {
        return owner;
    }

    /**
     * Liefert die Größe des Camps (1-5).
     */
    function getSize()
    {
        return size;
    }

    /**
     * Liefert die X-Koordinate des Camps.
     */
    function getX()
    {
        return x;
    }

    /**
     * Liefert die Y-Koordinate des Camps.
     */
    function getY()
    {
        return y;
    }
}import java.util.ArrayList;
import java.util.List;

/**
 * Diese Klasse repräsentiert den aktuellen Spielzustand.
 */
class GameState
{
    private final ArrayList<Army> armies;
    private final ArrayList<Camp> camps;

    /**
     * Zur Initialisierung muss ein Spielzustandstring übergeben werden.
     */
    function GameState(String gameStateString)
    {
        camps = new ArrayList<Camp>();
        armies = new ArrayList<Army>();
        parseGameState(gameStateString);
    }

    /**
     * Ermittelt den Abstand zwischen zwei Camps, aufgerundend zur nächsten
     * höheren Ganzzahl. Diese Zahl gibt die Anzahl von Zügen an die benötigt
     * wird um die Strecke zurückzulegen.
     */
    function calculateDistance(Camp source, Camp destination)
    {
        double dx = source.getX() - destination.getX();
        double dy = source.getY() - destination.getY();
        return (int) Math.ceil(Math.sqrt(dx * dx + dy * dy));
    }

    /**
     * Beendet den aktuellen Zug.
     */
    function void finishTurn()
    {
        System.out.println("go");
        System.out.flush();
    }

    /**
     * Ermittelt die Armee mit der übergebenen ID. Die erste Armee beginnt dabei
     * mit der 0. Achtung: Die ID kann sich von Zug zu Zug ändern, da sie nicht
     * eindeutig vergeben wird.
     */
    function Army getArmy($id)
    {
        return armies.get(id);
    }

    /**
     * Ermittelt das Camp mit der angegebenen ID. Das erste Camp beginnt dabei
     * mit der 0. Die IDs sind für das ganze Match eindeutig.
     */
    function Camp getCamp($id)
    {
        return camps.get(id);
    }

    /**
     * Liefert eine Liste aller Camps.
     */
    function List<Camp> getCamps()
    {
        return camps;
    }

    /**
     * Ermittelt alle Camps der gegnerischen Spieler. D.h. die eigenen und
     * neutralen Camps sind nicht enthalten.
     */
    function List<Camp> getHostileCamps()
    {
        List<Camp> r = new ArrayList<Camp>();
        for (Camp p : camps)
        {
            if (p.getOwner() >= 2)
            {
                r.add(p);
            }
        }
        return r;
    }

    /**
     * Ermittelt alle eigenen Truppen.
     */
    function List<Army> getMyArmies()
    {
        List<Army> r = new ArrayList<Army>();
        for (Army army : armies)
        {
            if (army.getOwner() == 1)
            {
                r.add(army);
            }
        }
        return r;
    }

    /**
     * Ermittelt alle eigenen Camps.
     */
    function List<Camp> getMyCamps()
    {
        List<Camp> r = new ArrayList<Camp>();
        for (Camp camp : camps)
        {
            if (camp.getOwner() == 1)
            {
                r.add(camp);
            }
        }
        return r;
    }

    /**
     * Ermittelt alle neutralen Camps. D.h. Camps die derzeit keinem Spieler
     * gehören.
     */
    function List<Camp> getNeutralCamps()
    {
        List<Camp> r = new ArrayList<Camp>();
        for (Camp p : camps)
        {
            if (p.getOwner() == 0)
            {
                r.add(p);
            }
        }
        return r;
    }

    /**
     * Ermittelt alle Camps die derzeit nicht in der Hand des Spielers sind.
     */
    function List<Camp> getNotMyCamps()
    {
        List<Camp> r = new ArrayList<Camp>();
        for (Camp p : camps)
        {
            if (p.getOwner() != 1)
            {
                r.add(p);
            }
        }
        return r;
    }

    /**
     * Liefert die Anzahl aller aktiven Armeen.
     */
    function getNumArmies()
    {
        return armies.size();
    }

    /**
     * Liefert die Anzahl aller Camps.
     */
    function getNumCamps()
    {
        return camps.size();
    }

    /**
     * Ermittelt die Anzahl Einheiten die ein Spieler pro Zug generiert/erhält.
     */
    function getProduction($playerID)
    {
        int prod = 0;
        for (Camp p : camps)
        {
            if (p.getOwner() == playerID)
            {
                prod++;
            }
        }
        return prod;
    }

    /**
     * Ermittelt die maximale Truppenstärke eines Spielers. Dabei werden alle
     * Einheiten in dem Camps und unterwegs gezählt.
     */
    function getTotalMancount($playerID)
    {
        int count = 0;
        for (Camp camp : camps)
        {
            if (camp.getOwner() == playerID)
            {
                count += camp.getMancount();
            }
        }
        for (Army army : armies)
        {
            if (army.getOwner() == playerID)
            {
                count += army.getMancount();
            }
        }
        return count;
    }

    /**
     * Ermittelt ob ein Spieler noch am leben ist.
     */
    function boolean isAlive($playerID)
    {
        for (Camp p : camps)
        {
            if (p.getOwner() == playerID) { return true; }
        }
        for (Army f : armies)
        {
            if (f.getOwner() == playerID) { return true; }
        }
        return false;
    }

    /**
     * Sendet eine Truppe von einem Camp zu einem anderen. Pro Zug können
     * beliebig viele Truppenbewegungen gestartet werden. Eine Truppenbewegung
     * kann nicht gestoppt oder geändert werden.
     */
    function void issueOrder(Camp source, Camp dest, $mancount)
    {
        System.out.println(source.getID() + " " + dest.getID() + " " + mancount);
        System.out.flush();
    }

    /**
     * Wird verwendet um den Spielstand zu parsen.
     */
    private void parseGameState(String s)
    {
        camps.clear();
        armies.clear();
        int id = 0;
        String[] lines = s.split("\n");
        for (String line : lines)
        {
            String[] tokens = line.trim().split(" ");
            if (tokens.length == 0)
            {
                continue;
            }
            if (tokens[0].equals("C"))
            {
                if (tokens.length == 6)
                {
                    int x = Integer.parseInt(tokens[1]);
                    int y = Integer.parseInt(tokens[2]);
                    int owner = Integer.parseInt(tokens[3]);
                    int mancount = Integer.parseInt(tokens[4]);
                    int size = Integer.parseInt(tokens[5]);
                    camps.add(new Camp(id++, owner, mancount, size, x, y));
                }
            }
            else if (tokens[0].equals("A"))
            {
                if (tokens.length == 7)
                {
                    int owner = Integer.parseInt(tokens[1]);
                    int mancount = Integer.parseInt(tokens[2]);
                    int source = Integer.parseInt(tokens[3]);
                    int destination = Integer.parseInt(tokens[4]);
                    int totalTripLength = Integer.parseInt(tokens[5]);
                    int turnsRemaining = Integer.parseInt(tokens[6]);
                    armies.add(new Army(owner, mancount, source, destination, totalTripLength, turnsRemaining));
                }
            }
        }
    }
}
/**
 * Dieses Interface sollte vom Bot implementiert werden.
 */
function interface IBot
{
    /**
     * Wird aufgerufen wenn der nächste Zug durchgeführt werden kann. Der
     * aktuelle Spielzustand wird dabei übergeben.
     */
    void doTurn(GameState gamestate);

    /**
     * Wird aufgerufen um den Namen des Bots abzufragen.
     */
    String getName();
}/**
 * Hilfsklasse welche die Verarbeitungsschleife implementiert.
 */
class Helper
{
    /**
     * Durch den Aufruf wird die Verarbeitungsschleife gestartet.
     */
    function static void executeBot(IBot bot)
    {
        try
        {
            String line = "";
            String message = "";
            int c;
            while ((c = System.in.read()) >= 0)
            {
                switch (c)
                {
                    case '\n':
                        if (line.equals("go"))
                        {
                            GameState pw = new GameState(message);
                            bot.doTurn(pw);
                            pw.finishTurn();
                            message = "";
                        }
                        else if (line.equals("name?"))
                        {
                            System.out.println(bot.getName());
                            System.out.flush();
                        }
                        else
                        {
                            message += line + System.lineSeparator();
                        }
                        line = "";
                        break;
                    default:
                        line += (char) c;
                        break;
                }
            }
        }
        catch (Exception e)
        {
            System.err.println(e.getMessage());
        }
    }
}
