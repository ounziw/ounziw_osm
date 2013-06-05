<script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script type="text/javascript">
    var map;
    function init() {

        map = new OpenLayers.Map("canvas");
        var mapnik = new OpenLayers.Layer.OSM();
        map.addLayer(mapnik);

        var lonLat = new OpenLayers.LonLat(<?= \Arr::get($enhancer_args, 'lon', 139.76) ?>, <?= \Arr::get($enhancer_args, 'lat', 35.68) ?>)
            .transform(
                new OpenLayers.Projection("EPSG:4326"),
                new OpenLayers.Projection("EPSG:900913")
            );
        map.setCenter(lonLat, <?= \Arr::get($enhancer_args, 'zoom', 15)?>);
        map.events.register("mousemove", map, getParam);
        $("#initbutton").hide();

    }

    function getParam() {
        var lonLat = map.getCenter().transform(
            new OpenLayers.Projection("EPSG:900913"),
            new OpenLayers.Projection("EPSG:4326")
        );
        var zoom = map.getZoom();
        var extent = map.getExtent().transform(
            new OpenLayers.Projection("EPSG:900913"),
            new OpenLayers.Projection("EPSG:4326")
        );

        $("#lat").val(lonLat.lat);
        $("#lon").val(lonLat.lon);
        $("#zoom").val(zoom);
        $("#left").val(extent.left);
        $("#right").val(extent.right);
        $("#top").val(extent.top);
        $("#bottom").val(extent.bottom);
    }
</script>
<div id="initbutton"  onclick="init()"><?= __('Click to Show Map') ?></div>
    <div id="canvas" style="width:425px; height:350px"></div>
<div style="display:none;">
    緯度：<?= \Fuel\Core\Form::input('lat', '', array('id' => 'lat'));?><br />
    経度：<?= \Fuel\Core\Form::input('lon', '', array('id' => 'lon'));?><br />
    ズームレベル：<?= \Fuel\Core\Form::input('zoom', '', array('id' => 'zoom'));?><br />
    <?= \Fuel\Core\Form::input('left', '', array('id' => 'left'));?><br />
    <?= \Fuel\Core\Form::input('right', '', array('id' => 'right'));?><br />
    <?= \Fuel\Core\Form::input('top', '', array('id' => 'top'));?><br />
    <?= \Fuel\Core\Form::input('bottom', '', array('id' => 'bottom'));?><br />
</div>
