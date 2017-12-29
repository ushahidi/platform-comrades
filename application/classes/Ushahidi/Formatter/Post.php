<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Ushahidi API Formatter for Post
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

use Ushahidi\Core\Tool\Formatter;
use Ushahidi\Core\Traits\FormatterAuthorizerMetadata;

class Ushahidi_Formatter_Post extends Ushahidi_Formatter_API
{
	use FormatterAuthorizerMetadata;

	public function __invoke($post)
	{
		// prefer doing it here until we implement parent method for filtering results
		// mixing and matching with metadata is just plain ugly
		$data = parent::__invoke($post);

		if (!in_array('read_full', $data['allowed_privileges']))
		{
			// Remove sensitive fields
			unset($data['author_realname']);
			unset($data['author_email']);
		}

		return $data;
	}

	protected function get_field_name($field)
	{
		$remap = [
			'form_id' => 'form',
			'message_id' => 'message',
			'contact_id' => 'contact'
			];

		if (isset($remap[$field])) {
			return $remap[$field];
		}

		return parent::get_field_name($field);
	}

	protected function format_form_id($form_id)
	{
		return $this->get_relation('forms', $form_id);
	}

	protected function format_message_id($form_id)
	{
		return $this->get_relation('messages', $form_id);
	}

	protected function format_contact_id($contact_id)
	{
		return $this->get_relation('contact', $contact_id);
	}

	protected function format_color($value)
	{
		// enforce a leading hash on color, or null if unset
		$value = ltrim($value, '#');
		return $value ? '#' . $value : null;
	}

	protected function format_tags($tags)
	{
		$output = [];
		foreach ($tags as $tagid)
		{
			$output[] = $this->get_relation('tags', $tagid);
		}

		return $output;
	}

	protected function format_post_date($value)
	{
		return $value ? $value->format(DateTime::W3C) : NULL;
	}
}
