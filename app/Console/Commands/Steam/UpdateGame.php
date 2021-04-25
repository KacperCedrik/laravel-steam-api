<?php

namespace App\Console\Commands\Steam;

use Illuminate\Console\Command;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Http;

class UpdateGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'steam:update-game {game?}';
    //protected $signature = 'steam:update-game {game=FIFA}';
    protected $signature = 'steam:update-game {game}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private Factory $httpClient;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $httpClient)
    {
        parent::__construct();
        $this->httpClient = $httpClient;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*$response = Http::get('https://postman-echo.com/get', [
            'foo' => 'bar',
            'alpha' => 'omega'
        ]);*/

        $response = $this->httpClient->get('https://postman-echo.com/get', [
            'foo' => 'bar',
            'alpha' => 'omega'
        ]);

        $response = $this->httpClient->post('https://postman-echo.com/postsss', [
            'foo' => 'bar',
            'alpha' => 'omega',
            'post' => true
        ]);

        /**
            $response->body() : string;
            $response->json() : array|mixed;
            $response->status() : int;
            $response->ok() : bool;
            $response->successful() : bool;
            $response->failed() : bool;
            $response->serverError() : bool;
            $response->clientError() : bool;
            $response->header($header) : string;
            $response->headers() : array;
        */

        //dump($response->body());
        dump($response->status());
        dump($response->json());

        if ($response->failed()) {
            $this->error('Error ...');
        }

        return 0;
    }

    public function handle_one(Factory $httpClient)
    {
        $game = $this->argument('game');
        $this->line($game);

        //$answer = $this->ask("Czy to Twoja ulubiona gra?");
        //if ($answer) {}
        //dump($answer);

        //if($this->confirm("Czy chcesz zaktualizować grę?")) {
        //    dump('Zrobiles to');
        //}

        $this->error('Error ...');
        $this->question('Question ...');
        $this->comment('Comment ...');
        $this->info('Info ...');
        $this->line('Line ...');

        return 0;
    }
}
