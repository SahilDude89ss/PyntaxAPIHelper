<?php

/**
 * Class RepositoryTest
 */
class RepositoryTest extends Tests\TestCase
{
    /**
     *
     */
    public function testCreatingARepositoryWithAModel()
    {
        $config = config('pyntax-api-helper.policies.authProtectedForeignKey');
        $this->assertEquals(
            $config,
            "users_id"
        );
    }
}