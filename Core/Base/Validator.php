<?php


namespace Core\Base;


use Core\Exceptions\ValidateRuleException;

abstract class Validator
{
    abstract protected function rules(): array;
    protected array $errors = [];

    public function validate(array $fields){
        $rules = $this->rules();
        foreach ($fields as $field => $value) {
            isset($rules[$field]) or throw new ValidateRuleException("Rule for \"$field\" doesn't exists");
            if (!is_array($rules[$field])) {
                $rules[$field] = [$rules[$field]];
            }
            foreach ($rules[$field] as $rule) {
                if (is_callable($rule)) {
                    call_user_func($rule, $value) or $this->errors[$field] = "Field \"$field\" is not valid!!!";
                } else {
                    match ($rule) {
                        'number' => is_numeric($value),
                        'text' => !preg_match('/<[^>]+>/', $value),
                        'email' => preg_match('/^[\w\-]+@[\w\-.]+\.[a-z]+$/', $value),
                        'safe' => true,
                        default => throw new ValidateRuleException("Rule \"{$rule}\" is incorrect!!!")
                    } or $this->errors[$field] = "Field \"$field\" should be \"{$rule}\"";
                }
            }
        }
        return empty($this->errors);
    }

    public function getError(): array
    {
        return $this->errors;
    }
}
