<?php
namespace keeko\group\action\base;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\Group;
use keeko\core\exceptions\ValidationException;
use keeko\core\utils\HydrateUtils;

/**
 * Base methods for keeko\group\action\GroupCreateAction
 * 
 * This code is automatically created. Modifications will probably be overwritten.
 * 
 * @author gossi
 */
trait GroupCreateActionTrait {

	/**
	 * Automatically generated run method
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function run(Request $request) {
		$data = json_decode($request->getContent(), true);

		// hydrate
		$group = HydrateUtils::hydrate($data, new Group(), ['id', 'owner_id', 'name', 'is_guest', 'is_default', 'is_active', 'is_system']);

		// validate
		if (!$group->validate()) {
			throw new ValidationException($group->getValidationFailures());
		} else {
			$group->save();
			return $this->response->run($request, $group);
		}
	}
}
