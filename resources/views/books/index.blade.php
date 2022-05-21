@extends('layouts.tri')

@section('body')
    @include('books.parts.list', ['books' => $books, 'view' => $view])
@stop

@section('left')

    <div id="new" class="mb-xl">
        <h5>{{ trans('entities.books_new') }}</h5>
        @if(count($new) > 0)
            @include('entities.list', ['entities' => $new, 'style' => 'compact'])
        @else
            <div class="body text-muted">{{ trans('entities.books_new_empty') }}</div>
        @endif
    </div>
@stop

@section('right')

    <div class="actions mb-xl">
        <h5>{{ trans('common.actions') }}</h5>
        <div class="icon-list text-primary">
            @if(user()->can('book-create-all'))
                <a href="{{ url("/create-book") }}" class="icon-list-item">
                    <span>@icon('add')</span>
                    <span>{{ trans('entities.books_create') }}</span>
                </a>
            @endif

            @include('entities.view-toggle', ['view' => $view, 'type' => 'books'])

            <a href="{{ url('/tags') }}" class="icon-list-item">
                <span>@icon('tag')</span>
                <span>{{ trans('entities.tags_view_tags') }}</span>
            </a>
        </div>
    </div>

@stop