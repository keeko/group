<?php
namespace keeko\group\action;

use keeko\core\package\AbstractAction;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Tobscure\JsonApi\Exception\InvalidParameterException;
use keeko\core\model\GroupQuery;

/**
 */
class GroupActionReadAction extends AbstractAction {

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
		$id = $this->getParam('id');
		$group = GroupQuery::create()->findOneById($id);

		// run response
		return $this->response->run($request, $group);
	}
}
