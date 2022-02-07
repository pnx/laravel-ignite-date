<?php

namespace Ignite\View\Components;

class Date extends Input
{
    /**
     * Date format
     *
     * @string
     */
    public string $format = 'Y-m-d';

    /**
     * Display Date format
     *
     * @string
     */
    public string $displayFormat = 'F d, Y';

    /**
     * Date mode (single, multiple or range)
     *
     * @string
     */
    public string $mode = 'single';

    /**
     * Date options
     *
     * @var array
     */
    public array $options = [
        'monthSelectorType' => 'static'
    ];

    /**
     * Create a new component instance.
     *
     * @var string $name
     * @var string|null $id
     * @var string|null $value
     * @var bool $disabled
     * @var string|null $format
     * @var string|null $displayFormat
     * @var array $options
     * @return void
     */
    public function __construct(string $name, ?string $id = null, ?string $value = '', bool $disabled = false,
                                ?string $format = null, ?string $displayFormat = null, array $options = [])
    {
        parent::__construct($name, $id, "text", $value, $disabled);

        if ($format) {
            $this->format = $format;
        }

        if ($displayFormat) {
            $this->displayFormat = $displayFormat;
        }

        $this->options = collect($this->options)
            ->merge($options)->toArray();
    }

    /**
     * Get date options
     *
     * @return array
     */
    public function options() : array
    {
        $override = [
            'mode' => $this->mode,
            'dateFormat' => $this->format,
        ];

        if ($this->format !== $this->displayFormat) {
            $override['altInput'] = true;
            $override['altFormat'] = $this->displayFormat;
        }

        return collect($this->options)->merge($override)->toArray();
    }

    /**
     * Get date options encoded in json.
     *
     * @return string
     */
    public function jsonOptions() : string
    {
        return json_encode((object) $this->options());
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ignite::date');
    }
}
