<?php
namespace Elimuswift\Core\Middleware;

use Closure;

class LicenseChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $licenseKey = null)
    {
        
    	if ($this->validLicense($licenseKey)) {
        	return $next($request);
    	}
    	else {
    		return response()->json(['UnAuthorized' => 'Invalid Purchase Key'], 403);
    	}

    }

    /** 
     * Check if license key is valid
     *
     * @return boolean
     **/
    private function validLicense($licenseKey)
    {

        $purchase = app()->envatoapi->verifyPurchase($licenseKey);
        if (is_array($purchase) and $purchase['status'] == 'success') {
            return true;
        }
        return false;

    }
}
