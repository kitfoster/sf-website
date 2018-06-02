<div id="googleMap" style="width:100%;height:500px;"></div>

<script>


function myMap() {
var latLng = new google.maps.LatLng(-37.816887, 144.963291);
var mapProp= {
  center: latLng,
  zoom:14,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({
  position: latLng,
  map: map,
  title: 'Sinisgalli Foster'
});
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj4vyoYrfUWnVDwdIR0SiUHpjwNOk9Nxc&callback=myMap"></script>
