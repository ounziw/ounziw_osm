<?php
extract($enhancer_args,EXTR_SKIP);
print <<<EOF
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=$left,$bottom,$right,$top&amp;layer=mapnik&amp;marker=$lat,$lon" style="border: 1px solid black"></iframe><br /><small><a href="http://www.openstreetmap.org/?lat=$lat&amp;lon=$lon&amp;zoom=$zoom&amp;layers=M">View Larger Map</a></small>
EOF;
