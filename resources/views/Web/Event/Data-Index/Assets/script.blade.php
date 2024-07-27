<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        // Menyembunyikan semua konten tab
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Menghapus class active dari semua tombol tab-link
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Menampilkan konten tab yang dipilih dan menambahkan class active pada tombol tab-link
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Menampilkan tab default secara otomatis
    document.getElementById("defaultOpen").click();

    function searchEvent() {
        var input, filter, tabcontent, cards, cardTitle, i;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        tabcontent = document.getElementsByClassName("tabcontent");

        for (i = 0; i < tabcontent.length; i++) {
            cards = tabcontent[i].getElementsByClassName("campaign-card");

            for (var j = 0; j < cards.length; j++) {
                cardTitle = cards[j].querySelector("h3");

                if (cardTitle.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[j].style.display = "";

                } else {
                    cards[j].style.display = "none";
                }
            }
        }

        var clearSearch = document.getElementById("clearSearch");
        if (filter !== "") {
            clearSearch.style.display = "inline";
        } else {
            clearSearch.style.display = "none";
        }

    }

    function clearSearch() {
        var input = document.getElementById("searchInput");
        input.value = "";
        searchEvent();
    }

    function handleSearch(event) {
        if (event.keyCode === 13) {
            searchEvent();
            event.preventDefault();
        }
    }
</script>
