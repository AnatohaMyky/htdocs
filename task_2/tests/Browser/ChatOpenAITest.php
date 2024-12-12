<?php

namespace Tests\Browser;

use Illuminate\Support\Facades\Log;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ChatOpenAITest extends DuskTestCase
{
    /**
     *
     */
    public function testChatOpenAI()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://chat.openai.com/')
                    ->type('#username', 'your-email@example.com') 
                    ->type('#password', 'your-password')         
                    ->press('Log in')                           
                    ->waitFor('#chat-input', 15);               
    
            $question = "Hello!";
            $browser->type('#chat-input', $question)
                    ->press('#send-button')
                    ->waitFor('.chat-response', 15);
    
            $response = $browser->script("return document.querySelector('.chat-response').innerText;")[0];
    
            Log::info("Response from ChatGPT: " . $response);
        });
    }
}    
