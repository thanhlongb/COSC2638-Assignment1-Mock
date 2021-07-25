<div class="page-header">
    <h1>{{ $title }}
        @isset($subtitle)
            <small class="text-muted">{{ $subtitle }}</small>
        @endisset
        @isset($addButton, $addUrl)
            <a type="button" href="{{ $addUrl }}" class="btn btn-primary" style="float: right;margin: 10px 0;">
                <i class="fa fa-plus"> {{ $addButton }}
            </a>
        @endisset
    </h1>
</div>
