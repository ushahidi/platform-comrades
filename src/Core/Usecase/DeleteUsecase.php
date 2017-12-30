<?php

/**
 * Ushahidi Platform Delete Use Case
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Platform
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

namespace Ushahidi\Core\Usecase;

use Ushahidi\Core\Usecase;
use Ushahidi\Core\Tool\AuthorizerTrait;
use Ushahidi\Core\Tool\FormatterTrait;

class DeleteUsecase implements Usecase
{
	// Uses several traits to assign tools. Each of these traits provides a
	// setter method for the tool. For example, the AuthorizerTrait provides
	// a `setAuthorizer` method which only accepts `Authorizer` instances.
	use AuthorizerTrait,
		FormatterTrait;

	// - IdentifyRecords for setting entity lookup parameters
	use Concerns\IdentifyRecords;

	// - VerifyEntityLoaded for checking that an entity is found
	use Concerns\VerifyEntityLoaded;

	/**
	 * @var DeleteRepository
	 */
	protected $repo;

	/**
	 * Inject a repository that can delete entities.
	 *
	 * @param  $repo DeleteRepository
	 * @return $this
	 */
	public function setRepository(DeleteRepository $repo)
	{
		$this->repo = $repo;
		return $this;
	}

	// Usecase
	public function isWrite()
	{
		return false;
	}

	// Usecase
	public function isSearch()
	{
		return false;
	}

	// Usecase
	public function interact()
	{
		// Fetch the entity, using provided identifiers...
		$entity = $this->getEntity();

		// ... verify that the entity can be deleted by the current user
		$this->verifyDeleteAuth($entity);

		// ... persist the delete
		$this->repo->delete($entity);

		// ... verify that the entity can be read by the current user
		$this->verifyReadAuth($entity);

		// ... and return the formatted entity
		return $this->formatter->__invoke($entity);
	}

	/**
	 * Find entity based on identifying parameters.
	 *
	 * @return Entity
	 */
	protected function getEntity()
	{
		// Entity will be loaded using the provided id
		$id = $this->getRequiredIdentifier('id');

		// ... attempt to load the entity
		$entity = $this->repo->get($id);

		// ... and verify that the entity was actually loaded
		$this->verifyEntityLoaded($entity, compact('id'));

		// ... then return it
		return $entity;
	}
}
