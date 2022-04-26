<?php

namespace Ignite\View\Components;

class DateTime extends Date
{
    /**
     * Date format
     *
     * @string
     */
    public string $format = 'Y-m-d H:i';

    /**
     * Display Date format
     *
     * @string
     */
    public string $displayFormat = 'F d, Y H:i';

    /**
     * Create a new component instance.
     *
     * @var string $name
     * @var string|null $id
     * @var string|null $value
     * @var bool $disabled
     * @var string|null $format
     * @var string|null $displayFormat
     * @var bool $time24h
     * @var array $options
     * @return void
     */
    public function __construct(string $name, ?string $id = null, ?string $value = '', bool $disabled = false,
                                ?string $format = null, ?string $displayFormat = null, bool $time24h = false, array $options = [])
    {
        $options = collect([
            'minuteIncrement' => 1,
        ])->merge($options)->merge([
            'enableTime' => true,
            'time_24hr' => $time24h,
        ])->toArray();

        parent::__construct($name, $id, $value, $disabled, $format, $displayFormat, $options);
    }
}
