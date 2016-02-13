<?php
namespace keeko\group\response;

use keeko\core\package\AbstractResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Automatically generated JsonResponse for Creates a group
 * 
 * @author gossi
 */
class GroupCreateJsonResponse extends AbstractResponse {

	use GroupResponseTrait;

	/**
	 * Automatically generated run method
	 * 
	 * @param Request $request
	 * @param mixed $data
	 * @return JsonResponse
	 */
	public function run(Request $request, $data = null) {
		return new JsonResponse($this->groupToArray($data), 201);
	}
}
