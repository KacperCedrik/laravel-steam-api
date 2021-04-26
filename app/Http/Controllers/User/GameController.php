<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Model\User;
use App\Repository\GameRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddGameToUserList;
use App\Http\Requests\RemoveGameFromUserList;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    private GameRepository $gameRepository;

    public function __construct(GameRepository $gameRepository )
    {
        $this->gameRepository = $gameRepository;
    }


    public function list()
    {
        $user = Auth::user();

        return view('me.game.list', [
            'games' => $user->games()->paginate()
        ]);
    }


    public function add(AddGameToUserList $request)
    {
        $data = $request->validated();
        $gameId = (int) $data['gameId'];

        $game =  $this->gameRepository->get($gameId);

        $user = Auth::user();
        $user->addGame($game);

        return redirect()
            ->route('games.show', ['game' => $gameId])
            ->with('success', 'Gra dodana do Twojego katalogu');

    }


    public function remove(RemoveGameFromUserList $request)
    {
        $data = $request->validated();
        $gameId = (int) $data['gameId'];

        $game =  $this->gameRepository->get($gameId);
        $user = Auth::user();
        $user->removeGame($game);

        return redirect()
        ->route('games.show', ['game' => $gameId])
        ->with('success', 'Gra usunięta z Twojego katalogu');
    }


    public function rate()
    {

    }


}