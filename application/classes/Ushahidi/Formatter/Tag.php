<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Ushahidi API Formatter for Tag
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

use Ushahidi\Core\Traits\FormatterAuthorizerMetadata;

class Ushahidi_Formatter_Tag extends Ushahidi_Formatter_API
{
	use FormatterAuthorizerMetadata;

	protected function format_color($value)
	{
		// enforce a leading hash on color, or null if unset
		$value = ltrim($value, '#');
		return $value ? '#' . $value : null;
	}

    protected function format_children($tags)
    {
        $output = [];

        if (is_array($tags)) {
            foreach ($tags as $tagid)
            {
                $output[] = $this->get_relation('tags', $tagid);
                //$output[] = intval($tagid);
            }
        }

        return $output;
    }
}
