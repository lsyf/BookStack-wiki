{{--This view display child pages in a list if pre-loaded onto a 'visible_pages' property,--}}
{{--To ensure that the pages have been loaded efficiently with permissions taken into account.--}}
<div>
    <a href="{{ $chapter->getUrl() }}"
       class="chapter entity-list-item @if($chapter->visible_pages->count() > 0) has-children @endif"
       data-entity-type="chapter" data-entity-id="{{$chapter->id}}">
        <span class="icon text-chapter" style="margin-inline-end: 0;">@icon('chapter')</span>
        <div class="content">
            <span chapter-toggle
                  aria-expanded="false"
                  style="padding:5px 0 5px 5px"
                  class="text-muted chapter-expansion-toggle">@icon('caret-right')</span>
            <h4 class="entity-list-item-name break-text" style="display: inline">{{ $chapter->name }}</h4>
            <div class="entity-item-snippet" hidden>
                <p class="text-muted break-text mb-s">{{ $chapter->getExcerpt() }}</p>
            </div>
        </div>
    </a>
    @if ($chapter->visible_pages->count() > 0)
        <div class="chapter chapter-expansion">
            <span class="icon text-chapter">@icon('page')</span>
            <div class="content">
                <div class="inset-list">
                    <div class="entity-list-item-children">
                        @include('entities.list', ['entities' => $chapter->visible_pages])
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>