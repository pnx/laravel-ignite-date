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

        // Assert that the input element contains some valid data.
        $view->assertSeeInOrder([
            '<input',
            'id="date-id"',
            'name="xdatex"',
            'x-data="{}"',
            'x-init="flatpickr',
            '>'
        ], false);
    }
}
