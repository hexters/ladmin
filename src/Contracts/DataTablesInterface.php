<?php 

namespace Hexters\Ladmin\Contracts;

interface DataTablesInterface {

  public static function of($source);

  public static function make($source);

  public function getRequest();

  public function getConfig();

  public function queryBuilder($builder);

  public function query($builder);

  public function eloquent($builder);

  public function collection($collection);

  public function resource($resource);

  public function getHtmlBuilder();

  public function render();

  public function options();

}