<?php

namespace Hexters\Ladmin\Supports;

use Yajra\DataTables\DataTables as BaseDataTables;

abstract class Datatables extends BaseDataTables
{

    /**
     * Custom data from Controller
     *
     * @var array
     */
    public $data;

    /**
     * Query builder
     *
     * @var [type]
     */
    protected $query;

    /**
     * Handle abstract
     */
    abstract public function handle();

    /**
     * Headers abstract
     */
    abstract public function headers(): array;

    /**
     * Columns abstract
     */
    abstract public function columns(): array;

    /**
     * Datatables ajax url
     *
     * @return string
     */
    public function ajax()
    {
        return request()->fullUrl();
    }

    /**
     * default order table
     *
     * @return void
     */
    public function order()
    {
        return [[0, "desc"]];
    }

    /**
     * Button create for page view
     *
     * @return \Illuminate\Support\Facades\Blade | Html
     */
    public function button()
    {
        return null;
    }

    /**
     * Generate databtables option setup
     *
     * @return array
     */
    final public function options(): array
    {
        return [
            'title' => $this->title,
            'headers' => $this->headers(),
            'buttons' => $this->button(),
            'options' => json_encode([
                'processing' => true,
                'serverSide' => true,
                'order' => $this->order(),
                'ajax' => $this->ajax(),
                'columns' => $this->columns()
            ])
        ];
    }

    /**
     * Get datatables data public
     *
     * @return void
     */
    final  public static function renderData(?array $data = [])
    {
        $class = self::_class();

        /**
         * Send data from controller to inheritance class
         */
        $class->data = $data;

        return $class->render();
    }

    /**
     * Table view in blade format
     *
     * @param array|null $data
     * @return \Illuminate\Support\Facades\Blade | Html
     */
    final  public static function table()
    {
        return self::view(blade: ladmin()->view_path('vendor.datatables.single'));
    }

    /**
     * View Quick builder
     *
     * @param [string] $blade
     * @param array|null $data
     * @return \Illuminate\Support\Facades\Blade | Html
     */
    final public static function view($blade = null, ?array $data = [])
    {

        $blade = is_null($blade) ? ladmin()->view_path('vendor.datatables.index') : $blade;

        return self::build($blade, $data);
    }

    /**
     * Build datatables data
     *
     * @return void
     */
    final protected function render()
    {
        return $this->handle()->escapeColumns([])->make(true);
    }

    /**
     * Proccess data tables
     *
     * @param [type] $blade
     * @param array|null $data
     * @return void
     */
    final protected static function build($blade, ?array $data = [])
    {
        $class = self::_class();

        /**
         * Send data from controller to inheritance class
         */
        $class->data = $data;

        if (request()->ajax()) {
            return $class->render();
        }

        return view($blade, array_merge($class->options(), $data));
    }

    /**
     * Get children class
     *
     * @return void
     */
    final protected static function _class()
    {
        return app(get_called_class());
    }
}
