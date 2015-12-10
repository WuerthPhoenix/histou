<?php
/**
Contains Row Class.
PHP version 5
@category Row_Class
@package Histou
@author Philip Griesbacher <griesbacher@consol.de>
@license http://opensource.org/licenses/gpl-license.php GNU Public License
@link https://github.com/Griesbacher/histou
**/
namespace histou\grafana;

/**
Row Class.
PHP version 5
@category Row_Class
@package Histou
@author Philip Griesbacher <griesbacher@consol.de>
@license http://opensource.org/licenses/gpl-license.php GNU Public License
@link https://github.com/Griesbacher/histou
**/
class Row
{
    private $data = array(
                        'titel' => null,
                        'editable' => true,
                        'height' => null,
                        'panels' => array()
                    );
    private $panels = array();

    /**
    Constructor.
    @param string $titel  name of the row.
    @param string $height row height.
    @return object
    **/
    public function __construct($titel, $height = HEIGHT)
    {
        $this->data['titel'] = $titel;
        $this->data['height'] = $height;
    }

    /**
    Creates an array, also from its subelements.
    @return array
    **/
    public function toArray()
    {
        foreach ($this->panels as $panel) {
            array_push($this->data['panels'], $panel->toArray());
        }
        return $this->data;
    }

    /**
    Setter for Editable.
    @param boolean $editable true/false.
    @return null
    **/
    public function setEditable(boolean $editable)
    {
        $this->data['editable'] = $editable;
    }

    /**
    Adds a new Panel to the row.
    @param object $panel new panel.
    @return null
    **/
    public function addPanel($panel)
    {
        //TODO: Aufvererbung testen
        array_push($this->panels, $panel);
    }

    /**
    Setter for every property.
    @param string $name  key.
    @param object $value value.
    @return null
    **/
    public function setCustomProperty($name, $value)
    {
        $this->data[$name] = $value;
    }
}