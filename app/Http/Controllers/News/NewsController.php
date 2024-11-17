<?php

namespace App\Http\Controllers\News;

use App\Contracts\Interface\News\NewsInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsInterface $news;
    public function __construct(
        NewsInterface $news,
    )
    {
        $this->news = $news;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return ResponseHelper::success($this->news->get());

        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        try{
            return ResponseHelper::success($this->news->show($news->id));
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news)
    {
        try{
            $validated = $request->validated();
            $this->news->update($validated,$news->id);
            return ResponseHelper::success($validated, message: "Update success");
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try{
            $this->news->delete($news->id);
            return ResponseHelper::success("Delete success");
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }
}
