
<?php get_header();?>

<main>

<div class="contact-grid">
    <div class="footer-items">
        <div class="mail-chimp"><?php echo do_shortcode("[mc4wp_form id='1179']"); ?></div>
        <div class="contacts">
            <p>Contactează-ne</p>
            <p><span>facebook</span> <a href="https://www.facebook.com/CentruldeUrbanism/">Centrul de Urbanism</a></p>
            <p>centruldeurbanism@gmail.com</p>
            <p>+37378068453</p>
            <p>str. 31 august 1989, nr. 98
                Uniunea Scriitorilor, of. 402, 2004 Chișinău, Moldova
            </p>
        </div>
    </div>
    <div id="map">
        <script>
            function initMap() {
                // Styles a map in night mode.
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 47.0288, lng: 28.821},
                    zoom: 18,
                    disableDefaultUI: true,
                    styles: [
                        {
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#24d5a1"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.text",
                            "stylers": [
                                {
                                    "color": "#0d0d0b"
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.attraction",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.business",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.business",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "color": "#ec4a71"
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.government",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.medical",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        }
                    ]
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7wS-_BbZrAHnua7AhZlAh7Owa1dCOMwk&callback=initMap"
                async defer></script>
    </div>

</div>



</main>

<?php ?>

