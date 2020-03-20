@extends('ladmin::layouts.app')
@section('title', $title ?? null)
@section('content')
    
    <div class="card">
        <div class="card-body pb-0">
        <div class="row">
            <div class="col-lg-4">
            <form action="" method="get">
                <x-ladmin-input name="search" type="search" placeholder="search...">
                <x-slot name="append">
                    <button type="submit" class="btn btn-link btn-sm">
                    <i class="fas fa-search"></i>
                    </button>
                </x-slot>
                </x-ladmin-input>
            </form>
            </div>
            <div class="col-lg-8 text-right">
            <a href="" class="btn btn-primary">
                Create
            </a>
            </div>
        </div>
        </div>
        <table class="table table-stripped">
        <thead>
            <tr>
                @foreach ($items->fields() as $field => $alias)
                    <th>
                        <a class="text-muted" href="/{{ request()->path() }}?{{ http_build_query(['page' => request()->get('page', 0), 'order' => $field, 'sort' => (request()->get('sort') == 'asc' ? 'desc' : 'asc' )]) }}">
                            {{ $alias }}
                            @if($field == request()->get('order','')) {
                                {!! request()->get('sort','asc') == 'asc' ? '<i class="fas fa-sort-amount-down-alt"></i>' : '<i class="fas fa-sort-amount-up-alt"></i>' !!}
                            }
                        </a>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    @foreach ($items->fields() as $field => $alias)
                        <td>{{ $item->{$field} }}</td>
                    @endforeach
                </tr>    
            @empty
                <td colspan="{{ count($items->fields()) }}">
                    <p>No record data</p>
                </td>
            @endforelse
        </tbody>
        </table>
        @if($items->total > request()->get('per_page', 10))
        <div class="card-footer">
            {{ $item->links() }}
        </div>
        @endif
    </div>

@endsection