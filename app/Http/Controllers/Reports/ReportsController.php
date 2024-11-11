<?php

namespace App\Http\Controllers\Reports;

use App\Contracts\Interface\Reports\ReportsInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Reports;

class ReportsController extends Controller
{
    private ReportsInterface $reports;
    public function __construct(
        ReportsInterface $reports
    )
    {
        $this->reports = $reports;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return ResponseHelper::success($this->reports->get());
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        try{
            $validated = $request->validated();
            $this->reports->store($validated);
            return ResponseHelper::success(
                $validated,message: "Success save"
            );
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reports $report)
    {
        try{
            return ResponseHelper::success($this->reports->show($report->id));
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReportRequest $request, Reports $report)
    {
        try{
            $validated = $request->validated();
            $this->reports->update($validated,$report->id);
            return ResponseHelper::success($validated,message: "Success update");
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reports $report)
    {
        try{
            $this->reports->delete($report->id);
            return ResponseHelper::success(message: "Delete Success");
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }
}
