<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cmp;
class company extends Controller
{
//
function update(Request $req)
{
    // print_r($req->input());

    echo Cmp::where ('dealer_name', $req->name)
    ->update(['dealer_type'=>$req->dealer_type]);

}


}