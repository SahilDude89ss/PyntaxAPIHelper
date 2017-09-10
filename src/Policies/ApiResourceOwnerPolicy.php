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
        return $this->checkIfResourceIfOwnerByTheUser($user, $resource);
    }

    /**
     * @param $user
     * @param $resource
     * @return bool
     */
    public function update($user, $resource)
    {
        return $this->checkIfResourceIfOwnerByTheUser($user, $resource);
    }

    /**
     * @param $user
     * @param $resource
     * @return bool
     */
    public function delete($user, $resource)
    {
        return $this->checkIfResourceIfOwnerByTheUser($user, $resource);
    }

    /**
     *
     * @param $user
     * @param $resource
     *
     * @return bool
     */
    protected function checkIfResourceIfOwnerByTheUser($user, $resource)
    {
        // Lets load the authProtectedForeignKey
        $authProtectedForeignKey = $this->loadAuthProtectedForeignKey();

        // Lets get the Primary Key for the user
        $userPrimaryKey = $user->getKey();

        if (!empty($authProtectedForeignKey) && !empty($resource->{$authProtectedForeignKey})) {
            return $user->{$userPrimaryKey} == $resource->{$authProtectedForeignKey};
        }

        return false;
    }
}
