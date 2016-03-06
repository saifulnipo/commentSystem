<?php

/**
 * Class Parameters
 * author: AQM Saiful Islam
 */
class Parameters
{
    /**
     * Email validation pattern with german umlauts.
     * If you get some problems, have a look at Punycode
     */
    const EMAIL_PATTERN = '/^[a-zA-Z0-9äöüÄÖÜ_.-]+@[a-zA-Z0-9äöüÄÖÜ][a-zA-Z0-9-äöüÄÖÜ.]+\.([a-zA-Z]{2,6})$/';

    /**
     * List of characters that will be removed from input values.
     *
     * @var array(string)
     */
    private static $_characterBlacklist = array (
        '<', '>', '#', '&lt;', '&gt;', ';', '=', '(', ')', '&', 'script'
    );


    /**
     * Returns a cleared Url input Parameter.
     *
     * @param string  $name             Parameter name
     * @param string  $type             What parameter type it is
     * @param string  $defaultValue     Default value
     * @param boolean $disableUrlDecode Disable the automatic url decode
     *
     * @return mixed
     */
    public static function getParam($name, $type = 'string', $defaultValue = null, $disableUrlDecode = false)
    {
        $rawValue     = self::_getValue($name, $disableUrlDecode);
        $cleanedValue = self::validateParameterValue($rawValue, strtolower($type));

        if (null === $cleanedValue && $defaultValue !== null) {
            return $defaultValue;
        }
        
        return $cleanedValue;
    }

    /**
     * Return an array of parameters of the same type.
     *
     * @param string $name Name of the array.
     * @param string $type What parameter type it is for all the entries.
     *
     * @return array cleaned
     */
    public static function getArrayParams($name, $type = "string")
    {
        $rawValue = self::_getValue($name, true);
        $result = array();

        if ($rawValue === null || !is_array($rawValue)) {
            return $result;
        }

        foreach ($rawValue as $key => $value) {
            $result[] = self::validateParameterValue($value, strtolower($type));
        }
        return $result;
    }

    /**
     * Return the value from Request
     *
     * @param string $name             Parameter Name
     * @param bool   $disableUrlDecode check for decoding url
     *
     * @return mixed Parameter value
     */
    private static function _getValue($name, $disableUrlDecode = false)
    {
        if (isset($_REQUEST[$name])) {
            if (true === $disableUrlDecode) {
                return $_REQUEST[$name];
            }
            return urldecode($_REQUEST[$name]);
        }
        
        return null;
    }

    /**
     * This method validates the content of $value against the configured data type
     * and other constraints. When this validation is successful this method will
     * return a type save value. In all other cases it returns null.
     *
     * @param mixed  $rawValue The detected input value.
     * @param string $type     The parameter type.
     *
     * @access private Only for testing public
     * @return mixed
     */
    public static function validateParameterValue($rawValue, $type)
    {
        if (null === $rawValue || '' === $rawValue) {
            return null;
        }
         
        if ($type === 'integer' || $type === 'int') {
            $res = filter_var($rawValue, FILTER_VALIDATE_INT);
            if (false === $res) {
                return null;
            }
            return $res;
        }
        
        if ($type === 'float') {
            return filter_var($rawValue, FILTER_VALIDATE_FLOAT);
        }
        
        if ($type === 'boolean' || $type === 'bool') {
            return filter_var($rawValue, FILTER_VALIDATE_BOOLEAN);
        }

        if ($type === 'email') {
            if (0 === preg_match(self::EMAIL_PATTERN, $rawValue)) {
                return null;
            }

            return $rawValue;
        }

        return str_replace(self::$_characterBlacklist, '', $rawValue);
    }
}