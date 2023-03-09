<div class="col-md-10 offset-md-1 col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title title-form">{{ $title ?? null }} </h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="form-adicionar" action="{{ $url ?? '/' }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ $form ?? null }}
            </form>
        </div>
        <div class="card-footer">
            <button onclick="setForm()" type="submit" form="form-adicionar"
                class="btn btn-dark float-right">{{$button_name ?? 'Cadastrar'}}</button>
            {{ $back ?? null }}
        </div>
    </div>
</div>
    
@push('scripts')
    <script>
        $('#form-adicionar').on('submit', function (event) {
            Swal.fire({
                title: 'Cadastrando...',
                allowOutsideClick: false,
                width: 400,
                showCancelButton: false,
                showConfirmButton: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
        });

        function setForm() {
            all_quantidade = document.getElementById("all_quantidade");
            all_quantidade.value = "";
            all_peso = document.getElementById("all_peso");
            all_peso.value = "";
        }

    </script>
@endpush
