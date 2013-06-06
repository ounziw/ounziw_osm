<?php
/**
 * OSM for NOVIUS OS
 *
 * @copyright  2013 Fumito MIZUNO
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://ounziw.com
 */

namespace Osm;

use Nos\Controller_Front_Application;

use View;

class Controller_Front extends Controller_Front_Application
{

    protected $enhancer_args = array();

    public function action_main($enhancer_args = array())
    {
        extract($enhancer_args,EXTR_SKIP);
         return <<<EOF
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=$left,$bottom,$right,$top&amp;layer=mapnik" style="border: 1px solid black"></iframe><br /><small><a href="http://www.openstreetmap.org/?lat=$lat&amp;lon=$lon&amp;zoom=$zoom&amp;layers=M">View Larger Map</a></small>
EOF;
    }

}
