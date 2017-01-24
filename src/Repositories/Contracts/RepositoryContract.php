<?php
namespace Elimuswift\Core\Repositories\Contracts;


/**
* Repository contract
*/
interface RepositoryContract
{
	
	/**
	 * Return all the available releses
	 *
	 * @return mixed Illuminate\Support\Collection
	 *  
	 **/
	public function releases();

	/**
	 * Get a specific update version
	 *
	 * @return object Elimuswift\Core\Update instance
	 * @return object Illuminate\Filesystem\Filesystem
	 * @param string $version Build version 
	 **/
	public function getRelease($version);

	/**
	 * Get releases later than the provided $version
	 *
	 * @return  object Illuminate\Support\Collection
	 * @param string $version Version to compare
	 **/
	public function laterThan($version);

	/**
	 * Get the latest update version
	 *
	 * @return object Elimuswift\Core\Update instance
	 * @return object Illuminate\Filesystem\Filesystem
	 * 
	 **/
	public function latest();



}