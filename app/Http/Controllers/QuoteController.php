<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote as Quote;

class QuoteController extends Controller
{
   // protected $quote;
    function __construct(Quote $quote){
//$this->quote = $quote;
    }

    function postQuote(Request $request){
    $quote = new Quote();
    $quote->content  = $request->input('content');
    $quote->save();
     return response()->json($quote);
       
    } 
    function getQuotes(){
        $quotes = Quote::all();
        return response()->json($quotes,200);
    } 
    function putQuote(Request $request,$id){
      
        $quote = Quote::find($id);
        if(!$quote){
            return response()->json(['error'=>'Quote doesn\'t Exist!']);
        }elseif(!$request->input('content')){
            return response()->json(['error'=>'There is no content on the request']);
        }
        $quote->content  = $request->input('content');
        $quote->save();
        return response()->json(['quote'=>$quote]);

    }

    function deleteQuote($id){
        $quote = Quote::find($id);
        if(!$quote){
            return response()->json(['error'=>'Quote doesn\'t Exist!']);
        }
        $quote->delete();
        return response()->json(['message'=>'Quote deleted successfully!']);
    }
}
