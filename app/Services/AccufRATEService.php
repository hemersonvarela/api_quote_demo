<?php

namespace App\Services;

use App\Models\Carrier;
use App\Models\Quote;
use App\Models\Tariff;
use Illuminate\Support\Facades\Http;

class AccufRATEService
{
    static function getQuote($request)
    {
        $responseObj = self::getSOAPResponse($request);
        return self::generateQuoteFromSoapObject($responseObj);
    }

    /**
     * Get and parse SOAP response
     * @param $request
     * @return mixed
     */
    static function getSOAPResponse($request)
    {
        // call ACCUFRATE SOAP endpoint
        $soapResponse = Http::get(
            env('ACCUFRATE_SERVICE_GET_QUOTE')
        );

        // clean soap response
        $xml = strtr(
            $soapResponse->getBody()->getContents(),
            ['</s:' => '</', '<s:' => '<', '</a:' => '</', '<a:' => '<']
        );

        return json_decode(
            json_encode(
                simplexml_load_string($xml)
            )
        );
    }

    /**
     * Generate a quote from SOAP obj
     * @param $request
     * @return mixed
     */
    static function generateQuoteFromSoapObject($responseObj)
    {
        $accufRATEQuote = $responseObj->Body->GetQuotesResponse->GetQuotesResult;

        $quote = Quote::firstOrCreate(
            ['quote_id' => $accufRATEQuote->QuoteID],
            ['is_valid' => (boolean) $accufRATEQuote->IsValid],
        );

        self::generateQuoteDetailsFromSOAPObject($quote, $responseObj);

        return $quote;
    }

    /**
     * Generate quote details from SOAP obj
     * @param $quote
     * @param $responseObj
     * @return void
     */
    static function generateQuoteDetailsFromSOAPObject($quote, $responseObj)
    {
        $accufRATEQuoteItems = $responseObj->Body->GetQuotesResponse->GetQuotesResult->Quotes->Quote;

        foreach ($accufRATEQuoteItems as $accufRATEQuoteItem){

            // get or create carrier model
            $carrier = Carrier::firstOrCreate(
                ['id' => $accufRATEQuoteItem->CarrierID],
                ['name' => $accufRATEQuoteItem->Carrier],
            );

            // get or create tariff model
            $tariff = Tariff::firstOrCreate(
                ['account_number' => $accufRATEQuoteItem->AccountNumber],
                ['owner' => $accufRATEQuoteItem->TariffOwner],
            );

            // create quote details
            $quote->quoteDetails()->firstOrCreate(
                ['quote_detail_id' => $accufRATEQuoteItem->QuoteDetailID],
                [
                    'carrier_id' => $carrier->id,
                    'tariff_id' => $tariff->id,
                    'quote_number' => $accufRATEQuoteItem->QuoteNumber,
                    'base_charge' => $accufRATEQuoteItem->BaseCharge,
                    'net_charge' => $accufRATEQuoteItem->NetCharge,
                    'transit_time' => $accufRATEQuoteItem->TransitTime,
                    'origin_phone' => $accufRATEQuoteItem->OriginPhone,
                    'dest_phone' => $accufRATEQuoteItem->DestPhone,
                ]
            );
        }
    }

}
