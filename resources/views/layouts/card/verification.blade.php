<div class="card" style="margin: 20px;">
    <h5 class="card-header" style="background-color: rgb(17, 143, 227); color: white;">Pengajuan Data</h5>
    <div class="card-body">
        <h5 class="card-title">Ahmad</h5>
        <p class="card-text">Pengajuan Sebagai Penerima Bansos</p>
        <div style="text-align: right;">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-reject">
                Tolak
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-confirmation">
                Terima
            </button>
        </div>

        <div class="modal" id="modal-reject" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @include('layouts.modals.rejectVerification')
                </div>
            </div>
        </div>

        <div class="modal" id="modal-confirmation" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    @include('layouts.modals.confirmationVerification')
                </div>
            </div>
        </div>

    </div>
</div>

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
