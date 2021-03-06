<?php namespace Cms\Components;

use Cms\Classes\ComponentBase;

/**
 * ViewBag stores custom template properties, hidden in the backend.
 *
 * @package october\cms
 * @author Alexey Bobkov, Samuel Georges
 */
class ViewBag extends ComponentBase
{
    /**
     * @var boolean This component is hidden from the back-end UI.
     */
    public $isHidden = true;

    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name' => 'View Bag',
            'description' => 'Stores custom template properties.'
        ];
    }

    /**
     * @param array $properties
     * @return array
     */
    public function validateProperties(array $properties)
    {
        return $properties;
    }

    /**
     * Implements the getter functionality.
     * @param  string  $name
     * @return void
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        return null;
    }

    /**
     * Determine if an attribute exists on the object.
     * @param  string $key
     * @return bool
     */
    public function __isset($key)
    {
        if (array_key_exists($key, $this->properties)) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function defineProperties()
    {
        $result = [];

        foreach ($this->properties as $name => $value) {
            $result[$name] = [
                'title' => $name,
                'type' => 'string'
            ];
        }

        return $result;
    }
}
