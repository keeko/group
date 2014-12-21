<?php
namespace keeko\group\response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\Group;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * JsonResponse for Deletes a group
 * 
 * @author gossi
 */
class GroupDeleteJsonResponse extends AbstractGroupResponse {

	/**
	 * Automatically generated method, will be overridden
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function run(Request $request) {
		// return response
		return new JsonResponse($this->groupToArray($this->data));
	}
}