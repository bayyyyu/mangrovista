<style>
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
        /* Anda bisa menyesuaikan tinggi sesuai kebutuhan */
    }

    .progress-bar {
        background-color: #064635;
    }

    .content-progress {
        font-size: 12px;
        color: rgb(187, 185, 185);
        padding-inline: 100px;
    }

    /* Style untuk tombol tab-link */
    .tab button {
        float: left;
        cursor: pointer;
        transition: 0.3s;
    }

    /* Style untuk tombol tab-link aktif */
    .tab button.active {
        background-color: #064635 !important;
        color: white !important;
    }

    .search::-webkit-input-placeholder {
        color: #064635;
    }

    .search-container {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-wrap: wrap;
        margin-left: auto;
    }

    #searchInput {
        margin-right: 10px;
    }

    @media screen and (max-width: 768px) {
        .search-container {
            flex-direction: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .tab {
            text-align: center;
        }

        .tab button {
            float: none;
            display: inline-block;

        }
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
</style>
