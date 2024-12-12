<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CountH1Test extends DuskTestCase
{
    /**
     * Тест перевіряє кількість H1 елементів на сторінці.
     *
     * @return void
     */
    public function testCountH1Elements()
    {
        $this->browse(function (Browser $browser) {
            try {
                // Відвідування сторінки
                $h1Count = $browser->visit('https://uk.wikipedia.org/')
                                   ->script("return document.querySelectorAll('h1').length;")[0];

                // Перевірка, що є хоча б один H1
                $this->assertGreaterThan(0, $h1Count, 'На сторінці має бути хоча б один H1 елемент.');

                // Виведення результату
                echo "Кількість елементів H1 на сторінці: {$h1Count}" . PHP_EOL;

            } catch (\Exception $e) {
                // Обробка помилок
                echo "Помилка під час тестування: " . $e->getMessage() . PHP_EOL;
                $this->fail('Тест завершився з помилкою.');
            }
        });
    }
}
