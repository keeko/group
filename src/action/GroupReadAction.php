<?php
namespace keeko\group\action;

use keeko\core\action\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\Group;
use keeko\core\model\GroupQuery;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Reads a group
 * 
 * @author gossi <http://gos.si>
 */
class GroupReadAction extends AbstractAction
{
    /**
     * Automatically generated method, will be overridden
     * 
     * @param Request $request
     * @return Response
     */
    public function run(Request $request)
    {
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
    public function setDefaultParams(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['id']);
    }
}
