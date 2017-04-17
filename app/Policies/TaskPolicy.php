<?php

namespace PaoloDavila\TodosBackend\Policies;

use PaoloDavila\TodosBackend\User;
use PaoloDavila\TodosBackend\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class TaskPolicy.
 *
 * @package PaoloDavila\TodosBackend\Policies
 */
class TaskPolicy extends BasePolicy
{
    use HandlesAuthorization,HasAdmin;

    protected function model()
    {
        return 'task';
    }
}
