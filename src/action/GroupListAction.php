<?php
namespace keeko\group\action;

use keeko\core\action\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\Group;
use keeko\core\model\GroupQuery;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * List all groups
 * 
 * @author gossi <http://gos.si>
 */
class GroupListAction extends AbstractAction
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
    public function setDefaultParams(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
        	'page' => 1,
        	'per_page' => AbstractAction::MAX_PER_PAGE,
        ]);
    }
}
