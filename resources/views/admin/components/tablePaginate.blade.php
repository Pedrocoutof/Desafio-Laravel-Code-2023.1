@if ($body != '' || !($createFirst ?? true))
<div class="card">
    @if (isset($create) || isset($title))
    <div class="card-header card-outline card-primary">
        <h3 class="float-left m-0 table-title">{{ $title ?? null }}</h3>
        @if (isset($create))
        <div class="float-right mr-2">
            <div class="input-group input-group-sm">
                <a href="{{ $create }}">
                    <button type="button" class="btn btn-primary">
                        <b><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mr-2 bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg> Adicionar</b>
                    </button>
                </a>
            </div>
        </div>
        @endif
    </div>
    @endif
    <div class="card-body table-responsive table-sm">
        <div class="row d-flex justify-content-between align-items-center mx-0">
            <form id="form-search" action="{{ route(Route::getCurrentRoute()->getName()) }}" method="GET">
                <div class="d-flex justify-content-end mb-2">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label mr-2">Pesquisar: </label>
                        <input type="search" name="search" id="search" class="form-control form-control-sm" value="{{ request()->get('search') }}">
                    </div>
                </div>
            </form>
        </div>
        <table id="example" class="w-100 table table-hover dataTableSimple table-striped">
            <thead class="">
                <tr>
                    {{ $head ?? null }}
                </tr>
            </thead>
            <tbody>
                {{ $body ?? null }}
            </tbody>
            <tfoot>
                {{ $footer ?? null }}
            </tfoot>
        </table>>
    </div>
</div>
@else
<div class="text-center" style="color: #949699">
    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
    </svg>
    <p class="mb-4 h2">Nenhum item encontrado!</p>
    @if (isset($create))
    <a href="{{ $create }}">
        <button type="button" class="btn btn-primary">
            <b><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mr-2 bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                </svg> Adicionar novo item</b>
        </button>
    </a>
    @endif
</div>
@endif

@push('scripts')
<script>
    $("#search").change(function() {
        $("#form-search").submit();
    });
    $("#search").on('search', function() {
        $("#form-search").submit();
    });
</script>
@endpush