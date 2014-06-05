<?php
namespace keeko\group\response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\Group;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Json Response for List all groups
 * 
 * @author gossi <http://gos.si>
 */
class GroupListJsonResponse extends AbstractGroupResponse
{
    /**
     * Automatically generated method, will be overridden
     * 
     * @param Request $request
     * @return Response
     */
    public function run(Request $request)
    {
        $out = [];

        // build model
        $out['groups'] = [];
        foreach ($this->data as $group) {
        	$out['groups'][] = $this->groupToArray($group);
        }

        // meta
        $out['meta'] = [
        	'total' => $this->data->getNbResults(),
        	'first' => $this->data->getFirstPage(),
        	'next' => $this->data->getNextPage(),
        	'previous' => $this->data->getPreviousPage(),
        	'last' => $this->data->getLastPage()
        ];

        // return response
        return new JsonResponse($out);
    }
}
