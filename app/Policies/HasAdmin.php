<?php

namespace PaoloDavila\TodosBackend\Policies;

/**
 * Class HasAdmin.
 *
 * @package PaoloDavila\TodosBackend\Policies
 */
trait HasAdmin
{
    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) return true;
    }
}