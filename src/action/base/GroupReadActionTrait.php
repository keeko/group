<?php
namespace keeko\group\action\base;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use keeko\core\model\GroupQuery;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Base methods for keeko\group\action\GroupReadAction
 * 
 * This code is automatically created. Modifications will probably be overwritten.
 * 
 * @author gossi
 */
trait GroupReadActionTrait {

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

		// run response
		return $this->response->run($request, $group);
	}
}
