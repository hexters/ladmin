<?php

namespace Hexters\Ladmin\Menus;

class Gate
{

    /**
     * Gate name
     *
     * @var String
     */
    protected $gate;

    /**
     * Gate title
     *
     * @var String
     */
    protected $title;

    /**
     * Gate description
     *
     * @var String
     */
    protected $description;

    public function __construct($gate, $title, $description)
    {
        $this->gate = $gate;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Render Gate
     *
     * @return Array
     */
    public function render(): array
    {
        return [
            'gate' => $this->gate,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
