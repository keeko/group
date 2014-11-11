<?php
namespace keeko\group\action\base;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\Group;
use keeko\core\model\GroupQuery;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Base methods for List all groups
 * 
 * This code is automatically created
 * 
 * @author gossi
 */
trait GroupListActionTrait {

	/**
	 * Automatically generated run method
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function run(Request $request) {
		// read
		$page = $this->getParam('page');
		$perPage = $this->getParam('per_page');
		$group = GroupQuery::create()->paginate($page, $perPage);

		// set response and go
		$this->response->setData($group);
		return $this->response->run($request);
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultParams(OptionsResolverInterface $resolver) {
		$resolver->setDefaults([
			'page' => 1,
			'per_page' => 50,
		]);
	}
}
