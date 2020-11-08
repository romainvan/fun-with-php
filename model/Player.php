<?php
namespace Model;
class Player{
    public $name;
    public $level;

    function __construct($name)
    {
        $this->name=$name;
        $this->level=1200;
    }

    function correctLevel($resultat,$proba)
    {
        $this->level+=32*($resultat-$proba);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }


}
?>