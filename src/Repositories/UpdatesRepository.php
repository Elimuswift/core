<?php
namespace Elimuswift\Core\Repositories;

use Elimuswift\Core\Update;

/**
* Update data repository
*/
class UpdatesRepository implements Contracts\RepositoryContract
{
	/**
	 * Update Model instance
	 *
	 * @var mixed
	 **/
	public $updates;
	/**
	 * Create a new instance of the UpdatesManager::class
	 * 
	 **/
	
	public function __construct(Update $update)
	{
		$this->updates = $update;
	}

	/**
	 * Return all the available releses
	 *
	 * @return mixed Illuminate\Support\Collection
	 *  
	 **/
	public function releases()
	{
		return $this->updates->all();
	}

	/**
	 * Get a specific update version
	 *
	 * @return object Elimuswift\Core\Update instance
	 * @param string $version Build version 
	 **/
	public function getRelease($version)
	{
		return $this->updates->whereVersion($version)->first();
	}

	/**
	 * Get releases later than the provided $version
	 *
	 * @return  object Illuminate\Support\Collection
	 * @param string $version Version to compare
	 **/
	public function laterThan($version)
	{
		return $this->updates->where('version', '>', $version)->get();
	}

	/**
	 * Get the latest update version
	 *
	 * @return object Elimuswift\Core\Update instance
	 * 
	 **/
	public function latest()
	{
		return $this->updates->orderBy('version','DESC')->first();
	}



}