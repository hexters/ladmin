<?php

namespace Hexters\Ladmin\Contracts;

interface MasterCrud {

  /**
   * return for showing field
   *
   * @return Array
   */
  public function fields();

  /**
   * Field declaration for searcing data
   *
   * @return Array
   */
  public function search();

  /**
   * Route for create new data
   *
   * @param [String] $name
   * @return String
   */
  public function createdRouteName($name);

  /**
   * Action
   *
   * @param [Collection] $item
   * @return String
   */
  public function actions($item);
}