<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cashier;

class CashierController extends Controller
{

    function validateFormData(Request $loginData)
    {

        $loginData->validate(
            [
                'username'=>'required',
                'password'=>'required| min:8'
            ]
        );

        if(Auth::attempt($loginData->only('username', 'password'))){
            session()->start();
            return redirect('cashierIndex');
        } else{
            
            return redirect()->back()->withErrors(['username'=>'Invalid Username or Password']);
        }

    }
    function addCashier(Request $cashierData){
        $cashier = New Cashier;
        $cashier->name = $cashierData->name;
        $cashier->contact = $cashierData->contact;
        $cashier->email = $cashierData->email;
        $cashier-> username = $cashierData->username;
        $cashier->password = bcrypt($cashierData->password);
        $cashier->save();


        return redirect('cashiers');
    }

    function showCashiers(){
        $data = Cashier::all();
        return view('cashier', ['cashiers'=>$data]);
    }

    function removeCashier($id){
        $data = Cashier::find($id);
        $record = Cashier::where('username', $data->username)->first();
        $record->delete();
        $data->delete();

        
        return redirect('cashiers');
    }

    function showSavedData($id){
        $data = Cashier::find($id);
        return view('edit-cashier', ['data'=>$data]);
    }

    function editCashierInfo(Request $request){
        $data = Cashier::find($request->id);
        $data->name = $request->name;
        $data->contact = $request->contact;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('cashiers');
    }

   
}
