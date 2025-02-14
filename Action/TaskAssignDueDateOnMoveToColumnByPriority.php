<?php

namespace Kanboard\Plugin\TaskAssignDueDateOnMoveColumnByPriority\Action;

use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;

/**
 * Set the due date when a task is moved to a specific column based on priority
 *
 * @package Kanboard\Action
 * @author  Lasse Faber
 */
class TaskAssignDueDateOnMoveToColumnByPriority extends Base
{
    /**
     * Get automatic action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Assign a due date when moved to a specific column based on priority');
    }

    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_MOVE_COLUMN,
        );
    }

    /**
     * Get the required parameter for the action (defined by the user)
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
            'priority' => t('Priority'),
            'duration' => t('Duration in days'),
            'dst_column_id' => t('Destination column'),
        );
    }
/**
     * Get the required parameter for the event
     *
     * @access public
     * @return string[]
     */
    public function getEventRequiredParameters()
    {
        return array(
            'task_id',
            'task' => array(
                'project_id',
            ),
            'dst_column_id',
            'priority'
        );
    }

    /**
     * Execute the action (Update the due date)
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
        $values = array(
            'id' => $data['task_id'],
            'date_due' => strtotime('+'.$this->getParam('duration').'days'),
        );
        return $this->taskModificationModel->update($values, false);
    }

    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return !empty($data['dst_column_id']) &&
               $data['dst_column_id'] == $this->getParam('dst_column_id') &&
               $data['task']['priority'] == $this->getParam('priority');
    }
}