<?php

namespace Kanboard\Plugin\TaskAssignDueDateOnMoveColumnByPriority;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskAssignDueDateOnMoveColumnByPriority\Action\TaskAssignDueDateOnMoveFromColumnByPriority;
use Kanboard\Plugin\TaskAssignDueDateOnMoveColumnByPriority\Action\TaskAssignDueDateOnMoveFromToColumnByPriority;
use Kanboard\Plugin\TaskAssignDueDateOnMoveColumnByPriority\Action\TaskAssignDueDateOnMoveToColumnByPriority;

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskAssignDueDateOnMoveFromColumnByPriority($this->container));
        $this->actionManager->register(new TaskAssignDueDateOnMoveFromToColumnByPriority($this->container));
        $this->actionManager->register(new TaskAssignDueDateOnMoveToColumnByPriority($this->container));
    }

    public function getPluginName()
    {
        return 'TaskAssignDueDateOnMoveColumnByPriority';
    }

    public function getPluginDescription()
    {
        return t('Assign a due date when moving to/from a (specific) column based on priority');
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