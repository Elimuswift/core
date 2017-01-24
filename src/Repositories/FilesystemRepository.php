<?php
namespace Elimuswift\Core\Repositories;

use Illuminate\Filesystem\Filesystem;

/**
* Update data repository
*/
class FilesystemRepository
{

	/**
	 * Get a specific update version
	 *
	 * @return object Illuminate\Filesystem\Filesystem instance
	 * @param string $version Build version 
	 **/
	public function getRelease($version)
	{
		return \Storage::get("updates/update_{$version}.zip");	
	}



}