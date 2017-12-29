<?php

/**
 * Ushahidi Platform Entity Create Use Case
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Platform
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

namespace Ushahidi\Core\Usecase;

use Ushahidi\Core\Entity;
use Ushahidi\Core\Usecase;
use Ushahidi\Core\Tool\AuthorizerTrait;
use Ushahidi\Core\Tool\FormatterTrait;
use Ushahidi\Core\Tool\ValidatorTrait;

class CreateUsecase implements Usecase
{
	// Uses several traits to assign tools. Each of these traits provides a
	// setter method for the tool. For example, the AuthorizerTrait provides
	// a `setAuthorizer` method which only accepts `Authorizer` instances.
	use AuthorizerTrait,
		FormatterTrait,
		ValidatorTrait;

	// - ModifyRecords for setting entity modification parameters
	use Concerns\ModifyRecords;

	/**
	 * @var CreateRepository
	 */
	protected $repo;

	/**
	 * Inject a repository that can create entities.
	 *
	 * @param  $repo CreateRepository
	 * @return $this
	 */
	public function setRepository(CreateRepository $repo)
	{
		$this->repo = $repo;
		return $this;
	}

	// Usecase
	public function isWrite()
	{
		return true;
	}

	// Usecase
	public function isSearch()
	{
		return false;
	}

	// Usecase
	public function interact()
	{
		// Fetch a default entity and apply the payload...
		$entity = $this->getEntity();

		// ... verify that the entity can be created by the current user
		$this->verifyCreateAuth($entity);

		// ... verify that the entity is in a valid state
		$this->verifyValid($entity);

		// ... persist the new entity
		$id = $this->repo->create($entity);

		// ... get the newly created entity
		$entity = $this->getCreatedEntity($id);

		// ... check that the entity can be read by the current user
		if ($this->auth->isAllowed($entity, 'read')) {
			// ... and either return the formatted entity
			return $this->formatter->__invoke($entity);
		} else {
			// ... or just return nothing
			return;
		}
	}

	// ValidatorTrait
	protected function verifyValid(Entity $entity)
	{
		if (!$this->validator->check($entity->asArray())) {
			$this->validatorError($entity);
		}
	}

	/**
	 * Get an empty entity, apply the payload.
	 *
	 * @return Entity
	 */
	protected function getEntity()
	{
		return $this->repo->getEntity()->setState($this->payload);
	}

	/**
	 * Get the created entity.
	 *
	 * @param  Mixed $id
	 * @return Entity
	 */
	protected function getCreatedEntity($id)
	{
		return $this->repo->get($id);
	}
}
