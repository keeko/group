<?php
namespace keeko\group\action\base;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use keeko\core\model\GroupQuery;

/**
 * Base methods for keeko\group\action\GroupListAction
 * 
 * This code is automatically created. Modifications will probably be overwritten.
 * 
 * @author gossi
 */
trait GroupListActionTrait {

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureParams(OptionsResolver $resolver) {
		$resolver->setDefaults([
			'page' => 1,
			'per_page' => 50,
		]);
	}

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

		// run response
		return $this->response->run($request, $group);
	}
}
