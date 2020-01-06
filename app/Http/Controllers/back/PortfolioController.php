<?php

namespace App\Http\Controllers\back;

use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios = Portfolio::orderBy('id', 'DESC')->paginate(20);
        return view('back.portfolios.portfolios', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'فیلد عنوان را وارد نمایید'
        ];
        $validatedData = $request->validate([
            'name' => 'required',

        ], $messages);

        $portfolio = new Portfolio();
        try {
            $portfolio->create($request->all());
        } catch (Exception $exception) {

            return redirect(route('admin.portfolios.create'))->with('warning', $exception->getCode());
        }

        $msg = "ذخیره ی نمونه کار جدید با موفقیت انجام شد";
        return redirect(route('admin.portfolios'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('back.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {


        $messages = [
            'name.required' => 'فیلد عنوان را وارد نمایید'

        ];
        $validatedData = $request->validate([
            'name' => 'required',

        ], $messages);

        try {
            $portfolio->update($request->all());
        } catch (Exception $exception) {

            return redirect(route('admin.portfolios.edit'))->with('warning', $exception->getCode());
        }

        $msg = "بروزرسانی نمونه کار با موفقیت انجام شد";
        return redirect(route('admin.portfolios'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.categories'))->with('warning', $exception->getCode());
        }

        $msg = "آیتم مورد نظر حذف گردید";
        return redirect(route('admin.categories'))->with('success', $msg);
    }
}
