<?php

namespace Pyntax\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Pyntax\Traits\ServiceForResource;

/**
 * Class ApiResourcePolicy
 * @package App\Policies
 */
class ApiResourceOwnerPolicy
{
    use HandlesAuthorization, ServiceForResource;

    /**
     * @param $user
     * @return bool
     */
    public function create($user)
    {
        // We don't really have any logic here at the moment
        return true;
    }

    /**
     * @param $user
     * @param $resource
     *
     * @return bool
     */
    public function view($user, $resource)
    {
        // Lets load the authProtectedForeignKey
        $authProtectedForeignKey = $this->loadAuthProtectedForeignKey();

        if (!empty($authProtectedForeignKey)) {
            return $user->id == $resource->{$authProtectedForeignKey};
        }

        return true;
    }

    /**
     * @param $user
     * @param $resource
     * @return bool
     */
    public function update($user, $resource)
    {
        // Lets load the authProtectedForeignKey
        $authProtectedForeignKey = $this->loadAuthProtectedForeignKey();

        if (!empty($authProtectedForeignKey)) {
            return $user->id == $resource->{$authProtectedForeignKey};
        }

        return true;
    }

    /**
     * @param $user
     * @param $resource
     * @return bool
     */
    public function delete($user, $resource)
    {
        // Lets load the authProtectedForeignKey
        $authProtectedForeignKey = $this->loadAuthProtectedForeignKey();

        if (!empty($authProtectedForeignKey)) {
            return $user->id == $resource->{$authProtectedForeignKey};
        }

        return true;
    }
}
