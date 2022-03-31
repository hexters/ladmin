<?php

namespace Hexters\Ladmin\Supports;

use Hexters\Ladmin\Contracts\MenuDivider;

abstract class BaseMenu
{
    /**
     * Required route method
     */
    abstract protected function route();

    /**
     * Required submenus method
     */
    abstract protected function submenus();

    /**
     * Required gates method
     */
    abstract protected function gates();

    /**
     * Get menu main gate name
     *
     * @return String
     */
    final public function getGate()
    {
        return $this->gate;
    }

    /**
     * Gate route name
     *
     * @return String
     */
    final public function getRouteName()
    {
        return is_array($this->route()) ? $this->route()[0] : $this->route();
    }

    /**
     * Gate route parameters
     *
     * @return String
     */
    final public function getRouteParams()
    {
        return is_array($this->route()) ? ($this->route()[1] ?? []) : null;
    }

    /**
     * get menu name
     *
     * @return String
     */
    final public function getName()
    {
        return $this->name;
    }
    
    /**
     * Get menu icon
     *
     * @return String
     */
    final public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Get menu description
     *
     * @return String
     */
    final public function getDescription()
    {
        return $this->description;
    }
    
    
    /**
     * Get indicator menu active
     *
     * @return String
     */
    final public function getIsActive()
    {
        return  config('ladmin.prefix') . '/' . ltrim($this->isActive, '/');
    }

    /**
     * Get menu id
     *
     * @return String
     */
    final public function getId()
    {
        return $this->id;
    }

    /**
     * Get other permissions
     *
     * @return Array
     */
    final public function getGates(): array
    {
        $gates = [];
        foreach ($this->gates() as $gate) {
            $gates[] = $gate->render();
        }

        return $gates;
    }

    /**
     * Render Menu
     *
     * @return Array
     */
    final public function render(): array
    {
        return [
            'type' => 'menu',
            'gate' => $this->getGate(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'routeName' => $this->getRouteName(),
            'routeParams' => $this->getRouteParams(),
            'isActive' => $this->getIsActive(),
            'icon' => $this->getIcon(),
            'id' => $this->getId(),
            'gates' => $this->getGates(),
            'submenus' => $this->getSubmenus(),
            'target' => $this->target()
        ];
    }

    /**
     * Menu Divider
     *
     * @return Array
     */
    final public function divider(): array
    {
        return [
            'type' => 'divider',
            'gate' => $this->getGate(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'routeName' => $this->getRouteName(),
            'routeParams' => $this->getRouteParams(),
            'isActive' => $this->getIsActive(),
            'icon' => $this->getIcon(),
            'id' => $this->getId(),
            'gates' => $this->getGates(),
            'submenus' => $this->getSubmenus(),
            'target' => $this->target()
        ];
    }

    /**
     * Get submenus
     *
     * @return Array
     */
    final public function getSubmenus(): array
    {
        $submenus = [];

        foreach ($this->submenus() as $submenu) {
            $menuClass = app($submenu);
            if($menuClass instanceof MenuDivider) {
                $submenus[] = $menuClass->divider();
            } else {
                $submenus[] = $menuClass->render();
            }
        }

        return $submenus;
    }

    /**
     * Menu target
     *
     * @return void
     */
    protected function target() {
        return '_self';
    }
}
