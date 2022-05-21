<nav id="book-tree"
     class="book-tree mb-xl"
     aria-label="{{ trans('entities.books_navigation') }}">

    <h5>{{ trans('entities.books_navigation') }}</h5>

    <ul class="sidebar-page-list mt-xs menu entity-list">
        @if (userCan('view', $book))
            <li class="list-item-book book" hidden>
                @include('entities.list-item-basic', ['entity' => $book, 'classes' => ($current->matches($book)? 'selected' : '')])
            </li>
        @endif

        @foreach($sidebarTree as $bookChild)
            <li class="list-item-{{ $bookChild->getType() }} {{ $bookChild->getType() }} {{ $bookChild->isA('page') && $bookChild->draft ? 'draft' : '' }}">

                @if($bookChild->isA('chapter'))
                    <a href="{{ $bookChild->getUrl() }}"
                       class="{{$bookChild->getType()}} {{$bookChild->getType() === 'page' && $bookChild->draft ? 'draft' : ''}} {{$classes ?? ''}} entity-list-item"
                       data-entity-type="{{$bookChild->getType()}}" data-entity-id="{{$bookChild->id}}">
                        <span role="presentation" class="icon text-{{$bookChild->getType()}}"
                              style="margin-inline-end: 0;">@icon($bookChild->getType())</span>
                        <div class="content">
                            <span chapter-toggle
                                  aria-expanded="{{ $bookChild->matchesOrContains($current) ? 'true' : 'false' }}"
                                  class="text-muted @if($bookChild->matchesOrContains($current)) open @endif"
                                  style="padding-inline-start: 0;">
                                    @icon('caret-right')
                                </span>
                            <span class="entity-list-item-name break-text">{{ $bookChild->preview_name ?? $bookChild->name }}</span>
                            {{ $slot ?? '' }}
                        </div>
                    </a>

                    <div class="entity-list-item no-hover chapter-child-menu-box @if(!$bookChild->matchesOrContains($current)) hidden @endif">
                        <span role="presentation" class="icon text-chapter"></span>
                        <div class="content">
                            <div class="chapter-child-menu">
                                <ul class="sub-menu inset-list @if($bookChild->matchesOrContains($current)) open @endif"
                                    style="margin-bottom: 0;@if($bookChild->matchesOrContains($current)) display: block; @endif"
                                    role="menu">
                                    @foreach($bookChild->visible_pages as $childPage)
                                        <li class="list-item-page {{ $childPage->isA('page') && $childPage->draft ? 'draft' : '' }}"
                                            role="presentation">
                                            @include('entities.list-item-basic', ['entity' => $childPage, 'classes' => $current->matches($childPage)? 'selected' : '' ])
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                @else
                    @include('entities.list-item-basic', ['entity' => $bookChild, 'classes' => $current->matches($bookChild)? 'selected' : ''])
                @endif

            </li>
        @endforeach
    </ul>
</nav>