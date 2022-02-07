<?php

namespace Ignite\View\Components;

class DateRange extends Date
{
    /**
     * Display Date format
     *
     * @string
     */
    public string $displayFormat = 'Y-m-d';

    /**
     * Date mode (single, multiple or range)
     *
     * @string
     */
    public string $mode = 'range';

    /**
     * Date options
     *
     * @var array
     */
    public array $options = [
        'monthSelectorType' => 'static',
        'showMonths' => 2
    ];
}
