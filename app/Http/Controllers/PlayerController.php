<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;


// use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $players=Player::all();
            return response()->json(['players' => $players],Response::HTTP_OK);
        } catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()],Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'age' => 'required|numeric',
                'country' => 'required',
            ]);
        
            $player = new Player();
            $player->name = $request->name;
            $player->age = $request->age;
            $player->country = $request->country;
            $player->save();
        
            return response()->json(['player' => $player], Response::HTTP_OK);
        
        } catch (ValidationException $validationException) {
            return response()->json(['error' => $validationException->errors()], Response::HTTP_BAD_REQUEST);
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $player=Player::findOrFail($id);

            $request->validate([
                'name'=>'required',
                'age'=>'required',
                'country'=>'required',
            ]);
            $player->name=$request->name;
            $player->age=$request->age;
            $player->country=$request->country;
            $player->save();
            return response()->json(['Success'=>$player],Response::HTTP_OK);

        }catch(ValidationException $validationException){
            return response()->json(['Error'=>$validationException->errors()],Response::HTTP_BAD_REQUEST);
        }catch(\Exception $e){
            return response()->json(['Error'=>$e->getMessage()],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $player=Player::findOrFail($id);

            $player->delete();
            return response()->json(['Success' =>"Player Deleted successfully"],Response::HTTP_OK);
        } catch(\Exception $e){
            return response()->json(['Error'=>"Error in deleting player"],Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
