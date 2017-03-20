<?php

namespace Elimuswift\Core\Repositories;

use Elimuswift\Core\Customer;

/**
 * Update data repository.
 */
class CustomersRepository
{
    /**
     * Customer Model instance.
     *
     * @var mixed
     **/
    public $customer;

    /**
     * Create a new instance of the CustomerRepository::class.
     **/
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

//end __construct()

    /**
     * Find a customer by a field.
     *
     * @return mixid $this
     **/
    public function findCustomer($key, $value)
    {
        return $this->customer->where($key, $value)->first();
    }

//end findCustomer()

    /**
     * Create Customer with the received response.
     *
     * @return Customer
     *
     * @param array $data
     **/
    public function createCustomer($data)
    {
        // TODO: Perform basic validation on the customer object before saving
        return $this->customer->create($data);
    }

//end createCustomer()
}//end class
