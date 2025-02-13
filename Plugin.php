<?php

namespace Kanboard\Plugin\TaskAssignDueDateOnMoveColumnByPriority;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskAssignDueDateOnMoveColumnByPriority\Action\TaskAssignDueDateOnMoveColumnByPriority;

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskAssignDueDateOnMoveColumnByPriority($this->container));
    }

        public function getPluginName()
    {
        return 'TaskAssignDueDateOnMoveColumnByPriority';
    }

    public function getPluginDescription()
    {
        return t('Automatically assign a due date when moving to a column based on priority');
    }

    public function getPluginAuthor()
    {
        return 'Lasse Faber';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/DKFZ-NGSCF/kanboard-TaskAssignDueDateOnMoveColumnByPriority';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.43';
    }
}