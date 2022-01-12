<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Models\Portfolio;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('manage.portfolio.index', ['portfolios' => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:50',
                'description' => 'max:500',
                'image' => 'required|max:200'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $path = FileManager::fileUpload($request->file('image'), 'uploads/portfolios');
        Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path
        ]);
        return redirect('/admin/portfolio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::all()->find($id);
        return view('manage.portfolio.edit', ['portfolio' => $portfolio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::all()->find($id);
        return view('manage.portfolio.edit', ['portfolio' => $portfolio]);
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
        $portfolio = Portfolio::all()->find($id);
        if ($request->file('image') != null) {
            FileManager::deleteFile(public_path('uploads/portfolios/'.$portfolio->image));
            $path = FileManager::fileUpload($request->file('image'), 'uploads/portfolios');
            $portfolio->image = $path;
        }
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->save();
        return redirect('/admin/portfolio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::all()->find($id);
        FileManager::deleteFile(public_path('uploads/portfolios/'.$portfolio->image));
        $portfolio->delete();
        return redirect('/admin/portfolio');
    }
}
