<?php
namespace keeko\group\action;

use keeko\core\action\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\Group;
use keeko\core\exceptions\ValidationException;
use keeko\core\utils\HydrateUtils;

/**
 * Creates a group
 * 
 * @author gossi <http://gos.si>
 */
class GroupCreateAction extends AbstractAction
{
    /**
     * Automatically generated method, will be overridden
     * 
     * @param Request $request
     * @return Response
     */
    public function run(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        // hydrate
        $group = HydrateUtils::hydrate($data, new Group(), ['id', 'user_id', 'name', 'is_guest', 'is_default', 'is_active', 'is_system']);

        // validate
        if (!$group->validate()) {
        	throw new ValidationException($group->getValidationFailures());
        } else {
        	$group->save();
        	$this->response->setData($group);
        	return $this->response->run($request);
        }
    }
}
