<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\UserCollection;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$user = User::orderByDesc('created_at')->paginate( (int)$request->per_page );

        //return UserCollection::collection($user);

        //$query = User::orderByDesc('created_at');
        $query = User::select();
        
        if ( isset($request->sort_field, $request->sort_direction) ) {
            $query->orderBy($request->sort_field, $request->sort_direction);
        }

        $user = $query->paginate( (int)$request->per_page )->toArray();


        $data = UserCollection::collection($user['data']);
        $user['data'] = $data;

        return $this->successResponsePaginate($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
