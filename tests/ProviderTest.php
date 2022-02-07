<?php

namespace Tests;

use Illuminate\Support\Facades\Blade;

class ProviderTest extends TestCase
{
    public function test_can_render_script_directive()
    {
        $compiled = Blade::compileString("@igniteDateScripts");

        $expected = '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>';

        $this->assertSame($expected, $compiled);
    }

    public function test_can_render_style_directive()
    {
        $compiled = Blade::compileString("@igniteDateStyles");

        $expected = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">';

        $this->assertSame($expected, $compiled);
    }
}
