<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $decimal_result = 0;
        // DB::enableQueryLog();
        $avg_user_eval = DB::table('evaluations')->where('user_id', $id)->avg('star');
        // dd(DB::getQueryLog());
        $decimal = $this->get_decimal_num($avg_user_eval);
        // print $decimal;
        if($decimal >= 0.1 && $decimal <= 0.4) {
            $decimal_result = floor($avg_user_eval);
        } elseif($decimal >= 0.6 && $decimal <= 0.9) {
            $decimal_result = ceil($avg_user_eval);
        } else {
            $decimal_result = $this->get_one_decimal_place($avg_user_eval);
            
        }
        $result = array("star"=>$decimal_result);
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function get_decimal_num($num) {
        $num = $this->get_one_decimal_place($num);
        $whole = floor($num);
        $result = $num - $whole;
        $fraction = $this->get_one_decimal_place($result);
        if($fraction == 0) {
            return $num;
        }
        return $fraction;
    }

    private function get_one_decimal_place($num) {
        $num = $num * 10;
        $num = floor($num);
        $num = $num / 10;
        return $num;
    }
}
