<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteDetailRequest;
use App\Http\Requests\UpdateQuoteDetailRequest;
use App\Http\Resources\QuoteDetailResource;
use App\Models\QuoteDetail;
use Illuminate\Http\Response;

class QuoteDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return QuoteDetailResource::collection(
            QuoteDetail::paginate(10)
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuoteDetailRequest  $request
     * @return Response
     */
    public function store(StoreQuoteDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuoteDetail  $quoteDetail
     * @return Response
     */
    public function show(QuoteDetail $quoteDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuoteDetail  $quoteDetail
     * @return Response
     */
    public function edit(QuoteDetail $quoteDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuoteDetailRequest  $request
     * @param  \App\Models\QuoteDetail  $quoteDetail
     * @return Response
     */
    public function update(UpdateQuoteDetailRequest $request, QuoteDetail $quoteDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuoteDetail  $quoteDetail
     * @return Response
     */
    public function destroy(QuoteDetail $quoteDetail)
    {
        //
    }
}
