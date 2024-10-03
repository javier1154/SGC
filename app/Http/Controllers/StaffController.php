<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class StaffController extends Controller
{
   
    public function index()
    {
        
        $users = User::where('management_id', \Auth::user()->management->id)->get(); 
        return view('staff.index', compact('users')); 
    }

    public function create()
    {
    
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
