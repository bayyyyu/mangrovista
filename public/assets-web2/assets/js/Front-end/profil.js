
function changeTab(tabId) {
    var tabs = document.querySelectorAll('.nav-tab');
    tabs.forEach(tab => {
        tab.classList.remove('active-nav');
    });

    var contents = document.querySelectorAll('.tab-content-item');
    contents.forEach(content => {
        content.style.display = 'none';
    });

    var selectedTab = document.getElementById(tabId + '-tab');
    selectedTab.classList.add('active-nav');

    var selectedContent = document.getElementById(tabId + '-content');
    selectedContent.style.display = 'block';

    // Memeriksa apakah tab yang dipilih adalah 'keluar', 
    // jika ya, tampilkan modal
    if (tabId === 'keluar') {
        $('#exampleModal').modal('show');
    }
}
changeTab('dashboard');

document.addEventListener("DOMContentLoaded", function () {
    function changeTab(tabId) {
        var tabs = document.querySelectorAll('.nav-tab');
        tabs.forEach(tab => {
            tab.classList.remove('active-nav');
        });

        var contents = document.querySelectorAll('.tab-content-item');
        contents.forEach(content => {
            content.style.display = 'none';
        });

        var selectedTab = document.getElementById(tabId + '-tab');
        selectedTab.classList.add('active-nav');

        var selectedContent = document.getElementById(tabId + '-content');
        selectedContent.style.display = 'block';

        // Memeriksa apakah tab yang dipilih adalah 'keluar', 
        // jika ya, tampilkan modal
        if (tabId === 'keluar') {
            $('#exampleModal').modal('show');
        }
    }

    // Periksa hash di URL
    var hash = window.location.hash.substring(1);
    if (hash) {
        changeTab(hash);
    } else {
        changeTab('dashboard'); // Tab default
    }
});
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();


document.getElementById('upload-photo').addEventListener('change', function () {
    console.log('Change event triggered');
    var reader = new FileReader();

    reader.onload = function (e) {
        document.getElementById('preview-image').setAttribute('src', e.target.result);
        $('#exampleModalCenter').modal('show'); // Show the modal
    }

    reader.readAsDataURL(this.files[0]);
});


function chooseAgain() {
    // Menghapus nilai input file
    var uploadPhoto = document.getElementById('upload-photo');
    uploadPhoto.value = null;

    // Membuka kembali dialog pemilihan file
    uploadPhoto.click();
}

function toggleTransform(button) {
    var overlays = button.closest('.overlays');
    overlays.classList.toggle('active');
}

function restoreOverlay() {
    var overlays = document.querySelectorAll('.overlays');
    overlays.forEach(overlay => {
        overlay.classList.remove('active');
    });
}
