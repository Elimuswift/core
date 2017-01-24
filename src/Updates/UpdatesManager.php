<?php
namespace Elimuswift\Core\Updates;

use Elimuswift\Core\Update;

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
	
	public function __construct(UpdatesRepository $update)
	{
		# code...
	}

	/**
	 * Return all the available releses
	 *
	 * @return mixed Collection
	 *  
	 **/
	public function releases()
	{
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