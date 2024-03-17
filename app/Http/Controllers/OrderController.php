<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{


    public function step1(Request $request)
    {
        if ($request->isMethod('POST')) {

            $request->session()->put('meal_category', $request->meal_category);
            $request->session()->put('num_people', $request->num_people);
            if (Session::has('meal_category')) {
                $value['meal_category'] = Session::get('meal_category');
                $value['num_people'] = Session::get('num_people');
                return redirect()->route('step2');
            }
        }
        return view('step1');
    }
    public function step2(Request $request)
    {
        $dishes = Dish::select('restaurant')
            ->whereJsonContains('availableMeals', Session::get('meal_category'))
            ->distinct('restaurant')
            ->get();
        if ($request->isMethod('POST')) {

            $request->session()->put('restaurant', $request->restaurant);
            if (Session::has('restaurant')) {
                $value['restaurant'] = Session::get('restaurant');

                return redirect()->route('step3');
            }
        }
        return view('step2', compact('dishes'));
    }
    public function step3(Request $request)
    {
        $dishes = Dish::select('name', 'id')
            ->whereJsonContains('availableMeals', Session::get('meal_category'))
            ->where('restaurant', Session::get('restaurant'))
            ->distinct('restaurant')->get();
        if ($request->isMethod('POST')) {
            $uniqueArray = array_unique($request->dish_name);
            if (count($request->dish_name) != count($uniqueArray)) {
                Session::flash('error', 'Bạn không được chọn cùng 1 món ăn');
                return view('step3', compact('dishes'));
            }
            $request->session()->put('dish_name', $request->dish_name);
            $request->session()->put('number', $request->number);
            // dd(Session::all());
            return redirect()->route('review');
        }
        return view('step3', compact('dishes'));
    }
    public function review()
    {
        $result = [];
        $meal_category= Session::get('meal_category') ;
        $num_people= Session::get('num_people') ;
        $restaurant= Session::get('restaurant') ;
       
        for ($i = 0; $i < count(Session::get('dish_name')); $i++) {
            $result[] = ['name' => Session::get('dish_name')[$i], 'num' => Session::get('number')[$i]];
        }
        // dd($result);
        return view('review',compact('meal_category','num_people','restaurant','result'));
    }
}
