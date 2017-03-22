<?php

namespace Elimuswift\Core\Updates;

use Elimuswift\Core\Update;
use Elimuswift\Core\Repositories\Contracts\RepositoryContract;

/**
 * Manage application updates.
 */
class UpdatesManager
{
    /**
     * Update Repository.
     *
     * @var mixed
     **/
    public $repository;

    /**
     * Create a new instance of the UpdatesManager::class.
     *
     * @param RepositoryContract $repository description
     **/
    public function __construct(RepositoryContract $repository)
    {
        $this->repository = $repository;
    }

//end __construct()

    /**
     * Determin if the customer has already verified the product.
     *
     * @param string $purchaseKey
     **/
    public function verifyCustomer($purchaseKey)
    {
        $this->repository->findCustomer($purchaseKey);
    }

//end verifyCustomer()

    /**
     * Get a specific update version.
     *
     * @param string $version Build version
     **/
    public function getRelease($version)
    {
    }

//end getRelease()
}//end class
