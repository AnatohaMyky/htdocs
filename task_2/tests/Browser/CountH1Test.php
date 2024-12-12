<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CountH1Test extends DuskTestCase
{
    /**
     *
     * @return void
     */
    public function testCountH1Elements()
    {
        $this->browse(function (Browser $browser) {
            $h1Count = $browser->visit('https://en.wikipedia.org/wiki/Main_Page')
                               ->script("return document.querySelectorAll('h1').length;")[0];
    
            $this->assertGreaterThan(0, $h1Count, 'На сторінці має бути хоча б один H1 елемент.');
    
            echo "Кількість елементів H1 на сторінці: {$h1Count}" . PHP_EOL;
        });
    }
    
}
