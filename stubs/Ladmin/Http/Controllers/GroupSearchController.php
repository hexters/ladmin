<?php

namespace Modules\Ladmin\Http\Controllers;

use Ladmin\Engine\Models\LadminGroupSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Modules\Ladmin\Http\Controllers\Controller;

class GroupSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if(! $request->ajax()) {
            abort(403);
        }

        $results = LadminGroupSearch::search($request->search)->raw();
        $data['data'] = $this->parseData($results);
        return ladmin()->view('vendor.search.result', $data);
    }

    protected function parseData($items)
    {
        $total = 0;
        $results = [];
        foreach ($items['results'] as $item) {

            if (Gate::allows($item->gates)) {
                $results[$item->group][] = $item;
                $total++;
            }
        }

        return [
            'results' => $results,
            'total' => $total,
        ];
    }

    protected function reultByGroup($group, $results)
    {
        return $results->where('group', $group);
    }
}
