<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
   function getCompanies(){
      $res = DB::table('companies')->get();
      return response()->json($res);
  }
    function getClients(Request $request){
        $res = DB::table('clients')->where('company',$request->id)->get();
        return response()->json($res);
    }

    function getClientCompany(Request $request){
        $res = DB::table('companies')->select('companies.title','companies.description')->where('company',$request->id)
            ->join('clients','clients.company', '=','companies.id')
            ->get();
        return response()->json($res);
    }
}
