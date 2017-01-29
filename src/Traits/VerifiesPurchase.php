<?php
namespace Elimuswift\Core\Traits;

trait VerifiesPurchase {

	
	/**
	 * Customer Entity
	 *
	 * @var mixed
	 **/
	protected $customer;

	/**
	 * Verify validity of the purchase key and if valid create customer
	 *
	 * @return void
	 * 
	 **/
	public function verifyPurchase()
	{
		$this->getCustomer();
		if(null != $this->customer)
			return $this->validKeyResponse();

		$response = app()->envatoapi->verifyPurchase(request('code'));
		if('error' == $response['status'])
			return $this->invalidKeyResponse();
		// If we are here then the key is valid
		// We now create a new customer record from the envato api response
		$this->customer = $this->customers->createCustomer($response['response']);
		// After creation of customer details return the response back to the user
		return $this->validKeyResponse();
	}

	/**
	 * Return invalid key response
	 *
	 * @return mixed Illuminate\Http\Response 
	 **/
	protected function invalidKeyResponse()
	{
		return response()->json(['status' => 'error', 'description' => 'Invalid purchase key'], 403);
	}

	/**
	 * Set the customer object
	 *
	 * @return void 
	 **/
	protected function getCustomer()
	{
		$this->customer = $this->customers->findCustomer('purchaseKey',request()->get('code'));
	}

	/**
	 * Return a success response if the purchase key is valid.
	 *
	 * @return nixed Illuminate\Http\Response object 
	 **/
	protected function validKeyResponse()
	{
		return response()->json(['status' => 'success', 'description' => $this->customer->tojson()]);
	}
}