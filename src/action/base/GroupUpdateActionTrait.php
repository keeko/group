<?php
namespace keeko\group\action\base;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use keeko\core\model\GroupQuery;
use keeko\core\exceptions\ValidationException;
use keeko\core\utils\HydrateUtils;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Base methods for keeko\group\action\GroupUpdateAction
 * 
 * This code is automatically created. Modifications will probably be overwritten.
 * 
 * @author gossi
 */
trait GroupUpdateActionTrait {

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureParams(OptionsResolver $resolver) {
		$resolver->setRequired(['id']);
	}

	/**
	 * Automatically generated run method
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function run(Request $request) {
		// read
		$id = $this->getParam('id');
		$group = GroupQuery::create()->findOneById($id);

		// check existence
		if ($group === null) {
			throw new ResourceNotFoundException('group not found.');
		}

		// hydrate
		$data = json_decode($request->getContent(), true);
		$group = HydrateUtils::hydrate($data, $group, ['id', 'owner_id', 'name', 'is_guest', 'is_default', 'is_active', 'is_system']);

		// validate
		if (!$group->validate()) {
			throw new ValidationException($group->getValidationFailures());
		} else {
			return $this->response->run($request, $group);
		}
	}
}
