
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg-primary">
        <h5 id="offcanvasRightLabel" class="m-0">Data Monitoring Event</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="monitoringDataContainer">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="ribbon1 rib1-secondary">
                        <span class="text-white text-center rib1-secondary">Tanggal Monitoring</span>
                    </div><!--end ribbon-->
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{ url('/') }}/assets-admin/assets/images/dashboards/crovex.jpg"
                                alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                        </div><!--end col-->
                        <div class="col align-self-center">
                            <p class="font-18 fw-semibold mb-2">Deskripsi Monitoring</p>
                            <div class="monitoring-info">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <b> Pohon Hidup:</b>
                                        <p> 10 Pohon</p>
                                    </div>
                                    <div class="col-md-6 ">
                                        <b> Pohon Mati:</b>
                                        <p> 10 Pohon</p>
                                    </div>
                                    <div class="col-md-6 ">
                                        <b> Rata-Rata Diameter Pohon:</b>
                                        <p> 10 Pohon</p>
                                    </div>
                                    <div class="col-md-6 ">
                                        <b> Rata-Rata Tinggi Pohon:</b>
                                        <p> 10 Pohon</p>
                                    </div>
                                    <div class="col-md-6 ">
                                        <b> Umur Pohon:</b>
                                        <p> 10 Pohon</p>
                                    </div>
                                </div>

                            </div>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
</div>
<style>
    .offcanvas.offcanvas-end.show {
        width: 700px
    }

    button .btn-close {
        color: black
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const baseUrl = "{{ asset('') }}";

    function loadMonitoringData(eventId) {
        $.ajax({
            url: `/Admin/Event/${eventId}/Monitoring/Data`,
            method: 'GET',
            success: function(data) {
                $('#monitoringDataContainer').empty(); // Clear previous data
                if (data.length === 0) {
                    $('#monitoringDataContainer').append(`
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center">Tidak ada data monitoring di event ini.</p>
                                </div>
                            </div>
                        </div>
                    `);
                } else {
                    data.forEach(function(item) {
                        $('#monitoringDataContainer').append(`
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="ribbon1 rib1-secondary">
                                            <span class="text-white text-center rib1-secondary">${item.tanggal_monitoring}</span>
                                        </div><!--end ribbon-->
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="${baseUrl + item.foto_monitoring}" alt="user" height="150"
                                                     class="align-self-center mb-3 mb-lg-0" style="height:150px; object-fit:contain">
                                            </div><!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2" style="text-decoration:underline">${item.monitoring_deskripsi}</p>
                                                <div class="monitoring-info">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <b> Pohon Hidup:</b>
                                                            <p>${item.pohon_hidup} Pohon</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b> Pohon Mati:</b>
                                                            <p>${item.pohon_mati} Pohon</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b> Rata-Rata Diameter Pohon:</b>
                                                            <p>${item.diameter_pohon} cm</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b> Rata-Rata Tinggi Pohon:</b>
                                                            <p>${item.tinggi_pohon} cm</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end row-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        `);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
