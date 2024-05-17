<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>{{ $breadcrumb->title }}</h2>
                </div>
            </div>
            <div class="d-flex align-items-end flex-wrap">
                @foreach ($breadcrumb->list as $key => $value)
                    @if ($key == count($breadcrumb->list) - 1)
                        <h4 class="text-primary mb-0 hover-cursor">{{ $value }}</h4>
                    @else
                        <h4 class="text-muted mb-0 hover-cursor">{{ $value }}&nbsp;/&nbsp;</h4>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</div>
