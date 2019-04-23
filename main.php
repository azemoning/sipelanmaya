<?php 
require_once("auth.php"); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIPELAN MAYA - Main</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="avatarIcon">
                    <img src="img/user/avatar.png" alt="SIPELAN MAYA">
                </div>
                <p><?= $_SESSION['name'] ?></p>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="profile.php">EDIT PROFILE</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">ROAD
                        DATA</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="roadpage.php">Add Road Data
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                    class="fa fa-plus"></i></a>
                        </li>
                        <li>
                            <a href="#">Road 1</a>
                        </li>
                        <li>
                            <a href="#">Road 2</a>
                        </li>
                        <li>
                            <a href="#">Road 3</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="#" data-toggle="modal" data-target="#logoutModal" class="download">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="geser">
                        <div class="logoIcon">
                            <img src="img/page/mainlogo.png" />
                        </div>
                        <input id="pac-input" class="controls" placeholder="Location Search">
                    </div>
                </div>
            </nav>
            <div id="map"></div>
            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: { lat: -7.966410, lng: 112.631778 },
                        zoom: 15,
                    });
                    var input = document.getElementById('pac-input');

                    var autocomplete = new google.maps.places.Autocomplete(input);
                    autocomplete.bindTo('bounds', map);   
                    var infowindow = new google.maps.InfoWindow();                 
                     var infowindowContent = [
                         ['<h3>Jalan 1</h3><br><p>Ditutup karena perbaikan jalan</p>'],
                         ['<h3>Jalan 2</h3><br><p>Ditutup karena ada hajatan warga</p>'],
                         ['<h3>Jalan 3</h3><br><img src="img/page/jembatan.jpg" style="object-fit:contain;height:200px;"><br><p>Ditutup lur, karena jembatan ambruk <br>puter balik, cari jalan lain.</p>']
                     ]
                     var lokasiTutup = [
                         ['Tutup',-7.961832,112.637608],
                         ['Tutup',-7.965115,112.642468],
                         ['Tutup',-7.969960,112.629872]
                     ];
                     var marker,i;
                     google.maps.event.addListener(map, 'click', function(event) {
                         placeMarker(event.LatLng);
                     })

                     function placeMarker(location) {
                         var marker = new google.maps.Marker({
                             position: location,
                             map: map
                         });
                     }
                     for (i=0; i < lokasiTutup.length; i++){
                          marker= new google.maps.Marker({
                              position: new google.maps.LatLng(lokasiTutup[i][1],lokasiTutup[i][2]),
                              map: map
                          });
                         google.maps.event.addListener(marker, 'click', (function(marker,i){
                             return function(){
                                 infowindow.setContent(infowindowContent[i][0]);
                                 infowindow.open(map,marker);
                             }
                         })(marker,i));
                     }

                    autocomplete.addListener('place_changed', function () {
                        infowindow.close();
                        marker.setVisible(false);
                        var place = autocomplete.getPlace();
                        if (!place.geometry) {
                            window.alert("Autocomplete's returned place contains no geometry");
                            return;
                        }

                        // If the place has a geometry, then present it on a map.
                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);
                        }
                        marker.setIcon(({
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(35, 35)
                        }));
                        marker.setPosition(place.geometry.location);
                        marker.setVisible(true);

                        var address = '';
                        if (place.address_components) {
                            address = [
                                (place.address_components[0] && place.address_components[0].short_name || ''),
                                (place.address_components[1] && place.address_components[1].short_name || ''),
                                (place.address_components[2] && place.address_components[2].short_name || '')
                            ].join(' ');
                        }

                        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                        infowindow.open(map, marker);

                        //Location details
                        for (var i = 0; i < place.address_components.length; i++) {
                            if (place.address_components[i].types[0] == 'postal_code') {
                                document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
                            }
                            if (place.address_components[i].types[0] == 'country') {
                                document.getElementById('country').innerHTML = place.address_components[i].long_name;
                            }
                        }
                        document.getElementById('location').innerHTML = place.formatted_address;
                        document.getElementById('lat').innerHTML = place.geometry.location.lat();
                        document.getElementById('lon').innerHTML = place.geometry.location.lng();
                    });
                }
            </script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmLiGqpeUDEaRmzNyogxvoI_psQiSNBnk&libraries=places&callback=initMap"
                async defer></script>
        </div>
    </div>
    <!-- Small modal -->
    <div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Log Out</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                    <div class="actionsBtns">
                        <form action="logout.php" method="post">
                            <input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}" />
                            <input type="button" class="btn btn-default btn-primary" data-dismiss="modal" value="Logout" onclick="location.href='logout.php'"/>
                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>