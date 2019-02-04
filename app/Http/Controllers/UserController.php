<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUser;
use GuzzleHttp\Client;

class UserController extends Controller
{
    /**
     * Middleware to be executed before each action
     *
     */
    public function __construct()
    {
        // $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('auth')->only('destroy');
        $this->middleware('verified')->except(['index', 'show', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function index()
    {
//        return User::all();

        $client = new Client();
        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=10.801328,%20106.711377&radius=1500&type=restaurant&keyword=c%C6%A1m%20chay&key=AIzaSyCbf6UrIEcCbH55PRrlNLSyaHAil7O6fwM";
        $res = $client->get($url);
//        echo $res->getStatusCode(); // 200
//        echo $res->getBody();

        return $res->getBody();

//        $users = User::paginate(5);
//        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('users/' . $user->id)->with('my_status', __('Created new user.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // そのユーザーが投稿した記事のうち、最新5件を取得
        $user->posts = $user->posts()->paginate(5);
        return view('users.show', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('edit', $user);

        // name欄だけを検査するため、元のStoreUserクラス内のバリデーション・ルールからname欄のルールだけを取り出す。
        $request->validate([
            'name' => (new StoreUser())->rules()['name']
        ]);

        $user->name = $request->name;
        $user->save();
        return redirect('users/' . $user->id)->with('my_status', __('Updated a user.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize('edit', $user);
        $user->delete();
        return redirect('users')->with('my_status', __('Deleted a user.'));
    }
}
