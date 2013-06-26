<?php
/**
 * OSM for NOVIUS OS
 *
 * @copyright  2013 Fumito MIZUNO
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://ounziw.com
 */

namespace OunziwOsm;

use Nos\Controller_Front_Application;
use View;

class Controller_Front extends Controller_Front_Application
{

    protected $enhancer_args = array();

    public function action_main($enhancer_args = array())
    {
        return \View::forge('ounziw_osm::front',$enhancer_args, false);
    }

}
