<?php
namespace keeko\group\action\base;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\Group;
use keeko\core\model\GroupQuery;
use keeko\core\exceptions\ValidationException;
use keeko\core\utils\HydrateUtils;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Base methods for Updates a group
 * 
 * This code is automatically created
 * 
 * @author gossi
 */
trait GroupUpdateActionTrait {

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

		// set response and go
		$this->response->setData($group);
		return $this->response->run($request);
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultParams(OptionsResolverInterface $resolver) {
		$resolver->setRequired(['id']);
	}
}
