function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -7.966410, lng: 112.631778 },
        zoom: 14,
    });
    var input = document.getElementById('pac-input');
    var marker;
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);   
    var infowindow = new google.maps.InfoWindow();
    var allLocations = JSON.parse(document.getElementById('allLocations').innerHTML);
    Array.prototype.forEach.call(allLocations, function(data){
        var infoWindowContent = document.createElement('div');
        var label = document.createElement('h5');
        var descriptionParent = document.createElement('div');
        var image = document.createElement('img');
        var descriptionContent = document.createElement('p');
        var footerParent = document.createElement('div');
        var footerContent = document.createElement('p');
        label.textContent = data.label;
        descriptionContent.textContent = data.description;
        image.src = `../img/user/${data.media}`;
        descriptionParent.appendChild(image);
        descriptionParent.appendChild(descriptionContent);
        footerContent.textContent = `Added by : ${data.name}`;
        footerParent.appendChild(footerContent);
        infoWindowContent.appendChild(label);
        infoWindowContent.appendChild(descriptionParent);
        infoWindowContent.appendChild(footerParent);

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat,data.lng),
            map: map
        });

        marker.addListener('click', function(){
            infowindow.setContent(infoWindowContent);
            infowindow.open(map, marker);
        });
    });
    autocomplete.addListener('place_changed', function () {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
    });
}