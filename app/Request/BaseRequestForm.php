<?php

namespace App\Request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class BaseRequestForm
{
    protected $_request;
    /**
     * @var bool
     */
    private $status = true;
    /**
     * @var array
     */
    private $errors = [];

    /**
     * @return array
     */
    abstract public function rules();

    public function __construct(Request $request = null, $forceDie = true)
    {
        if ($request) {
            $this->_request = $request;
            $rules          = $this->rules();

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $error = $validator->errors()->toArray();

                if ($forceDie) {
                    throw ValidationException::withMessages($error);
                } else {
                    $this->status = false;
                    $this->errors = $error;
                }
            }
        }
    }

    /**
     * @return bool
    */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->_request;
    }
}
