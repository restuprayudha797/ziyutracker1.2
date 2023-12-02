<head>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div id="contentToUpdate">
                    </i>
                    <div id="map"></div>
                </div>
            </div>
        </div>

        <!-- Leaflet JavaScript -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script>
            var latitude = <?= $marker['lat'] ?>;
            var longitude = <?= $marker['lng'] ?>;
            var datetime = '<?= $marker['datetime'] ?>';

            var map = L.map('map').setView([latitude, longitude], 13);

            // Tambahkan layer dari Leaflet
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

            }).addTo(map);

            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup("<b>Terakhir Dilihat</b><br>" + datetime).openPopup();

            setInterval(function() {

                var data = '<?= $_GET['data'] ?>';

                $.ajax({
                    url: "<?= base_url('updateLokasi'); ?>",
                    method: "POST",
                    data: {
                        data: data
                    },
                    dataType: "json",
                    success: function(data) {
                        latitude = data.lat;
                        longitude = data.lng;
                        var lat = (data.lat);
                        var lng = (data.lng);
                        var newLatLng = new L.LatLng(lat, lng);
                        marker.setLatLng(newLatLng);
                        marker.setPopupContent("<b>Terakhir Dilihat</b><br>" + data.datetime);

                        // console.log(data);


                    },
                    error: function(error) {
                        console.error("Error fetching data: " + error);
                    }
                });

            }, 1000);
        </script>
</body>