<?php

namespace App\Http\Controllers;

use App\Models\DispatchVhms;
use App\Models\kpiVhms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KpiVhmsController extends Controller
{
    public function index()
    {
        // $data['all'] = kpiVhms::all();
        
        $data['total_unit'] = DispatchVhms::count();
        // chart bulan januari
        $data['total_bd_week_1_january'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 1)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_january'])) {
            $data['percent_week_1_january_bd'] = ($data['total_bd_week_1_january'] / $data['total_unit']) * 100;
            $data['percent_week_1_january_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_january']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_january_bd'] = 0;
            $data['percent_week_1_january_terdownload'] = 100;
        }

        $data['total_bd_week_2_january'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 1)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_january'])) {
            $data['percent_week_2_january_bd'] = ($data['total_bd_week_2_january'] / $data['total_unit']) * 100;
            $data['percent_week_2_january_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_january']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_january_bd'] = 0;
            $data['percent_week_2_january_terdownload'] = 100;
        }

        $data['total_bd_week_3_january'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 1)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_january'])) {
            $data['percent_week_3_january_bd'] = ($data['total_bd_week_3_january'] / $data['total_unit']) * 100;
            $data['percent_week_3_january_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_january']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_january_bd'] = 0;
            $data['percent_week_3_january_terdownload'] = 100;
        }

        $data['total_bd_week_4_january'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 1)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_january'])) {
            $data['percent_week_4_january_bd'] = ($data['total_bd_week_4_january'] / $data['total_unit']) * 100;
            $data['percent_week_4_january_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_january']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_january_bd'] = 0;
            $data['percent_week_4_january_terdownload'] = 100;
        }

        $data['total_bd_week_1_february'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 2)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_february'])) {
            $data['percent_week_1_february_bd'] = ($data['total_bd_week_1_february'] / $data['total_unit']) * 100;
            $data['percent_week_1_february_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_february']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_february_bd'] = 0;
            $data['percent_week_1_february_terdownload'] = 100;
        }

        $data['total_bd_week_2_february'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 2)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_february'])) {
            $data['percent_week_2_february_bd'] = ($data['total_bd_week_2_february'] / $data['total_unit']) * 100;
            $data['percent_week_2_february_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_february']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_february_bd'] = 0;
            $data['percent_week_2_february_terdownload'] = 100;
        }

        $data['total_bd_week_3_february'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 2)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_february'])) {
            $data['percent_week_3_february_bd'] = ($data['total_bd_week_3_february'] / $data['total_unit']) * 100;
            $data['percent_week_3_february_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_february']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_february_bd'] = 0;
            $data['percent_week_3_february_terdownload'] = 100;
        }

        $data['total_bd_week_4_february'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 2)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_february'])) {
            $data['percent_week_4_february_bd'] = ($data['total_bd_week_4_february'] / $data['total_unit']) * 100;
            $data['percent_week_4_february_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_february']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_february_bd'] = 0;
            $data['percent_week_4_february_terdownload'] = 100;
        }

        $data['total_bd_week_1_march'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 3)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_march'])) {
            $data['percent_week_1_march_bd'] = ($data['total_bd_week_1_march'] / $data['total_unit']) * 100;
            $data['percent_week_1_march_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_march']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_march_bd'] = 0;
            $data['percent_week_1_march_terdownload'] = 100;
        }

        $data['total_bd_week_2_march'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 3)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_march'])) {
            $data['percent_week_2_march_bd'] = ($data['total_bd_week_2_march'] / $data['total_unit']) * 100;
            $data['percent_week_2_march_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_march']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_march_bd'] = 0;
            $data['percent_week_2_march_terdownload'] = 100;
        }

        $data['total_bd_week_3_march'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 3)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_march'])) {
            $data['percent_week_3_march_bd'] = ($data['total_bd_week_3_march'] / $data['total_unit']) * 100;
            $data['percent_week_3_march_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_march']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_march_bd'] = 0;
            $data['percent_week_3_march_terdownload'] = 100;
        }

        $data['total_bd_week_4_march'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 3)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_march'])) {
            $data['percent_week_4_march_bd'] = ($data['total_bd_week_4_march'] / $data['total_unit']) * 100;
            $data['percent_week_4_march_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_march']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_march_bd'] = 0;
            $data['percent_week_4_march_terdownload'] = 100;
        }

        $data['total_bd_week_1_april'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 4)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_april'])) {
            $data['percent_week_1_april_bd'] = ($data['total_bd_week_1_april'] / $data['total_unit']) * 100;
            $data['percent_week_1_april_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_april']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_april_bd'] = 0;
            $data['percent_week_1_april_terdownload'] = 100;
        }

        $data['total_bd_week_2_april'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 4)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_april'])) {
            $data['percent_week_2_april_bd'] = ($data['total_bd_week_2_april'] / $data['total_unit']) * 100;
            $data['percent_week_2_april_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_april']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_april_bd'] = 0;
            $data['percent_week_2_april_terdownload'] = 100;
        }

        $data['total_bd_week_3_april'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 4)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_april'])) {
            $data['percent_week_3_april_bd'] = ($data['total_bd_week_3_april'] / $data['total_unit']) * 100;
            $data['percent_week_3_april_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_april']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_april_bd'] = 0;
            $data['percent_week_3_april_terdownload'] = 100;
        }

        $data['total_bd_week_4_april'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 4)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_april'])) {
            $data['percent_week_4_april_bd'] = ($data['total_bd_week_4_april'] / $data['total_unit']) * 100;
            $data['percent_week_4_april_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_april']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_april_bd'] = 0;
            $data['percent_week_4_april_terdownload'] = 100;
        }

        $data['total_bd_week_1_may'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 5)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_may'])) {
            $data['percent_week_1_may_bd'] = ($data['total_bd_week_1_may'] / $data['total_unit']) * 100;
            $data['percent_week_1_may_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_may']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_may_bd'] = 0;
            $data['percent_week_1_may_terdownload'] = 100;
        }

        $data['total_bd_week_2_may'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 5)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_may'])) {
            $data['percent_week_2_may_bd'] = ($data['total_bd_week_2_may'] / $data['total_unit']) * 100;
            $data['percent_week_2_may_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_may']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_may_bd'] = 0;
            $data['percent_week_2_may_terdownload'] = 100;
        }

        $data['total_bd_week_3_may'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 5)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_may'])) {
            $data['percent_week_3_may_bd'] = ($data['total_bd_week_3_may'] / $data['total_unit']) * 100;
            $data['percent_week_3_may_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_may']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_may_bd'] = 0;
            $data['percent_week_3_may_terdownload'] = 100;
        }

        $data['total_bd_week_4_may'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 5)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_may'])) {
            $data['percent_week_4_may_bd'] = ($data['total_bd_week_4_may'] / $data['total_unit']) * 100;
            $data['percent_week_4_may_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_may']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_may_bd'] = 0;
            $data['percent_week_4_may_terdownload'] = 100;
        }

        $data['total_bd_week_1_june'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 6)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_june'])) {
            $data['percent_week_1_june_bd'] = ($data['total_bd_week_1_june'] / $data['total_unit']) * 100;
            $data['percent_week_1_june_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_june']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_june_bd'] = 0;
            $data['percent_week_1_june_terdownload'] = 100;
        }

        $data['total_bd_week_2_june'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 6)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_june'])) {
            $data['percent_week_2_june_bd'] = ($data['total_bd_week_2_june'] / $data['total_unit']) * 100;
            $data['percent_week_2_june_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_june']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_june_bd'] = 0;
            $data['percent_week_2_june_terdownload'] = 100;
        }

        $data['total_bd_week_3_june'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 6)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_june'])) {
            $data['percent_week_3_june_bd'] = ($data['total_bd_week_3_june'] / $data['total_unit']) * 100;
            $data['percent_week_3_june_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_june']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_june_bd'] = 0;
            $data['percent_week_3_june_terdownload'] = 100;
        }

        $data['total_bd_week_4_june'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 6)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_june'])) {
            $data['percent_week_4_june_bd'] = ($data['total_bd_week_4_june'] / $data['total_unit']) * 100;
            $data['percent_week_4_june_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_june']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_june_bd'] = 0;
            $data['percent_week_4_june_terdownload'] = 100;
        }
        
        $data['total_bd_week_1_july'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 7)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_july'])) {
            $data['percent_week_1_july_bd'] = ($data['total_bd_week_1_july'] / $data['total_unit']) * 100;
            $data['percent_week_1_july_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_july']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_july_bd'] = 0;
            $data['percent_week_1_july_terdownload'] = 100;
        }

        $data['total_bd_week_2_july'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 7)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_july'])) {
            $data['percent_week_2_july_bd'] = ($data['total_bd_week_2_july'] / $data['total_unit']) * 100;
            $data['percent_week_2_july_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_july']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_july_bd'] = 0;
            $data['percent_week_2_july_terdownload'] = 100;
        }

        $data['total_bd_week_3_july'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 7)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_july'])) {
            $data['percent_week_3_july_bd'] = ($data['total_bd_week_3_july'] / $data['total_unit']) * 100;
            $data['percent_week_3_july_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_july']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_july_bd'] = 0;
            $data['percent_week_3_july_terdownload'] = 100;
        }

        $data['total_bd_week_4_july'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 7)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_july'])) {
            $data['percent_week_4_july_bd'] = ($data['total_bd_week_4_july'] / $data['total_unit']) * 100;
            $data['percent_week_4_july_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_july']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_july_bd'] = 0;
            $data['percent_week_4_july_terdownload'] = 100;
        }

        $data['total_bd_week_1_august'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 8)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_august'])) {
            $data['percent_week_1_august_bd'] = ($data['total_bd_week_1_august'] / $data['total_unit']) * 100;
            $data['percent_week_1_august_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_august']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_august_bd'] = 0;
            $data['percent_week_1_august_terdownload'] = 100;
        }

        $data['total_bd_week_2_august'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 8)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_august'])) {
            $data['percent_week_2_august_bd'] = ($data['total_bd_week_2_august'] / $data['total_unit']) * 100;
            $data['percent_week_2_august_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_august']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_august_bd'] = 0;
            $data['percent_week_2_august_terdownload'] = 100;
        }

        $data['total_bd_week_3_august'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 8)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_august'])) {
            $data['percent_week_3_august_bd'] = ($data['total_bd_week_3_august'] / $data['total_unit']) * 100;
            $data['percent_week_3_august_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_august']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_august_bd'] = 0;
            $data['percent_week_3_august_terdownload'] = 100;
        }

        $data['total_bd_week_4_august'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 8)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_august'])) {
            $data['percent_week_4_august_bd'] = ($data['total_bd_week_4_august'] / $data['total_unit']) * 100;
            $data['percent_week_4_august_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_august']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_august_bd'] = 0;
            $data['percent_week_4_august_terdownload'] = 100;
        }

        $data['total_bd_week_1_september'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 9)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_september'])) {
            $data['percent_week_1_september_bd'] = ($data['total_bd_week_1_september'] / $data['total_unit']) * 100;
            $data['percent_week_1_september_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_september']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_september_bd'] = 0;
            $data['percent_week_1_september_terdownload'] = 100;
        }

        $data['total_bd_week_2_september'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 9)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_september'])) {
            $data['percent_week_2_september_bd'] = ($data['total_bd_week_2_september'] / $data['total_unit']) * 100;
            $data['percent_week_2_september_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_september']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_september_bd'] = 0;
            $data['percent_week_2_september_terdownload'] = 100;
        }

        $data['total_bd_week_3_september'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 9)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_september'])) {
            $data['percent_week_3_september_bd'] = ($data['total_bd_week_3_september'] / $data['total_unit']) * 100;
            $data['percent_week_3_september_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_september']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_september_bd'] = 0;
            $data['percent_week_3_september_terdownload'] = 100;
        }

        $data['total_bd_week_4_september'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 9)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_september'])) {
            $data['percent_week_4_september_bd'] = ($data['total_bd_week_4_september'] / $data['total_unit']) * 100;
            $data['percent_week_4_september_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_september']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_september_bd'] = 0;
            $data['percent_week_4_september_terdownload'] = 100;
        }
        
        $data['total_bd_week_1_october'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 10)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_october'])) {
            $data['percent_week_1_october_bd'] = ($data['total_bd_week_1_october'] / $data['total_unit']) * 100;
            $data['percent_week_1_october_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_october']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_october_bd'] = 0;
            $data['percent_week_1_october_terdownload'] = 100;
        }

        $data['total_bd_week_2_october'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 10)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_october'])) {
            $data['percent_week_2_october_bd'] = ($data['total_bd_week_2_october'] / $data['total_unit']) * 100;
            $data['percent_week_2_october_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_october']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_october_bd'] = 0;
            $data['percent_week_2_october_terdownload'] = 100;
        }

        $data['total_bd_week_3_october'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 10)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_october'])) {
            $data['percent_week_3_october_bd'] = ($data['total_bd_week_3_october'] / $data['total_unit']) * 100;
            $data['percent_week_3_october_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_october']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_october_bd'] = 0;
            $data['percent_week_3_october_terdownload'] = 100;
        }

        $data['total_bd_week_4_october'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 10)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_october'])) {
            $data['percent_week_4_october_bd'] = ($data['total_bd_week_4_october'] / $data['total_unit']) * 100;
            $data['percent_week_4_october_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_october']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_october_bd'] = 0;
            $data['percent_week_4_october_terdownload'] = 100;
        }

        $data['total_bd_week_1_november'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 11)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_november'])) {
            $data['percent_week_1_november_bd'] = ($data['total_bd_week_1_november'] / $data['total_unit']) * 100;
            $data['percent_week_1_november_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_november']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_november_bd'] = 0;
            $data['percent_week_1_november_terdownload'] = 100;
        }

        $data['total_bd_week_2_november'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 11)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_november'])) {
            $data['percent_week_2_november_bd'] = ($data['total_bd_week_2_november'] / $data['total_unit']) * 100;
            $data['percent_week_2_november_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_november']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_november_bd'] = 0;
            $data['percent_week_2_november_terdownload'] = 100;
        }

        $data['total_bd_week_3_november'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 11)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_november'])) {
            $data['percent_week_3_november_bd'] = ($data['total_bd_week_3_november'] / $data['total_unit']) * 100;
            $data['percent_week_3_november_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_november']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_november_bd'] = 0;
            $data['percent_week_3_november_terdownload'] = 100;
        }

        $data['total_bd_week_4_november'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 11)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_november'])) {
            $data['percent_week_4_november_bd'] = ($data['total_bd_week_4_november'] / $data['total_unit']) * 100;
            $data['percent_week_4_november_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_november']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_november_bd'] = 0;
            $data['percent_week_4_november_terdownload'] = 100;
        }

        $data['total_bd_week_1_desember'] = KpiVhms::where('week_data', 'WEEK_1')->where('month', 12)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_1_desember'])) {
            $data['percent_week_1_desember_bd'] = ($data['total_bd_week_1_desember'] / $data['total_unit']) * 100;
            $data['percent_week_1_desember_terdownload'] = (($data['total_unit'] - $data['total_bd_week_1_desember']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_1_desember_bd'] = 0;
            $data['percent_week_1_desember_terdownload'] = 100;
        }

        $data['total_bd_week_2_desember'] = KpiVhms::where('week_data', 'WEEK_2')->where('month', 12)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_2_desember'])) {
            $data['percent_week_2_desember_bd'] = ($data['total_bd_week_2_desember'] / $data['total_unit']) * 100;
            $data['percent_week_2_desember_terdownload'] = (($data['total_unit'] - $data['total_bd_week_2_desember']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_2_desember_bd'] = 0;
            $data['percent_week_2_desember_terdownload'] = 100;
        }

        $data['total_bd_week_3_desember'] = KpiVhms::where('week_data', 'WEEK_3')->where('month', 12)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_3_desember'])) {
            $data['percent_week_3_desember_bd'] = ($data['total_bd_week_3_desember'] / $data['total_unit']) * 100;
            $data['percent_week_3_desember_terdownload'] = (($data['total_unit'] - $data['total_bd_week_3_desember']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_3_desember_bd'] = 0;
            $data['percent_week_3_desember_terdownload'] = 100;
        }

        $data['total_bd_week_4_desember'] = KpiVhms::where('week_data', 'WEEK_4')->where('month', 12)->where('year', Carbon::now()->format('Y'))->count(); 
        if (!empty($data['total_bd_week_4_desember'])) {
            $data['percent_week_4_desember_bd'] = ($data['total_bd_week_4_desember'] / $data['total_unit']) * 100;
            $data['percent_week_4_desember_terdownload'] = (($data['total_unit'] - $data['total_bd_week_4_desember']) / $data['total_unit']) * 100;
        }else{
            $data['percent_week_4_desember_bd'] = 0;
            $data['percent_week_4_desember_terdownload'] = 100;
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $currentDate = Carbon::now();
        $year = $currentDate->format('Y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        if ($request->hasFile('evidence_image')) {
            $evidenceImage = $request->file('evidence_image');
            $pathEvidenceImage = $evidenceImage->store('images', 'public');
            $newPathEvidenceImage = 'storage/' . $pathEvidenceImage;

            $dataEvidenceImage = [
                'week_data' => $request->week_data,
                'evidence_image' => $newPathEvidenceImage,
                'month' => $month,
                'year' => $year,
            ];
            $data['insertDataEvidenceImage'] = DB::table('kpi_vhms_evidence')->insert($dataEvidenceImage);
        }
        $vhms_get_data = kpiVhms::find($request->id);

        if (empty($request->id)) {
            $weekData = $request->week_data;
            $status = $request->status;
            $pic = $request->pic;
            $remark = $request->remark;
            foreach ($request->unit_code as $key => $code) {
                $dataKpiVhms[] = [
                    'unit_code' => $code,
                    'week_data' => $weekData,
                    'status' => $status[$key] ?? null,
                    'pic' => $pic[$key] ?? null,
                    'remark' => $remark[$key] ?? null,
                    'month' => $month,
                    'year' => $year,
                    'created_by' => Auth::user()->name,
                ];
            }
            $data['createKpiBreakdownUnit'] = DB::table('kpi_vhms')->insert($dataKpiVhms);
            // return response()->json($dataKpiVhms, 201);
        } else {
            $data['updateKpiBreakdownUnit'] = kpiVhms::firstWhere('id', $request->id)->update($request->all());
        }
        return response()->json($data, 201);
    }

    public function showDataSortingUnitBreakdown(Request $request)
    {
        $data =  kpiVhms::where('week_data', $request->week_data)->where('month', $request->month)->where('year', $request->year)->get();
        return response()->json($data);
    }

    public function showDataKpi(Request $request)
    {
        $kpi['evidenceImage'] = '';
        $arrayDataKpiVhmsTableBreakdownList = [];
        $kpi['total_unit'] = DispatchVhms::count();
        $kpi['total_breakdown'] =  kpiVhms::where('week_data', $request->week_data)->where('month', $request->month)->where('year', $request->year)->count();
        $kpi['total_ter_download'] =  $kpi['total_unit'] - $kpi['total_breakdown'];

        $evidenceImage = DB::table('kpi_vhms_evidence')->where('week_data', $request->week_data)->where('month', $request->month)->where('year', $request->year)->first();
        $dataBreakdown = KpiVhms::where('week_data', $request->week_data)->where('month', $request->month)->where('year', $request->year)->get();
        if (!empty($dataBreakdown)) {
            foreach ($dataBreakdown as $data) {

                $arrayDataKpiVhmsTableBreakdownList[] = [
                    'unit_code' => $data->unit_code,
                    'pic' => $data->pic,
                    'remark' => $data->remark,
                ];
            }
        }

        if (!empty($evidenceImage->evidence_image)) {
            $kpi['evidenceImage'] = $evidenceImage->evidence_image;
        }
        $kpi['percentageChartPieBreakdown'] = ($kpi['total_breakdown'] / $kpi['total_unit']) * 100;
        $kpi['percentageChartPieReady'] = ($kpi['total_unit'] - $kpi['total_breakdown']) / $kpi['total_unit'] * 100;
        $kpi['kpiVhmsAchievement'] = ($kpi['total_unit'] - $kpi['total_breakdown']) / $kpi['total_unit'] * 100;

        $bulan = $request->month;
        if ($bulan == 1) {
            $bulan = "Januari";
        } elseif ($bulan == 2) {
            $bulan = "Februari";
        } elseif ($bulan == 3) {
            $bulan = "Maret";
        } elseif ($bulan == 4) {
            $bulan = "April";
        } elseif ($bulan == 5) {
            $bulan = "Mei";
        } elseif ($bulan == 6) {
            $bulan = "Juni";
        } elseif ($bulan == 7) {
            $bulan = "Juli";
        } elseif ($bulan == 8) {
            $bulan = "Agustus";
        } elseif ($bulan == 9) {
            $bulan = "September";
        } elseif ($bulan == 10) {
            $bulan = "Oktober";
        } elseif ($bulan == 11) {
            $bulan = "November";
        } elseif ($bulan == 12) {
            $bulan = "Desember";
        }


        $returnDataKpi = [
            'periode' =>  $request->week_data . ' ' . $bulan . ' ' . $request->year,
            'total_unit' =>  $kpi['total_unit'],
            'vhms_unit_terdownload' => $kpi['total_ter_download'],
            'vhms_unit_breakdown' => $kpi['total_breakdown'],
            'percentageVhmsTerDownload' => $kpi['percentageChartPieReady'],
            'percentageVhmsBreakdown' => $kpi['percentageChartPieBreakdown'],
            'achhievement' => $kpi['kpiVhmsAchievement'],
            'evidence_image' => $kpi['evidenceImage'],
            'dataTableBreakdown' => $arrayDataKpiVhmsTableBreakdownList,
        ];
        return response()->json($returnDataKpi);
    }
}
