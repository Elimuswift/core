<?php
namespace Elimuswift\Core\Repositories;

use Elimuswift\Core\Customer;

/**
* Update data repository
*/
class CustomersRepository
{
	/**
	 * Customer Model instance
	 *
	 * @var mixed
	 **/
	public $customer;
	/**
	 * Create a new instance of the CustomerRepository::class
	 * 
	 **/
	
	public function __construct(Customer $customer)
	{
		$this->customer = $customer;
	}

	/**
	 * Find a customer by a field
	 *
	 * @return mixid $this 
	 **/
	public function findCustomer($key, $value)
	{
		return $this->customer->where($key, $value)->first();
	}
	
	/**
	 * Create Customer with the received response
	 *
	 * @return object Customer 
	 * @param array $data  
	 **/
	public function createCustomer($data)
	{
		// TODO: Perform basic validation on the customer object before saving
		return $this->customer->create($data);
	}




}