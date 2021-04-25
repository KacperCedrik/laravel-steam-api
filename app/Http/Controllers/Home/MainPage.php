<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPage extends Controller
{
    public function __invoke(Request $request)
    {

        $gameId = 44;
        //$url = url("games/$gameId");
        //$url = url()->current();
        //$url = url()->full();
        //$url = url()->previous();

        //$routeUrl = route('games.show', ['game' => $gameId]);
        //$routeUrl = route(
        //    'games.show',
        //    ['game' => $gameId, 'foo' => 'bar', 'test' => 1]
        //);

        //$actionUrl = action([GameController::class, 'dashboard']);
        //$actionUrl = action(
        //    [GameController::class, 'show'],
        //    ['game' => $gameId, 'foo' => 'bar']
        //);

        //dump($actionUrl);

        $user = Auth::user();

        return view('home.main', ['user' => $user]);
    }
}
