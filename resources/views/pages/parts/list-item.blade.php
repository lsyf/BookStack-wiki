@component('entities.list-item-basic', ['entity' => $page])
    <div class="entity-item-snippet">
        <p class="text-muted break-text" hidden>{{ $page->getExcerpt() }}</p>
    </div>
@endcomponent