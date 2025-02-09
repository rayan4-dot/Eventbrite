<?php

namespace App\Core;

abstract class Model
{
    protected Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator;
    }

    abstract function rules() : array;

    public function loadData(array $data) : void
    {
        foreach($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate() : bool
    {
        return $this->validator->validate(get_object_vars($this), $this->rules());
    }

    public function getErrors() : array
    {
        return $this->validator->errors;
    }

    public function getFirstError(string $attribute) : string
    {
        return $this->validator->getFirstError($attribute);
    }

}