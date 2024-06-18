<div class="tab-content-item" id="pengajuan-content" style="display:none;">
    @if ($user->role == 'pengguna')
        <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; height: 60vh;">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <img src="{{ url('/') }}/assets-web2/assets/images/icon/empty.png"
                    style="width: 100px; height: 100px;" class="mb-3">
                <p>Kamu tidak memiliki akses untuk membuat event, silahkan ajukan
                    pengambilan peran terlebih dahulu</p>
                <a href="{{ url('Ambil-Peran/create') }}" class="btn btn-md button-transform button-border"
                    style="color: white; font-size:15px">Ajukan Sekarang</a>
            </div>
        </div>
    @elseif ($user->role == 'penyelenggara' && $user->events->isEmpty())
        <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; height: 60vh;">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <img src="{{ url('/') }}/assets-web2/assets/images/icon/empty.png"
                    style="width: 100px; height: 100px;" class="mb-3">
                <p>Kamu belum membuat event</p>
                <a href="{{ url('Pengajuan-Event/create') }}" class="btn btn-md button-transform button-border"
                    style="color: white; font-size:15px">Buat Sekarang</a>
            </div>
        </div>
    @elseif ($user->role == 'penyelenggara' && !$user->events->isEmpty())
        <a href="{{ url('Pengajuan-Event/create') }}" class="button-green"> Buat Event</a>
        <div class="row">
            @foreach ($list_event as $event)
                @include('Web.Profil.Data.kelola-event')
            @endforeach
            <div class="container">
                <div class="pagination justify-content-center">
                    {{ $list_event->appends(request()->query())->fragment('pengajuan')->links() }}
                </div>
                <div class="text-center">
                    <span class="small ">
                        Menampilkan
                        {{ $list_event->firstItem() }}
                        Sampai
                        {{ $list_event->lastItem() }}
                        Dari
                        {{ $list_event->total() }}
                        Item
                    </span>
                </div>
            </div>
        </div>
    @endif
</div>
<style>
    /* status badge start */
    .card-image-container {
        position: relative;
    }

    .badge-overlay {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 5px 10px;
        z-index: 10;
        font-size: 12px;
    }

    /* status badge end */

    /* same height start */
    .row {
        display: flex;
        flex-wrap: wrap;
        /* Memastikan bahwa elemen tetap melipat saat layar lebih kecil */
    }

    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
        /* Memastikan kartu mengisi tinggi kolom penuh */
    }

    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .card-body a {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .p-2 {
        flex: 1;
    }

    /* same height end */

    a {
        text-decoration: none !important
    }

    .wrapper-event-info {
        padding-block: 20px;
        display: flex;
        justify-content: space-between;
        padding-inline: 10px
    }

    .event-info {
        font-size: 10px;
        color: #090909;
        margin-bottom: 0;
        justify-content: space-between;
        flex-direction: column;
    }

    .progress-container {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
        margin-top: -10px
    }

    .custom-progress {
        width: 95%;
        height: 10px;

    }

    .progress-bar {
        background-color: #064635;
    }

    .content-progress {
        font-size: 12px;
        color: rgb(187, 185, 185);
        padding-inline: 100px;
    }


    /*card*/
    .campaign-card {
        background-color: white;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        position: relative;
        height: 400px
    }

    .action-buttons {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 16px;
        background-color: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;

    }

    .action-buttons .status {
        color: black;
        font-size: 15px;
    }

    .action-buttons .btn {
        display: inline-block;
        background-color: #064635;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
    }

    .campaign-card img {
        width: 100%;
        height: auto;
        display: block;
    }

    .campaign-content {
        padding: 16px;
    }

    .campaign-content h3 {
        font-size: 18px;
        margin-top: 0;
    }

    .campaign-content p {
        margin-bottom: 12px;
    }

    /* Pagination*/
    .pagination .page-item.active .page-link {
        background-color: #064635;
        color: white;
    }

    .pagination .page-item:not(.disabled):first-child .page-link::before {
        content: '\2039';
    }

    .pagination .page-item:not(.disabled):last-child .page-link::before {
        content: '\203A';
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #000000;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }



    .button-green {
        display: block;
        width: 100% !important;
        background: #43936c;
        border-radius: 8px;
        font-weight: 600;
        color: #fff;
        padding-inline: 24px;
        padding-block: 12px;
        transition: 300ms ease-in-out;
        text-align: center;
    }

    .button-green:hover {
        text-decoration: none;
        color: #43936c;
        background: #fff;
        border: 1px solid #43936c;
    }

    .pagination .page-item.active .page-link {
        color: black
    }

    .pagination .page-item .page-link:hover {
        color: #fff;
        /* Warna teks saat dihover */
        background-color: #064635;
        /* Warna latar belakang saat dihover */
        border-color: #064635;
        /* Warna border saat dihover */
    }

    .pagination .page-item.active .page-link {
        color: #fff;
        /* Warna teks untuk halaman aktif */
        background-color: #064635;
        /* Warna latar belakang untuk halaman aktif */
        border-color: #064635;
        /* Warna border untuk halaman aktif */
    }

    /* Timeline holder */
    ul.timeline {
        list-style-type: none;
        position: relative;
        padding-left: 1.5rem;
    }

    /* Timeline vertical line */
    ul.timeline:before {
        content: ' ';
        background: #b1b1b1;
        display: inline-block;
        position: absolute;
        left: 16px;
        width: 4px;
        height: 100%;
        z-index: 400;
        border-radius: 1rem;
    }

    .timeline-item {
        border: 1px solid #cecece;
        border-radius: 20px;
        width: 700px;
        margin-bottom: 20px;
        padding: 10px;
        word-wrap: break-word;
        overflow: auto;
        /* Menambahkan overflow */
    }

    @media (max-width: 768px) {
        .timeline-item {
            width: auto;
            /* Set lebar maksimum menjadi 100% saat layar kecil */
        }
    }

    /* Timeline item arrow */
    .timeline-arrow {
        border-top: 0.5rem solid transparent;
        border-right: 0.5rem solid #fff;
        border-bottom: 0.5rem solid transparent;
        display: block;
        position: absolute;
        left: 2rem;
    }

    /* Timeline item circle marker */
    li.timeline-item::before {
        content: ' ';
        background: #064635;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #fff;
        left: 11px;
        width: 14px;
        height: 14px;
        z-index: 400;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }


    .text-gray {
        color: #999;
    }
</style>
