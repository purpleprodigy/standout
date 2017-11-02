<?php
/**
 * Whoops displayer handler
 *
 * @package     Support
 * @since       1.0.0
 * @author      Purple Prodigy
 * @link        http://www.purpleprodigy.com
 * @licence     GNU General Public License 2.0+
 */
namespace Support;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$whoops_displayer = new Run();
configure_whoops( $whoops_displayer );

function configure_whoops( $displayer ) {
	$handler = new PrettyPageHandler();
	$handler->setEditor( 'sublime');

	$displayer->pushHandler( $handler );
	$displayer->register();
}
