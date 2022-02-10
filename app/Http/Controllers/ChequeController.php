<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;
use App\dealers;
use App\cheque_history;

class ChequeController extends Controller
{
    //

    public function add_new_cheque_received()
    {
    	$dealers=dealers::select('*')->get();
    	return view('admin.cheque.add_new_cheque_received',compact('dealers'));
    }

    public function cheque_received_add(Request $request)
    {
      $add_cheque=new cheque_history;
      $cheque_id=cheque_history::select('id')->orderby('id','desc')->pluck('id')->first();
    $cheque_id=$cheque_id+1;
       
      $add_cheque->id=$cheque_id;
      $add_cheque->dealer_id=$request->dealer_name;
      $add_cheque->date=$request->date;
      $add_cheque->clearing_date=$request->clearing_date;
      $add_cheque->cheque_number=$request->cheque_number;
      $add_cheque->cheque_amount=$request->cheque_amount;

      $cheque_attachment=$request->cheque_attachment;
 
 if($cheque_attachment !='')
{
 $destinationPath = 'attachments/cheque'; // upload path
          $file_name = $cheque_attachment -> getClientOriginalName();
          $file_name = uniqid().$file_name;
          $file_name = preg_replace('/\s+/', '', $file_name);
          $extension = $cheque_attachment->getClientOriginalExtension(); // getting image extension

        
          $cheque_attachment->move($destinationPath, $file_name); 


          $add_cheque->cheque_attachment=$file_name;

}

          $add_cheque->cheque_type="Cheque Received";
          $add_cheque->cheque_status="Pending";
          $add_cheque->save();
         // return "Success";
          return Redirect::to('single_cheque_details/'.$cheque_id)->with('alert-success','Cheque record Added Successfully');
    }


    public function add_new_cheque_given()
    {
    	$dealers=dealers::select('*')->get();
    	return view('admin.cheque.add_new_cheque_given',compact('dealers'));
    }

    public function cheque_given_add(Request $request)
    {
      $add_cheque=new cheque_history;
      $cheque_id=cheque_history::select('id')->orderby('id','desc')->pluck('id')->first();
    $cheque_id=$cheque_id+1;
    $add_cheque->id=$cheque_id;
      $add_cheque->dealer_id=$request->dealer_name;
      $add_cheque->date=$request->date;
      $add_cheque->clearing_date=$request->clearing_date;
      $add_cheque->cheque_number=$request->cheque_number;
      $add_cheque->cheque_amount=$request->cheque_amount;

      $cheque_attachment=$request->cheque_attachment;

 $destinationPath = 'attachments/cheque'; // upload path
          $file_name = $cheque_attachment -> getClientOriginalName();
          $file_name = uniqid().$file_name;
          $file_name = preg_replace('/\s+/', '', $file_name);
          $extension = $cheque_attachment->getClientOriginalExtension(); // getting image extension

        
          $cheque_attachment->move($destinationPath, $file_name); 


          $add_cheque->cheque_attachment=$file_name;



          $add_cheque->cheque_type="Cheque Given";
          $add_cheque->cheque_status="Pending";
          $add_cheque->save();
          return Redirect::to('single_cheque_details/'.$cheque_id)->with('alert-success','Cheque record Added Successfully');
         // return "Success";
    }

    //view cheques

    public function view_cheque_received()
    {
      $cheque_received=cheque_history::leftjoin('dealers','dealers.dealer_id','=','cheque_histories.dealer_id')->where('cheque_histories.cheque_type','Cheque Received')->select('dealers.dealer_name','cheque_histories.*')->get();
         
      return view('admin.cheque.view_cheque_received',compact('cheque_received'));
    }

    public function view_cheque_given()
    {
      $cheque_given=cheque_history::leftjoin('dealers','dealers.dealer_id','=','cheque_histories.dealer_id')->where('cheque_histories.cheque_type','Cheque Given')->select('dealers.dealer_name','cheque_histories.*')->get();
         
      return view('admin.cheque.view_cheque_given',compact('cheque_given'));
    }

    public function update_cheque_status(Request $request)
    {
      cheque_history::where('id',$request->cheque_id)->update(['cheque_status'=>$request->cheque_status]);
      
      $cheque_type=cheque_history::select('cheque_type')->where('id',$request->cheque_id)->pluck('cheque_type')->first();
      if($cheque_type=='Cheque Received')
      {
           return Redirect::to('view_cheque_received')->with('alert-success','Status Successfully Updated');
      }
      else if($cheque_type=='Cheque Given')
      {
          return Redirect::to('view_cheque_given')->with('alert-success','Status Successfully Updated');
      }
    }

    public function single_cheque_details(Request $request)
    {
        $cheque_details=cheque_history::leftjoin('dealers','dealers.dealer_id','=','cheque_histories.dealer_id')->select('dealers.*','cheque_histories.*')->where('id','=',$request->id)->get();

       return view('admin.cheque.single_cheque_details',compact('cheque_details'));
    }

}
