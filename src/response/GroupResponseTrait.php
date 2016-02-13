<?php
namespace keeko\group\response;

use keeko\core\model\Group;
use keeko\core\utils\FilterUtils;
use Propel\Runtime\Map\TableMap;

/**
 * Automatically generated common response methods for group
 * 
 * @author gossi
 */
trait GroupResponseTrait {

	/**
	 * Automatically generated method, will be overridden
	 * 
	 * @param array $group
	 */
	protected function filter(array $group) {
		return FilterUtils::blacklistFilter($group, []);
	}

	/**
	 * Automatically generated method, will be overridden
	 * 
	 * @param Group $group
	 */
	protected function groupToArray(Group $group) {
		return $this->filter($group->toArray(TableMap::TYPE_CAMELNAME));
	}
}
