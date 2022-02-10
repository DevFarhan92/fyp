<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;
use App\dealers;
use App\sales;
use App\dealer_balance;
use App\cash_management;
use App\cash_deposit_history;
use App\expenses;
use App\arrears_history;
class SalesController extends Controller
{
    //
    public function add_new_sale()
    {
    	$dealers=dealers::select('*')->get();
    	return view('admin.add_new_sale',compact('dealers'));
    }

    public function sale_add(Request $request)
    {

       

      $sale_id=sales::select('sale_id')->orderby('sale_id','desc')->pluck('sale_id')->first();
    $sale_id=$sale_id+1;

     $sales= new sales;
     $sales->sale_id=$sale_id;
     $sales->date=$request->date;
     $sales->dealer_id=$request->dealer_name;
     $sales->tank_number=$request->tank_number;
     $sales->no_of_blocks=$request->no_of_blocks;
     $sales->per_unit_price=$request->per_unit_price;
     $sales->total_price=$request->total_price;
     $sales->payment_recieved=$request->payment_recieved;
     $sales->payment_pending=$request->payment_pending;
     $sales->truck_number=$request->truck_number;
     $sales->driver_name=$request->driver_name;
     


    //Store Balance Record
     $check=dealer_balance::select('*')->where('dealer_id','=',$request->dealer_name)->count();
     
   
     if($check<1)
     {

        $dealer_balance=new dealer_balance;
        $dealer_balance->dealer_id=$request->dealer_name;
        $dealer_balance->previous_balance='0';
        $dealer_balance->new_balance=$request->payment_pending;
        $dealer_balance->save();

        
     }
     else
     {
        //Get old new balance to update previous balance
       $previous_balance=dealer_balance::select('new_balance')->where('dealer_id','=',$request->dealer_name)->pluck('new_balance')->first();
       
       $payment_pending=$request->payment_pending;
        
        //Update new balance
       $new_balance=$previous_balance+$payment_pending;

       dealer_balance::where('dealer_id',$request->dealer_name)->update(['previous_balance'=>$previous_balance,'new_balance'=>$new_balance]);

     }
      
     
     $cash_in_factory=cash_management::select('cash_in_factory')->where('id','=',1)->pluck('cash_in_factory')->first();
      $cash_in_factory=$cash_in_factory+$request->payment_recieved;
          
      cash_management::where('id',1)->update(['cash_in_factory'=>$cash_in_factory]);

       $sales->save();
    return Redirect::to('overall_sale_details/'.$sale_id)->with('alert-success','Sales Added Successfully');

    }


    public function view_overall_sales()
    {
    	$overall_sales=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->select('sales.*','dealers.*')->get();
    	
    	return view('admin.view_overall_sales',compact('overall_sales'));
    }


    public function overall_sale_details(Request $request)
    {
        $sale_details=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->select('dealers.*','sales.*')->where('sale_id','=',$request->id)->get();

       return view('admin.overall_sale_details',compact('sale_details'));
    }



//Sales Reports

    public function view_general_report()
    {
        return view('admin.reports.view_general_report');
    }


   public function general_report_details(Request $request)
   {
    $start_date1 = date("d-F-Y", strtotime($request->start_date));
  $end_date1 = date("d-F-Y", strtotime($request->end_date));

  $start_date=$request->start_date;
  $end_date=$request->end_date;
  

  Session::put('start_date',$start_date);
  Session::put('end_date',$end_date);

  //get month name

  $month_name=date("F", strtotime($request->start_date));


  
    

//get total sales of local dealers
 $overall_sales_local=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->whereBetween('sales.date', [$start_date, $end_date])->where('dealers.dealer_type','=','Local')->select('dealers.dealer_id','dealers.dealer_name')->distinct()->get();
 
 
  //get total blocks of local dealer

 $total_blocks_local=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->whereBetween('sales.date', [$start_date, $end_date])->where('dealers.dealer_type','=','Local')->sum('sales.no_of_blocks');
//get total sales of local dealer

 $total_sale_local=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->where('dealers.dealer_type','=','Local')->whereBetween('date', [$start_date, $end_date])->sum('sales.total_price');



//get total sales of fisheries
 $overall_sales_fisheries=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->whereBetween('sales.date', [$start_date, $end_date])->where('dealers.dealer_type','=','Fisheries')->select('dealers.dealer_id','dealers.dealer_name')->distinct()->get();
  
  //get total blocks of fisheries

 $total_blocks_fisheries=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->whereBetween('sales.date', [$start_date, $end_date])->where('dealers.dealer_type','=','Fisheries')->sum('sales.no_of_blocks');
//get total sales of fisheries

 $total_sale_fisheries=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->where('dealers.dealer_type','=','Fisheries')->whereBetween('date', [$start_date, $end_date])->sum('sales.total_price');






//get complete sales
    $overall_sales=sales::select('*')->whereBetween('date', [$start_date, $end_date])->get();

       //Get total blocks
    
    $total_blocks=sales::whereBetween('date', [$start_date, $end_date])->sum('no_of_blocks');
     

     //Get total sale amount
     
     $total_sale=sales::whereBetween('date', [$start_date, $end_date])->sum('total_price');
   
    
    //Get total company Expense
     
     $total_expense_company=expenses::whereBetween('date', [$start_date, $end_date])->where('expense_type','=','Company')->sum('expense_amount');
     
     //Get electricty expense
     $total_expense_electricity=expenses::whereBetween('date', [$start_date, $end_date])->where('expense_type','=','Electricity Bill')->sum('expense_amount');

     $total_expense_local=expenses::whereBetween('date', [$start_date, $end_date])->where('expense_type','=','Local')->sum('expense_amount');

     $total_expense_salary=expenses::whereBetween('date', [$start_date, $end_date])->where('expense_type','=','Salary')->sum('expense_amount');

  
      return view('admin.reports.general_report_details',compact('overall_sales','total_blocks','total_sale','start_date1','end_date1','month_name','overall_sales_local','total_blocks_local','total_sale_local','overall_sales_fisheries','total_blocks_fisheries','total_sale_fisheries','total_expense_company','total_expense_electricity','total_expense_local','total_expense_salary'));
   }

   public function view_dealerwise_report()
   {
    $dealers=dealers::select('*')->get();
    return view('admin.reports.view_dealerwise_report',compact('dealers'));
   }
  

  public function dealerwise_report_details(Request $request)
  {
   $start_date1 = date("d-F-Y", strtotime($request->start_date));
  $end_date1 = date("d-F-Y", strtotime($request->end_date));

  $start_date=$request->start_date;
  $end_date=$request->end_date;


  //get month name

  $month_name=date("F", strtotime($request->start_date));



//get dealer name
  $dealer_name=dealers::select('dealer_name')->where('dealer_id','=',$request->dealer_name)->pluck('dealer_name')->first();
  $dealer_type=dealers::select('dealer_type')->where('dealer_id','=',$request->dealer_name)->pluck('dealer_type')->first();
  
    $overall_sales=sales::select('*')->whereBetween('date', [$start_date, $end_date])->where('dealer_id','=',$request->dealer_name)->get();
    
    
       //Get total blocks
    
    $total_blocks=sales::whereBetween('date', [$start_date, $end_date])->where('dealer_id','=',$request->dealer_name)->sum('no_of_blocks');
     

     //Get total sale amount
     
     $total_sale=sales::whereBetween('date', [$start_date, $end_date])->where('dealer_id','=',$request->dealer_name)->sum('total_price');
   
    //get total and previous balance

    $dealer_balance=dealer_balance::select('*')->where('dealer_id','=',$request->dealer_name)->get();

   
   //get latest month of sale made of dealer and user selected month

     $latest_month_year_query=sales::select('date')->where('dealer_id','=',$request->dealer_name)->orderBy('date', 'desc')->pluck('date')->first();

    $previous_month_year = date("F,Y", strtotime("-1 month"));
   

    $latest_month_year=date("F,Y", strtotime($latest_month_year_query));

    $selected_month_year=date("F,Y",strtotime($request->end_date));
   
   //get current month record

    $currentMonth = date('m');
$current_month_sales = sales::whereRaw('MONTH(date) = ?',[$currentMonth])->where('dealer_id','=',$request->dealer_name)->sum('total_price');



      return view('admin.reports.dealerwise_report_details',compact('overall_sales','total_blocks','total_sale','start_date1','end_date1','month_name','dealer_balance','dealer_name','dealer_type','previous_month_year','selected_month_year','current_month_sales','latest_month_year'));
  }

  public function add_dealer_amount(Request $request)
  {
   //Get previous total balance 
   $previous_balance=dealer_balance::select('new_balance')->where('dealer_id','=',$request->dealer_id)->pluck('new_balance')->first();
   
   $amount_paid=$request->amount_paid;

   $new_balance=$previous_balance-$amount_paid;

   dealer_balance::where('dealer_id','=',$request->dealer_id)->update(['previous_balance'=>$previous_balance,'new_balance'=>$new_balance]);
   
   $paid_through=$request->paid_through;
    if($paid_through=='Cash')
    {
      $cash_in_factory=cash_management::select('cash_in_factory')->where('id','=',1)->pluck('cash_in_factory')->first();
      $cash_in_factory=$cash_in_factory+$amount_paid;
      cash_management::where('id',1)->update(['cash_in_factory'=>$cash_in_factory]);
    }
   else if($paid_through=='Cheque-Meezan')
   {
    $cash_in_bank=cash_management::select('cash_in_meezan')->where('id','=',1)->pluck('cash_in_meezan')->first();
    $cash_in_bank=$cash_in_bank+$amount_paid;
    cash_management::where('id',1)->update(['cash_in_meezan'=>$cash_in_bank]);
   }

    else if($paid_through=='Cheque-Soneri')
   {
    $cash_in_bank=cash_management::select('cash_in_soneri')->where('id','=',1)->pluck('cash_in_soneri')->first();
    $cash_in_bank=$cash_in_bank+$amount_paid;
    cash_management::where('id',1)->update(['cash_in_soneri'=>$cash_in_bank]);
   }
   

   //store arrears history

   $arrears_history = new arrears_history;
   $arrears_history->dealer_id=$request->dealer_id;
   $arrears_history->previous_balance=$previous_balance;
   $arrears_history->amount_paid=$amount_paid;
   $arrears_history->new_balance=$new_balance;
   $arrears_history->paid_through=$paid_through;
   $arrears_history->paid_date=date('y-m-d');
   $arrears_history->save();
    


    $dealer_type=dealers::select('dealer_type')->where('dealer_id','=',$request->dealer_id)->pluck('dealer_type')->first();
    if($dealer_type=='Local')
    {
     return Redirect::to('view_arrears_local_dealer')->with('alert-success','Amount Successfully Added'); 
    }
    else if ($dealer_type=='Fisheries')
    {
     return Redirect::to('view_arrears_fisheries')->with('alert-success','Amount Successfully Added'); 
    }
   //return Redirect::to('view_dealerwise_report')->with('alert-success','Amount Successfully Added');
  }


  //Add dealer amount through dealer report

    public function add_dealer_amount2(Request $request)
  {
   //Get previous total balance 
   $previous_balance=dealer_balance::select('new_balance')->where('dealer_id','=',$request->dealer_id)->pluck('new_balance')->first();
   
   $amount_paid=$request->amount_paid;

   $new_balance=$previous_balance-$amount_paid;

   dealer_balance::where('dealer_id','=',$request->dealer_id)->update(['previous_balance'=>$previous_balance,'new_balance'=>$new_balance]);
   
   $paid_through=$request->paid_through;
    if($paid_through=='Cash')
    {
      $cash_in_factory=cash_management::select('cash_in_factory')->where('id','=',1)->pluck('cash_in_factory')->first();
      $cash_in_factory=$cash_in_factory+$amount_paid;
      cash_management::where('id',1)->update(['cash_in_factory'=>$cash_in_factory]);
    }
   else if($paid_through=='Cheque-Meezan')
   {
    $cash_in_bank=cash_management::select('cash_in_meezan')->where('id','=',1)->pluck('cash_in_meezan')->first();
    $cash_in_bank=$cash_in_bank+$amount_paid;
    cash_management::where('id',1)->update(['cash_in_meezan'=>$cash_in_bank]);
   }

   else if($paid_through=='Cheque-Soneri')
   {
    $cash_in_bank=cash_management::select('cash_in_soneri')->where('id','=',1)->pluck('cash_in_soneri')->first();
    $cash_in_bank=$cash_in_bank+$amount_paid;
    cash_management::where('id',1)->update(['cash_in_soneri'=>$cash_in_bank]);
   }
     
  //store arrears history

  $arrears_history = new arrears_history;
  $arrears_history->dealer_id=$request->dealer_id;
  $arrears_history->previous_balance=$previous_balance;
  $arrears_history->amount_paid=$amount_paid;
  $arrears_history->new_balance=$new_balance;
  $arrears_history->paid_through=$paid_through;
  $arrears_history->paid_date=date('y-m-d');
  $arrears_history->save();

       return Redirect::to('view_dealerwise_report')->with('alert-success','Amount Successfully Added');
  }






  //Cash Management

  public function cash_management()
  {
    $cash_details=cash_management::select('*')->where('id','=','1')->get();
   
   $cash_deposit_history=cash_deposit_history::select('*')->get();

    return view('admin.cash_management',compact('cash_details','cash_deposit_history'));
  }

  public function add_cash_in_factory(Request $request)
  {
    $cash_in_factory=cash_management::select('cash_in_factory')->where('id','=','1')->pluck('cash_in_factory')->first();
    $add_cash=$request->add_cash;

    $updated_cash=$cash_in_factory+$add_cash;
     
    //maintain history
    $cash_deposit_history=new cash_deposit_history;
    $deposit_id=cash_deposit_history::select('id')->orderby('id','desc')->pluck('id')->first();
  $deposit_id=$deposit_id+1;
  $cash_deposit_history->id=$deposit_id;
  $cash_deposit_history->date=$request->date;
  $cash_deposit_history->amount=$request->add_cash;
  $cash_deposit_history->action="Deposit";
  $cash_deposit_history->transaction_type="Cash";
  $cash_deposit_history->save();
    


    cash_management::where('id',1)->update(['cash_in_factory'=>$updated_cash]);
    return Redirect::to('cash_management')->with('alert-success','Cash Details Successfully Updated');
  }

  public function subtract_cash_in_factory(Request $request)
  {
   $cash_in_factory=cash_management::select('cash_in_factory')->where('id','=','1')->pluck('cash_in_factory')->first();
    $subtract_cash=$request->subtract_cash;

    $updated_cash=$cash_in_factory-$subtract_cash;
     
    //maintain history
    $cash_deposit_history=new cash_deposit_history;
    $deposit_id=cash_deposit_history::select('id')->orderby('id','desc')->pluck('id')->first();
  $deposit_id=$deposit_id+1;
  $cash_deposit_history->id=$deposit_id;
  $cash_deposit_history->date=$request->date;
  $cash_deposit_history->amount=$request->subtract_cash;
  $cash_deposit_history->action="WithDraw";
  $cash_deposit_history->transaction_type="Cash";
  $cash_deposit_history->save();


    cash_management::where('id',1)->update(['cash_in_factory'=>$updated_cash]);
    return Redirect::to('cash_management')->with('alert-success','Cash Details Successfully Updated');
  }




//cash management meezan bank

public function add_cash_in_meezan_bank(Request $request)
{
  $cash_in_bank=cash_management::select('cash_in_meezan')->where('id','=','1')->pluck('cash_in_meezan')->first();
  $add_cash=$request->add_cash;

  $updated_cash=$cash_in_bank+$add_cash;

  $cash_deposit_history=new cash_deposit_history;
  $deposit_id=cash_deposit_history::select('id')->orderby('id','desc')->pluck('id')->first();
  $deposit_id=$deposit_id+1;

  $cash_deposit_history->id=$deposit_id;
  $cash_deposit_history->amount=$request->add_cash;
  $cash_deposit_history->date=$request->date;
  $cash_deposit_history->action="Deposit";
  $cash_deposit_history->transaction_type="Cheque-Meezan";
  $cash_deposit_history->save();

   cash_management::where('id',1)->update(['cash_in_meezan'=>$updated_cash]);
     return Redirect::to('cash_management')->with('alert-success','Cash Details Successfully Updated');

}


public function subtract_cash_in_meezan_bank(Request $request)
{
  $cash_in_bank=cash_management::select('cash_in_meezan')->where('id','=','1')->pluck('cash_in_meezan')->first();
  $subtract_cash=$request->subtract_cash;

  $updated_cash=$cash_in_bank-$subtract_cash;

  $cash_deposit_history=new cash_deposit_history;
  $deposit_id=cash_deposit_history::select('id')->orderby('id','desc')->pluck('id')->first();
  $deposit_id=$deposit_id+1;

  $cash_deposit_history->id=$deposit_id;
  $cash_deposit_history->amount=$request->subtract_cash;
  $cash_deposit_history->date=$request->date;
  $cash_deposit_history->action="WithDraw";
  $cash_deposit_history->transaction_type="Cheque-Meezan";
  $cash_deposit_history->save();

   cash_management::where('id',1)->update(['cash_in_meezan'=>$updated_cash]);
     return Redirect::to('cash_management')->with('alert-success','Cash Details Successfully Updated');

}


//cash management soneri bank

public function add_cash_in_soneri_bank(Request $request)
{
  $cash_in_bank=cash_management::select('cash_in_soneri')->where('id','=','1')->pluck('cash_in_soneri')->first();
  $add_cash=$request->add_cash;

  $updated_cash=$cash_in_bank+$add_cash;

  $cash_deposit_history=new cash_deposit_history;
  $deposit_id=cash_deposit_history::select('id')->orderby('id','desc')->pluck('id')->first();
  $deposit_id=$deposit_id+1;

  $cash_deposit_history->id=$deposit_id;
  $cash_deposit_history->amount=$request->add_cash;
  $cash_deposit_history->date=$request->date;
  $cash_deposit_history->action="Deposit";
  $cash_deposit_history->transaction_type="Cheque-Soneri";
  $cash_deposit_history->save();

   cash_management::where('id',1)->update(['cash_in_soneri'=>$updated_cash]);
     return Redirect::to('cash_management')->with('alert-success','Cash Details Successfully Updated');

}


public function subtract_cash_in_soneri_bank(Request $request)
{
  $cash_in_bank=cash_management::select('cash_in_soneri')->where('id','=','1')->pluck('cash_in_soneri')->first();
  $subtract_cash=$request->subtract_cash;

  $updated_cash=$cash_in_bank-$subtract_cash;

  $cash_deposit_history=new cash_deposit_history;
  $deposit_id=cash_deposit_history::select('id')->orderby('id','desc')->pluck('id')->first();
  $deposit_id=$deposit_id+1;

  $cash_deposit_history->id=$deposit_id;
  $cash_deposit_history->amount=$request->subtract_cash;
  $cash_deposit_history->date=$request->date;
  $cash_deposit_history->action="WithDraw";
  $cash_deposit_history->transaction_type="Cheque-Soneri";
  $cash_deposit_history->save();

   cash_management::where('id',1)->update(['cash_in_soneri'=>$updated_cash]);
     return Redirect::to('cash_management')->with('alert-success','Cash Details Successfully Updated');

}





public function view_arrears_local_dealer()
{
  $local_dealer_arrears=dealer_balance::leftjoin('dealers','dealers.dealer_id','=','dealer_balances.dealer_id')->where('dealers.dealer_type','=','Local')->get();


  //calculate total arrears: total balance - current month balance

  $local_dealer_balance=dealer_balance::leftjoin('dealers','dealers.dealer_id','=','dealer_balances.dealer_id')->where('dealers.dealer_type','=','Local')->select('dealer_balances.new_balance')->sum('dealer_balances.new_balance');  

  $currentMonth = date('m');


  // $local_dealer_current_month_balance=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->select('sales.total_price')->whereRaw('MONTH(sales.date) = ?',[$currentMonth])->where('dealers.dealer_type','=','Local')->sum('total_price');
  

  
  $total_arears=$local_dealer_balance;
  
  return view('admin.view_arrears_local_dealer',compact('local_dealer_arrears','total_arears'));
}


public function view_arrears_fisheries()
{
  $fisheries_arrears=dealer_balance::leftjoin('dealers','dealers.dealer_id','=','dealer_balances.dealer_id')->where('dealers.dealer_type','=','Fisheries')->get();

  
   //calculate total arrears: total balance - current month balance

  $fisheries_balance=dealer_balance::leftjoin('dealers','dealers.dealer_id','=','dealer_balances.dealer_id')->where('dealers.dealer_type','=','Fisheries')->select('dealer_balances.new_balance')->sum('dealer_balances.new_balance');  

  $currentMonth = date('m');


  $fisheries_current_month_balance=sales::leftjoin('dealers','dealers.dealer_id','=','sales.dealer_id')->select('sales.total_price')->whereRaw('MONTH(sales.date) = ?',[$currentMonth])->where('dealers.dealer_type','=','Fisheries')->sum('total_price');
  
  $total_arears=$fisheries_balance-$fisheries_current_month_balance;



  return view('admin.view_arrears_fisheries',compact('fisheries_arrears','total_arears'));
}






public function view_arrears_report()
{
 $dealers=dealers::select('*')->get();
 return view('admin.reports.view_arrears_report',compact('dealers'));
}


public function arrears_report_details(Request $request)
{
$start_date1 = date("d-F-Y", strtotime($request->start_date));
$end_date1 = date("d-F-Y", strtotime($request->end_date));

$start_date=$request->start_date;
$end_date=$request->end_date;


//get month name

$month_name=date("F", strtotime($request->start_date));


if($request->dealer_name !='')
{
//get dealer name
$dealer_name=dealers::select('dealer_name')->where('dealer_id','=',$request->dealer_name)->pluck('dealer_name')->first();
$dealer_type=dealers::select('dealer_type')->where('dealer_id','=',$request->dealer_name)->pluck('dealer_type')->first();

 $arrears_report=arrears_history::select('*')->whereBetween('paid_date', [$start_date, $end_date])->where('dealer_id','=',$request->dealer_name)->get();
  

 $arrears_report=arrears_history::leftjoin('dealers','dealers.dealer_id','=','arrears_histories.dealer_id')->whereBetween('arrears_histories.paid_date', [$start_date, $end_date])->where('arrears_histories.dealer_id','=',$request->dealer_name)
 ->orderBy('arrears_histories.id','desc')->get();

}

else
{
  $dealer_name='';
  $dealer_type='';
  $arrears_report=arrears_history::leftjoin('dealers','dealers.dealer_id','=','arrears_histories.dealer_id')->whereBetween('arrears_histories.paid_date', [$start_date, $end_date])->orderBy('arrears_histories.id','desc')->get();

}
 
    


   return view('admin.reports.arrears_report_details2',compact('arrears_report','dealer_name','dealer_type','start_date1','end_date1','start_date','end_date'));
}





}
