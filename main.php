<?php 
require_once("auth.php"); 
require_once("config.php");
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
                        <?php
                            require_once("query.php");
                            $data = new query;
                            $allRoadName = $data->getRoadDataName();
                            $allRoadName = json_encode($allRoadName, true);
                            echo '<div id="allRoadName" style="display:none;">' . $allRoadName . '</div>';
                        
                        ?>
                        <script src=js/roadname.js></script>
                        
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
            <?php
                require_once("query.php");
                $data = new query;

                $allLocations = $data->getAllLocations();
                $allLocations = json_encode($allLocations, true);
                echo '<div id="allLocations" style="display:none;">' . $allLocations . '</div>';
            ?>
            <div id="map"></div>
            <script src="js/mainmaps.js"></script>
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