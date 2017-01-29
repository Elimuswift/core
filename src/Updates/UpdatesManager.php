<?php
namespace Elimuswift\Core\Updates;

use Elimuswift\Core\Update;
use Elimuswift\Core\Repositories\Contracts\RepositoryContract;

/**
* Manage application updates
*/
class UpdatesManager
{
	/**
	 * Update Repository 
	 *
	 * @var mixed
	 **/
	public $repository;
	/**
	 * Create a new instance of the UpdatesManager::class
	 * 
	 **/
	
	public function __construct(RepositoryContract $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Determin if the customer has already verified the product
	 *
	 * @return void
	 * @param string $purchaseKey 
	 **/
	public function verifyCustomer($purchaseKey)
	{
		$this->repository->findCustomer($purchaseKey);
	}

	/**
	 * Get a specific update version
	 *
	 * @return void
	 * @param string $version Build version 
	 **/
	public function getRelease($version)
	{
	}

}