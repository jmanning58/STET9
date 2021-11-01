<!DOCTYPE html>
<html>
    <head>
        <script type = "text/javascript" src = "js/googlemaps.js"></script>
        <style type = "text/css">
            .container {
                height: 450px;
            }
            #map {
               width: 100%;
               height: 100%;
            }
        </style>
    </head>
<body>
    <div class = "container">
        <div id = "map"></div>
    </div>
</body>
<script async defer 
    src = "https://maps.googleapis.com/maps/api/js?key=YOUR_AUTH_KEY&callback=loadMap">
</script>
</html>