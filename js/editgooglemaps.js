var marker, map;
var dataMarker = JSON.parse(document.getElementById('dataMarker').innerHTML);
      function changeimagepreview(event){
          var reader = new FileReader();
          reader.onload = function()
          {
              var output = document.getElementById('imagepreview');
              output.src = reader.result;
          }
          reader.readAsDataURL(event.target.files[0]);
      }
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: { lat: -7.966410, lng: 112.631778 },
          zoom: 13
        });
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(dataMarker.lat, dataMarker.lng),
            map: map,
            draggable: true
        });
        var lat = document.getElementById('lat');
        lat.value = dataMarker.lat;
        var lng = document.getElementById('lng');
        lng.value = dataMarker.lng;   
        var label = document.getElementById('name');
        label.value = dataMarker.label;
        var description = document.getElementById('description');
        description.value = dataMarker.description;
        var imageprev = document.getElementById('imagepreview');
        imageprev.src = `img/user/${dataMarker.media}`;
        google.maps.event.addListener(marker,'dragend',function(){
                 
            var setlat = marker.getPosition().lat();
            var setlng = marker.getPosition().lng();

            $('#lat').val(setlat);
            $('#lng').val(setlng);
        });
     }