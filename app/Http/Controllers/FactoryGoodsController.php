<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;
use App\factory_goods;
use App\factory_goods_history;
class FactoryGoodsController extends Controller
{
    //
    public function factory_goods_management()
    {
        $factory_goods=factory_goods::select('*')->get();

       return view('admin.factory_goods.factory_goods_management',compact('factory_goods'));
    }

    public function add_new_good(Request $request)
    {
       $good_id=factory_goods::select('id')->orderby('id','desc')->pluck('id')->first();
    $good_id=$good_id+1;

         $factory_good=new factory_goods;
         $factory_good->id=$good_id;
         $factory_good->good_name=$request->good_name;
         $factory_good->good_quantity=$request->good_quantity;
         $factory_good->date_updated=$request->date;
         
         $factory_good->save();

        //Factory goods history management

         $goods_history=new factory_goods_history;
         $goods_history->good_id=$good_id;
         $goods_history->previous_quantity=0;
         $goods_history->new_quantity=$request->good_quantity;
         $goods_history->quantity_status="Added";
         $goods_history->date_updated=$request->date;
         $goods_history->quantity_added_removed=0;
         $goods_history->save();

         return Redirect::to('factory_goods_management')->with('alert-success','Record Successfully Stored');
    }


//Add Goods Quantity
    public function update_goods_quantity(Request $request)
    {
        

       $goods_history=new factory_goods_history;
         $goods_history->good_id=$request->good_id;

        $previous_quantity=factory_goods::select('good_quantity')->where('id',$request->good_id)->pluck('good_quantity')->first();
        

     
         $goods_history->previous_quantity=$previous_quantity;

         $new_quantity=$previous_quantity+$request->add_quantity;
  
       
         $goods_history->new_quantity=$new_quantity;

         $goods_history->quantity_added_removed=$request->add_quantity;
        
         $goods_history->quantity_status="Added";

        
         $goods_history->date_updated=$request->date_added;
         $goods_history->save();

     factory_goods::where('id',$request->good_id)->update(['good_quantity'=>$new_quantity,'date_updated'=>$request->date_added]);

        return Redirect::to('factory_goods_management')->with('alert-success','Record Successfully Updated');
    }



  //Subtract Goods Quantity
    public function subtract_goods_quantity(Request $request)
    {
        

       $goods_history=new factory_goods_history;
         $goods_history->good_id=$request->good_id;

        $previous_quantity=factory_goods::select('good_quantity')->where('id',$request->good_id)->pluck('good_quantity')->first();
        

     
         $goods_history->previous_quantity=$previous_quantity;

         $new_quantity=$previous_quantity-$request->subtract_quantity;
  
       
         $goods_history->new_quantity=$new_quantity;

         $goods_history->quantity_added_removed=$request->subtract_quantity;
        
         $goods_history->quantity_status="Subtracted";

        
         $goods_history->date_updated=$request->date_added;
         $goods_history->save();

     factory_goods::where('id',$request->good_id)->update(['good_quantity'=>$new_quantity,'date_updated'=>$request->date_added]);

        return Redirect::to('factory_goods_management')->with('alert-success','Record Successfully Updated');
    }



    
    public function view_factory_goods_report()
    {
      return view('admin.reports.view_factory_goods_report');
    }


    public function factory_goods_report_details(Request $request)
    {
     
     $start_date1 = date("d-F-Y", strtotime($request->start_date));
  $end_date1 = date("d-F-Y", strtotime($request->end_date));

  $start_date=$request->start_date;
  $end_date=$request->end_date;


        $factory_goods=factory_goods_history::leftjoin('factory_goods','factory_goods.id','=','factory_goods_histories.good_id')->whereBetween('factory_goods_histories.date_updated', [$start_date, $end_date])->get();

        return view('admin.reports.factory_goods_report_details',compact('factory_goods','start_date1','end_date1'));
    }
}
