<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\dealers;

class RecordDeleteController extends Controller {
   public function index() {
      $project = DB::select('select * from dealers');
    return view('view_dealers_fisheries',['project'=>$project]);
    return view('view_dealers_local.blade',['project'=>$project]);
     
      
   }
   public function destroy($dealer_id) {
      DB::delete('delete from dealers where dealer_id = ?',[$dealer_id]);
      echo "Record deleted successfully.<br/>";
      echo '<a href = "/FiveStar/view_dealers_local">Click Here</a> to go back.';
   }

   public function update_local_dealer(Request $request)
   {
      dealers::where('dealer_id',$request->dealer_id)->update(['dealer_name'=>$request->dealer_name,'cnic'=>$request->cnic,'email'=>$request->email,'phone'=>$request->phone]);
      echo "Record Updated successfully.<br/>";
      echo '<a href = "/FiveStar/view_dealers_local">Click Here</a> to go back.';
   }
}