<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use LaravelLocalization;
class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getOffers()
    {
        return Offer::select('id', 'name')->get();
    }
    public function create()
    {
        return view('offers.create');
    }

    public function store(OfferRequest $request)
    {
        //validate data before insert to database
      /*  $rules = $this->getRules();
        $messages = $this->getMessages();
         $validator = Validator::make($request->all() ,$rules, $messages);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
         }
*/

      //  $file_name = $this->saveImage($request->photo, 'images/offers');

        //insert
        Offer::create([
          //  'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
        ]);

      //  return redirect()->back()->with(['success' => 'تم اضافه العرض بنجاح ']);
        return redirect()->back()->with(['success' => __('messages.offer success')]);

    }



    /*   protected function getMessages()
        {
            return $messages = [
                'name.required' => __('messages.offer name required'),
                'name.unique' => 'اسم العرض موجود ',
                'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
                'price.required' => 'السعر مطلوب',
                'details.required' => 'ألتفاصيل مطلوبة ',
            ];
        }
        protected function getRules()
        {
            return $rules = [
                'name' => 'required|max:100|unique:offers,name',
                'price' => 'required|numeric',
                'details' => 'required',
            ];
        }


*/

    public function getAllOffers()
    {
        $offers = Offer::select('id',
            'price',
           // 'photo',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        )->get(); // return collection
        return view('offers.all', compact('offers'));
    }

    public function editOffer($offer_id)
    {
        //return $offer_id;
         //Offer::findOrFail($offer_id);
        $offer = Offer::find($offer_id);  // search in given table id only
        if (!$offer)
            return redirect()->back();

        $offer = Offer::select('id', 'name_ar', 'name_en', 'details_ar', 'details_en', 'price')->find($offer_id);

        return view('offers.edit', compact('offer'));

    }

}
