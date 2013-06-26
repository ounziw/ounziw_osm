<script type="text/javascript" src="static/apps/ounziw_osm/leaflet.js"></script>
<link rel='stylesheet' href='static/apps/ounziw_osm/leaflet.css' type='text/css' media='all' />
<link rel='stylesheet' href='static/apps/ounziw_osm/leaflet.ie.css' type='text/css' media='all' />
<?php
$left = floatval(\Arr::get($enhancer_args, 'left', 139.40881));
$right = floatval(\Arr::get($enhancer_args, 'right', 139.40881));
$bottom = floatval(\Arr::get($enhancer_args, 'bottom', 35.64483));
$top = floatval(\Arr::get($enhancer_args, 'top', 35.64483));
$centerlat = ($bottom+$top)/2;
$centerlon = ($left+$right)/2;
$zoom = floatval(\Arr::get($enhancer_args, 'zoom', 15));
$lat = floatval(\Arr::get($enhancer_args, 'lat', 35.64483));
$lon = floatval(\Arr::get($enhancer_args, 'lon', 139.40881));
?>
<script type="text/javascript">
  L.Icon.Default.imagePath = "static/apps/ounziw_osm/images";
  var map = L.map('map').setView([<?php echo $centerlat;?>, <?php echo $centerlon;?>], <?php echo $zoom;?>);
  var osmUrl = "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
  var osmAttrib = "Map data © OpenStreetMap contributors";
  L.tileLayer(osmUrl, {
    attribution: osmAttrib,
    maxZoom: 20,
  }).addTo(map);
  var marker = L.marker([<?php echo $lat;?>, <?php echo $lon;?>]).addTo(map);
    //alert(L.lat);
  map.on("click", function(e) {
    marker.setLatLng(e.latlng);
    $("#lat").val(e.latlng.lat);
    $("#lon").val(e.latlng.lng);
    setup_mapdata();
  });
  map.on("mousemove", function(e) {
    setup_mapdata();
  });
  function setup_mapdata() {
    $("#zoom").val(map.getZoom());
    $("#left").val(map.getBounds().getSouthWest().lng);
    $("#right").val(map.getBounds().getNorthEast().lng);
    $("#bottom").val(map.getBounds().getSouthWest().lat);
    $("#top").val(map.getBounds().getNorthEast().lat);
  }
</script>
    <div id="map" style="width:425px; height:350px"></div>
<div><!-- style="display:none;" -->
    <?= __('Latitude') ?>: <?= \Fuel\Core\Form::input('lat', $lat, array('id' => 'lat'));?><br />
    <?= __('Longitude') ?>: <?= \Fuel\Core\Form::input('lon', $lon, array('id' => 'lon'));?><br />
    <?= __('Zoom') ?>: <?= \Fuel\Core\Form::input('zoom', '', array('id' => 'zoom'));?><br />
    <?= __('left') ?>: <?= \Fuel\Core\Form::input('left', '', array('id' => 'left'));?><br />
    <?= __('right') ?>: <?= \Fuel\Core\Form::input('right', '', array('id' => 'right'));?><br />
    <?= __('bottom') ?>: <?= \Fuel\Core\Form::input('bottom', '', array('id' => 'bottom'));?><br />
    <?= __('top') ?>: <?= \Fuel\Core\Form::input('top', '', array('id' => 'top'));?><br />
</div>
