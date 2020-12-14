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
        $query = User::select();
        
        if ( isset($request->sort_field, $request->sort_direction) ) {
            $query->orderBy($request->sort_field, $request->sort_direction);
        }

        if( $request->has('search') ) 
        {
            $query->where('firstname', 'like', "%{$request->search}%")
            ->orWhere('lastname', 'like', "%{$request->search}%")
            ->orWhere('name', 'like', "%{$request->search}%")
            ->orWhere('email', 'like', "%{$request->search}%");

            // whereRaw('lower(meta->"$.description") like lower(?)', ["%{$foo}%"]);
        }

        if( $request->has('date_start') && $request->has('date_end') ) 
        {
            $query->whereBetween('created_at', [
                $request->date_start." 00:00:00", 
                $request->date_end." 23:59:59"
            ]);
        } 
        else if( $request->has('date_start') )
        {

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
