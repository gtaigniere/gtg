<?php

namespace Html;

class Form
{
    /**
     * @var array
     */
    private $datas;

    /**
     * Form constructor.
     * @param array $datas
     */
    public function __construct(array $datas)
    {
        $this->datas = $datas;
    }

    /**
     * @return array
     */
    public function getDatas(): array
    {
        return $this->datas;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function getValue(string $key): ?string
    {
        return array_key_exists($key, $this->datas) ? $this->datas[$key] : null;
    }

    /**
     * @param string $name
     * @param string|null $label
     * @param array $options
     * @return string
     */
    public function input(string $name, ?string $label = null, array $options = []): string
    {
        $params = '';
        foreach ($options as $key => $value) {
            $params .= ' ' . $key . '="' . $value .'"';
        }
        if (!array_key_exists('type', $options)) {
            $params .= ' type="text"';
        }
        $html = '';
        if ($label != null) {
            $html = '<label for="' . $name . '">' . $label . '</label>';
        }
        return $html .= '<input id="' . $name . '" name="' . $name . '" value="' . $this->getValue($name) . '"' . $params . '>';
    }

    /**
    * @param string $name
    * @param string $label
    * @param array $options
    * @return string
    */
    public function textarea(string $name, ?string $label = null, array $options = []): string
    {
        $params = '';
        foreach($options as $key => $value) {
            $params .= ' ' . $key . '="' . $value . '"';
        }
        $html = '';
        if ($label != null ) {
            $html .= '<label for="' . $name . '">' . $label . '</label>';
        }
        return $html .= '<textarea id="' . $name . '" name="' . $name . '"' . $params .'>' . $this->getValue($name) . '</textarea>';
    }

}
