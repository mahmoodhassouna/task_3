<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CountrieResidence;
use App\Models\Country;
use App\Models\District;
use App\Models\Governorate;
use App\Models\Nationalitie;
use App\Models\SponsorInstitution;
use App\Models\SponsorPersonal;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class SponsorsController extends Controller
{
 protected $sponsor;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_sponsors()
    {
      $a = SponsorInstitution::all() ;
      $b = SponsorPersonal::all() ;
        $result = $a->merge($b);

      return response()->json([
          'data'=>$result
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citys = City::all();
        $districts = District::all();
        $governorates = Governorate::all();
        $nationalities = Nationalitie::all();
        $countrieresidence = CountrieResidence::all();
        $countries = Country::all();
        return view('sponsors.add',[
            'citys'=>$citys,
            'districts'=>$districts,
            'governorates'=>$governorates,
            'nationalities'=>$nationalities,
            'countrieresidence'=>$countrieresidence,
            'countries'=>$countries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePersonalSponsor(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'id_number'=> 'required|numeric|digits:9|unique:sponsors_personal,id_number',
                'id_type'=> 'required',
                'fname'=> 'string|required|max:20',
                'mname'=> 'string|required|max:20',
                'gname'=> 'string|required|max:20',
                'lname'=> 'string|required|max:20',
                'governorate_id'=> 'required|numeric|exists:governorates,id',
                'city_id'=> 'required|numeric|exists:citys,id',
                'district_id'=> 'required|numeric|exists:districts,id',
                'nationalitie_id'=> 'required|numeric|exists:nationalities,id',
                'countrie_residence_id'=> 'required|numeric|exists:countries_residence,id',
                'phone'=> 'required|numeric',
                'telii_phone'=> 'numeric',
                'address'=> 'required|nullable|max:50',
                'email'=> 'required|email|max:40',

            ] ,[
                    'id_number.required'=>'يجب ادخال رقم التعريف ',
                    'id_number.unique'=>'رقم التعريف موجود مسبقا ',
                    'id_number.digits'=>'رقم التعريف يتكون من 9 ارقام ',
                    'id_number.numeric'=>'رقم الوثيقة غير صالح يرجى ادخال ارقام  ',
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                    SponsorPersonal::insert([
                        'sponsor_number'=> Helper::IDGenerator(new SponsorPersonal(), 'sponsor_number', 5, 'SPN'),
                        'entry_date'=> date('Y-m-d'),
                        'user_id'=> Auth::user()->name,
                        'id_number' => $request->post('id_number'),
                        'name' => $request->post('fname'),
                        'mname' => $request->post('mname'),
                        'gname' => $request->post('gname'),
                        'lname' => $request->post('lname'),
                        'governorate_id' => $request->post('governorate_id'),
                        'city_id' => $request->post('city_id'),
                        'district_id' => $request->post('district_id'),
                        'nationalitie_id' => $request->post('nationalitie_id'),
                        'countrie_residence_id' => $request->post('countrie_residence_id'),
                        'address' => $request->post('address'),
                        'email' => $request->post('email'),
                        'telii_phone' => $request->post('telii_phone'),
                        'phone' => $request->post('phone'),
                        'id_type' => $request->post('id_type'),
                        'sponsor_type' => 'Personal',

                    ]);


                    return response()->json([
                        'status' => 400,
                        'msg' => "تم الحفظ بنجاح",
                    ]);



            }
        }catch (\Exception $ex){
            return $ex;
            return response()->json([
                'status' => 401,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
    }


    public function storeInstitutionSponsor(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name'=> 'string|required|max:50',
                'country_id'=> 'required|numeric|exists:countrys,id',
                'phone1'=> 'required|numeric',
                'phone2'=> 'required|numeric',
                'address'=> 'required|nullable|max:50',
                'email'=> 'required|email|max:50',
                'contact_person'=> 'required|max:50',

            ] ,[
                //messages validation
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                SponsorInstitution::insert([
                    'sponsor_number'=> Helper::IDGenerator(new SponsorInstitution(), 'sponsor_number', 5, 'SPI'),
                    'entry_date'=> date('Y-m-d'),
                    'user_id'=> Auth::user()->name,
                    'name' => $request->post('name'),
                    'country_id' => $request->post('country_id'),
                    'phone' => $request->post('phone1'),
                    'phone2' => $request->post('phone2'),
                    'address' => $request->post('address'),
                    'email' => $request->post('email'),
                    'contact_person' => $request->post('contact_person'),
                    'sponsor_type' => 'Institution',

                ]);


                return response()->json([
                    'status' => 400,
                    'msg' => "تم الحفظ بنجاح",
                ]);



            }
        }catch (\Exception $ex){
            return response()->json([
                'status' => 401,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function search(){

        $citys = City::all();
        $governorates = Governorate::all();
        $nationalities = Nationalitie::all();
        $countrieresidence = CountrieResidence::all();
        $countries = Country::all();

        return view('sponsors.search',[
            'citys'=>$citys,
            'governorates'=>$governorates,
            'nationalities'=>$nationalities,
            'countrieresidence'=>$countrieresidence,
            'countries'=>$countries,
        ]);
    }

    public function searchPersonalSponsor(Request $request){

         $search = [];

        if(isset($request->governorate_id)){
            $search += ['governorate_id'=> $request->post('governorate_id')];
        }
        if(isset($request->city_id)){
            $search += ['city_id'=> $request->post('city_id')];
        }
        if(isset($request->countrie_residence_id)){
            $search += ['countrie_residence_id'=>$request->post('countrie_residence_id')];
       }
        if(isset($request->nationalitie_id)){
            $search += ['nationalitie_id'=>$request->post('nationalitie_id')];
        }
        if(isset($request->id_number)){
            $search += ['id_number'=>$request->post('id_number')];
       }
        if(isset($request->name)){
            $search = ['name'=> $request->post('name')];
        }

         $sponsor = SponsorPersonal::where($search)->get();
        return response()->json([
            'data'=>$sponsor,
            'status'=>400
        ]);

    }

    public function searchInstitutionSponsor(Request $request){

        $search = [];

        if(isset($request->country_id)){
            $search += ['country_id' => $request->post('country_id')];
        }
        if(isset($request->phone)){
            $search += ['phone'=>$request->post('phone')];
        }
        if(isset($request->email)){
            $search += ['email'=>$request->post('email')
            ];
        }
        if(isset($request->name)){
            $search += ['name'=>$request->post('name')
            ];
        }

        $sponsor = SponsorInstitution::where($search)->get();
        return response()->json([
            'data'=>$sponsor,
            'status'=>400
        ]);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPersonalSponsor($id)
    {
        $PersonalSponsor = SponsorPersonal::find($id);
        if($PersonalSponsor){
            $citys = City::all();
            $districts = District::all();
            $governorates = Governorate::all();
            $nationalities = Nationalitie::all();
            $countrieresidence = CountrieResidence::all();
            $countries = Country::all();

            return view('sponsors.editP',[
                'citys'=>$citys,
                'districts'=>$districts,
                'governorates'=>$governorates,
                'nationalities'=>$nationalities,
                'countrieresidence'=>$countrieresidence,
                'countries'=>$countries,
                'PersonalSponsor'=>$PersonalSponsor,
            ]);
        }else{
            return session()->flash("not found");
        }

    }

    public function editInstitutionSponsor($id)
    {
        $InstitutionSponsor = SponsorInstitution::find($id);
        $countries = Country::all();
        if($InstitutionSponsor){
            return view('sponsors.editI',compact('InstitutionSponsor','countries'));
        }else{
            return session()->flash("not found");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePersonal(Request $request, $id)
    {

        try {
            $sponsor = SponsorPersonal::find($id);
            if($sponsor) {
                $validator = Validator::make($request->all(), [
                    'id_number'=> 'required|numeric|digits:9|exists:sponsors_personal,id_number',
                    'id_type'=> 'required',
                    'fname'=> 'string|required|max:20',
                    'mname'=> 'string|required|max:20',
                    'gname'=> 'string|required|max:20',
                    'lname'=> 'string|required|max:20',
                    'governorate_id'=> 'required|numeric|exists:governorates,id',
                    'city_id'=> 'required|numeric|exists:citys,id',
                    'district_id'=> 'required|numeric|exists:districts,id',
                    'nationalitie_id'=> 'required|numeric|exists:nationalities,id',
                    'countrie_residence_id'=> 'required|numeric|exists:countries_residence,id',
                    'phone'=> 'required|numeric',
                    'telii_phone'=> 'numeric',
                    'address'=> 'required|nullable|max:50',
                    'email'=> 'required|email|max:40',

                ] ,[
                        'id_number.required'=>'يجب ادخال رقم التعريف ',
                        'id_number.exists'=>'لا يمكنك تغير رقم الهوية  ',
                        'id_number.digits'=>'رقم التعريف يتكون من 9 ارقام ',
                        'id_number.numeric'=>'رقم الوثيقة غير صالح يرجى ادخال ارقام  ',
                    ]
                );

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 200,
                        'errors' => $validator->messages()
                    ]);
                } else {


                    $sponsor->update([
                        'id_number' => $request->post('id_number'),
                        'name' => $request->post('fname'),
                        'mname' => $request->post('mname'),
                        'gname' => $request->post('gname'),
                        'lname' => $request->post('lname'),
                        'governorate_id' => $request->post('governorate_id'),
                        'city_id' => $request->post('city_id'),
                        'district_id' => $request->post('district_id'),
                        'nationalitie_id' => $request->post('nationalitie_id'),
                        'countrie_residence_id' => $request->post('countrie_residence_id'),
                        'address' => $request->post('address'),
                        'email' => $request->post('email'),
                        'telii_phone' => $request->post('telii_phone'),
                        'phone' => $request->post('phone'),
                        'id_type' => $request->post('id_type'),

                    ]);


                    return response()->json([
                        'status' => 400,
                        'msg' => "تم الحفظ بنجاح",
                    ]);



                }

            }else{
                return response()->json([
                    'status' => 402,
                    'msg' => "الكفيل غير موجود",
                ]);
            }
            }
           catch (\Exception $ex){
return $ex;
            return response()->json([
                'status' => 401,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
    }


    public function updateInstitution(Request $request, $id)
    {
        try {
            $Institution = SponsorInstitution::find($id);
            if ($Institution){
                $validator = Validator::make($request->all(), [
                    'name'=> 'string|required|max:50',
                    'country_id'=> 'required|numeric|exists:countrys,id',
                    'phone1'=> 'required|numeric',
                    'phone2'=> 'required|numeric',
                    'address'=> 'required|nullable|max:50',
                    'email'=> 'required|email|max:50',
                    'contact_person'=> 'required|max:50',

                ] ,[
                        //messages validation
                    ]
                );

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 200,
                        'errors' => $validator->messages()
                    ]);
                } else {


                    $Institution->update([
                        'name' => $request->post('name'),
                        'country_id' => $request->post('country_id'),
                        'phone' => $request->post('phone1'),
                        'phone2' => $request->post('phone2'),
                        'address' => $request->post('address'),
                        'email' => $request->post('email'),
                        'contact_person' => $request->post('contact_person'),

                    ]);


                    return response()->json([
                        'status' => 400,
                        'msg' => "تم الحفظ بنجاح",
                    ]);



                }
            }else{
                return response()->json([
                    'status' => 402,
                    'msg' => "الكفيل غير موجود",
                ]);
            }

        }catch (\Exception $ex){
            return response()->json([
                'status' => 401,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
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
    public function personalsponsor($id)
    {
        $sponsor = SponsorPersonal::find($id);

        if(!$sponsor){
            return response()->json([
                'status'=>200,
                'msg'=>'sponsor not found'
            ]);
        }else{
            $sponsor->delete();
            return response()->json([
                'status'=>400,
                'msg'=>'deleted success'
            ]);
        }
    }
    public function institutionsponsor($id)
    {
        $sponsor = SponsorInstitution::find($id);

        if(!$sponsor){
            return response()->json([
                'status'=>200,
                'msg'=>'sponsor not found'
            ]);
        }else{
            $sponsor->delete();
            return response()->json([
                'status'=>400,
                'msg'=>'deleted success'
            ]);
        }
    }
}
