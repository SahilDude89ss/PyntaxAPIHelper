<?php

/**
 * Class RepositoryTest
 */
class RepositoryTest extends Tests\TestCase
{
    use \Pyntax\Traits\ServiceForResource;

    /**
     *
     */
    public function testCreatingARepositoryWithAModel()
    {
        $this->assertInstanceOf(
            \Pyntax\Contracts\Repositories\Repository::class,
            $this->loadRepositoryForGivenResource('users')
        );
    }

    public function testCreatingAServiceWithAModel()
    {
        $this->assertInstanceOf(
            \Pyntax\Contracts\Services\Service::class,
            $this->loadServiceForGivenResource('users')
        );
    }

    public function testCreateAUserUsingTheService()
    {
        $userEmail = 'SahildDude89ss@gmail.com';

        $repository = $this->loadRepositoryForGivenResource('users');
        $user = $repository->create(['first_name' => 'Dummy', 'last_name' => 'Dummy', 'email' => $userEmail]);

        $this->assertAttributeEquals($userEmail, 'email', $user);
    }
}