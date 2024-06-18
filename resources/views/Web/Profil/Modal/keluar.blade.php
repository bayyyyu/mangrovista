<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p> Yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-block" data-dismiss="modal" style="width: 50%;">Batal</button>
                <a href="{{ url('Logout') }}" class="btn btn-danger btn-block"
                    style="width: 50%; margin-top:0; color:white">Keluar</a>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-content {
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    .modal-body p {
        font-weight: bold;
        color: black;
        margin-bottom: 0px;
        margin-top: 10px;
    }

    .modal-footer {
        border: none;
        /* Menghilangkan border */
    }

    .modal-footer button {
        background-color: transparent;
        color: #064635;
        border: 1px solid #064635;
        transition: background-color 0.3s, color 0.3s;
    }

    .modal-footer button:hover {
        background-color: #064635;
        color: white;
    }
</style>
