<?php
namespace Elimuswift\Core\Controllers;

use App\Http\Controllers\Controller;
use Elimuswift\Core\Traits\VerifiesPurchase;
use Elimuswift\Core\Contacts\RepositoryContract;
use Elimuswift\Core\Contacts\CustomersRepository;

/**
* 
*/
class InstallManagerController extends Controller
{
	// When including ths trait make sure you inject RepositoryContract as $repository and 
	// CustomersRepository as $customers to the constructor
	use VerifiesPurchase;
	
	/**
	 * Update Repository 
	 *
	 * @var mixed
	 **/
	public $repository;

	/**
	 * Customers Repository 
	 *
	 * @var mixed
	 **/
	public $customers;

	/**
	 * Create a new instance of the UpdatesManagerController::class
	 * 
	 **/	
	public function __construct(RepositoryContract $repository, CustomersRepository $customers)
	{
		$this->repository = $repository;
		$this->customers = $customers;
	}

	/**
	 * 
	 *
	 * @return mixed Illuminate\Http\Response
	 * @param $version Version to fetch 
	 **/
	public function getInstaller($version)
	{
		$response = $this->verifyPurchase();
		if(null == $this->customer)
			return $this->invalidKeyResponse();
		$install = $this->repository->config('install.resourcePath')."/install_{$version}.zip";
		if(file_exists($install)){
			return response()->download($install);
		}

	}
	
}