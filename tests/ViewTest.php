<?php

namespace Tests;

use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class ViewTest extends TestCase
{
    use InteractsWithViews;

    public function test_view_component_is_loaded()
    {
        $this->assertTrue(View::exists('ignite::date'));
    }

    public function test_can_render_date_component()
    {
        $this->withViewErrors([]);

        $view = $this->blade('<x-ignite-date id="date-id" name="xdatex" />');
        $options = e(json_encode([
            "monthSelectorType" => "static",
            "mode" => "single",
            "dateFormat" => "Y-m-d",
            "altInput" => true,
            "altFormat" => "F d, Y"
        ]));

        // Assert that the input element contains some valid data.
        $view->assertSeeInOrder([
            '<input',
            'id="date-id"',
            'name="xdatex"',
            'x-data="{}"',
            "x-init=\"flatpickr(\$refs.this, $options)\"",
            '>'
        ], false);
    }

    public function test_can_render_date_range_component()
    {
        $this->withViewErrors([]);

        $view = $this->blade('<x-ignite-date-range id="date-range-id" name="xdatex" />');
        $options = e(json_encode([
            "monthSelectorType" => "static",
            "showMonths" => 2,
            "mode" => "range",
            "dateFormat" => "Y-m-d",
        ]));

        // Assert that the input element contains some valid data.
        $view->assertSeeInOrder([
            '<input',
            'id="date-range-id"',
            'name="xdatex"',
            'x-data="{}"',
            "x-init=\"flatpickr(\$refs.this, $options)\"",
            '>'
        ], false);
    }

    public function test_can_render_date_time_component()
    {
        $this->withViewErrors([]);

        $view = $this->blade('<x-ignite-date-time id="date-time-id" name="xdatex" />');
        $options = e(json_encode([
            "monthSelectorType" => "static",
            "minuteIncrement" => 1,
            "enableTime" => true,
            "time_24hr" => false,
            "mode" => "single",
            "dateFormat" => "Y-m-d H:i",
            "altInput" => true,
            "altFormat" => "F d, Y H:i"
        ]));


        // Assert that the input element contains some valid data.
        $view->assertSeeInOrder([
            '<input',
            'id="date-time-id"',
            'name="xdatex"',
            'x-data="{}"',
            "x-init=\"flatpickr(\$refs.this, $options)\"",
            '>'
        ], false);
    }
}
