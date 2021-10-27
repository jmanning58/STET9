function loadMap() {
    var uluru = {lat: -23.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: uluru
    });
}