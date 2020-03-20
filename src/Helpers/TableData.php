<?php 

namespace Hexters\Ladmin\Helpers;
use Hexters\Ladmin\Contracts\MasterCrud;
use Closure;
class TableData {

  protected $title;
  protected $actions;

  public function title($title) {
    $this->title = $title;
    return $this;
  }
  
  
  public function render(MasterCrud $query) {
    
    if(request()->has('order') && request()->has('sort')) {
      $query->orderBy(request()->get('order'), request()->get('sort'));
    }

    if(request()->has('search')) {
      foreach($query->search() as $search) {
        $query->orWhere($search, 'LIKE', '%' . request()->get('search') . '%');
      }
    }

    $data['title'] = $this->title ?? null;
    $data['createdRouteName'] = $query->createdRouteName();
    $data['items'] = $query->paginate(request()->get('per_page'));
    return view('ladmin::ladmin.index', $data);
  }

}