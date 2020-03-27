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
     * @return string
     */
    public function input(string $name, ?string $label = null): string
    {
        $html = '';
        if ($label != null) {
            $html = '<label for="' . $name . '">' . $label . '</label>';
        }
        $html .= '<input id="' . $name . '" type="text" name="' . $name . '" value="' . $this->getValue($name) . '">';
    }

}
