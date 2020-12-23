<?php

abstract class AbstractForm
{
    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var array;
     */
    private $params;

    abstract public function getOptions(): array;

    /**
     * AbstractForm constructor.
     *
     * @param $params
     */
    public function __construct($params)
    {
        $this->params = $params;
        $this->validate();
    }

    protected function validate()
    {
        foreach ($this->getOptions() as $key => $option)
        {
            if (is_array($option)){
                foreach ($option as $validator)
                {
                    $optionsString = stristr($validator,',');
                    $options = $this->parseOptions($optionsString);
                    $validator = explode(',', $validator)[0];
                    /** @var ValidationInterface $class */
                    if (!file_exists('lib/Validation/'.lcfirst($validator).'Validation'.'.php')){
                        throw new ErrorValidatorException('The validator does not exist');
                    }
                    $className = lcfirst($validator).'Validation';
                    $class = new $className;
                    if (!$class->validate($this->params[$key], $options)){
                        $this->errors[$key] = $class->getMessage();
                    }
                }
            }
        }
    }

    /**
     * @param $optionsString
     *
     * @return array
     */
    private function parseOptions($optionsString): array
    {
        $options = [];
        $array = explode(';', trim($optionsString, ','));
        foreach ($array as $key => $value){
            $params = explode('=', $value);
            $options[$params[0]] = $params[1];
        }

        return $options;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}