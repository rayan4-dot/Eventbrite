<?php

namespace App\Core;

class Validator
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MATCH = 'match';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_UNIQUE = 'unique';
    public const RULE_DATE = 'date';

    public array $errors = [];

    public function validate(array $data, array $rules): bool
    {
        foreach ($rules as $attribute => $attributeRules) {
            $value = $data[$attribute] ?? null;
            foreach ($attributeRules as $rule) {
                $ruleName = $rule;
                if (is_array($rule)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && empty($value)) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MATCH && isset($rule['match']) && $value !== ($data[$rule['match']] ?? null)) {
                    $this->addError($attribute, self::RULE_MATCH);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->createErrorMessage($attribute, "This field must be greater than {$rule['min']} characters");
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->createErrorMessage($attribute, "This filed must be less than {$rule['max']} characters");
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $class = $rule['class'] ?? null;
                    if ($class) {
                        $record = $class::findOne([$attribute => $value]);
                        if ($record) {
                            $this->addError($attribute, self::RULE_UNIQUE);
                        }
                    }
                }
                if($ruleName === self::RULE_DATE) {
                    $minDate = $rule['minDate'];
                    if(strtotime($value) < strtotime($minDate)) {
                        $this->addError($attribute, self::RULE_DATE);
                    }
                }
            }
        }
//        dump($this->errors); die;
        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule): void
    {
        $this->errors[$attribute][] = $this->errorMessages()[$rule];
    }

    public function createErrorMessage(string $attribute, string $message): void
    {
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => 'This field is required.',
            self::RULE_EMAIL => 'This field must be a valid email address.',
            self::RULE_MATCH => 'This field must be a matching pattern.',
            self::RULE_MIN => 'This filed must be more than {min}',
            self::RULE_MAX => 'This filed must me less than {max}',
            self::RULE_UNIQUE => 'This value is already exist',
            self::RULE_DATE => 'Invalid date'
        ];
    }

    public function getFirstError(string $attribute): string
    {
        return $this->errors[$attribute][0];
    }
}