<?php
namespace keeko\group\response;

use keeko\core\package\AbstractResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Automatically generated JsonResponse for List all groups
 * 
 * @author gossi
 */
class GroupListJsonResponse extends AbstractResponse {

	use GroupResponseTrait;

	/**
	 * Automatically generated run method
	 * 
	 * @param Request $request
	 * @param mixed $data
	 * @return JsonResponse
	 */
	public function run(Request $request, $data = null) {
		$out = [];

		// build model
		$out['groups'] = [];
		foreach ($data as $group) {
			$out['groups'][] = $this->groupToArray($group);
		}

		// meta
		$out['meta'] = [
			'total' => $data->getNbResults(),
			'first' => $data->getFirstPage(),
			'next' => $data->getNextPage(),
			'previous' => $data->getPreviousPage(),
			'last' => $data->getLastPage()
		];

		// return response
		return new JsonResponse($out);
	}
}
