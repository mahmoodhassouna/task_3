<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="Wizard examples" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="{{asset('assets/css/pages/wizard/wizard-3.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <style>
        label.error {
            color: red!important;
        }
        .error {
            color: #F00;

        }
    </style>
</head>
<body id="kt_body" class="header-fixed subheader-enabled page-loading" style="background: #FFFFFF">
<ul id="display_error"></ul>
<div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
    <div class="col-xl-10  col-xxl-7">
<div class="pb-5" data-wizard-type="step-content" >
    <form class="update_sponsor" action="" id="kt_form" method="post"
          autocomplete="off">
        @csrf
           <input type="hidden" name="id" value="{{$PersonalSponsor->id}}" id="id">
        <div class="row" >
            <div class="col">
                <label for="inputName" class="control-label" >  اختر نوع بطاقة التعريف</label>
            </div>
            <div class="col">
                <label  for="inputName" class="control-label"> جواز سفر</label>
                <input @if($PersonalSponsor->id_type = 'جواز سفر')checked @endif  type="radio" value="جواز سفر"  name="id_type">

                <label for="inputName"  class="control-label"> هوية</label>
                <input @if($PersonalSponsor->id_type = 'الهوية')checked @endif type="radio" value="هوية" name="id_type">

            </div>

            <div class="col">
                <label> رقم بطاقة التعريف</label>
                <input readonly class="form-control fc-datepicker" value="{{$PersonalSponsor->id_number}}" name="id_number" placeholder=""
                       type="text" required>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label for="inputName" class="control-label">الاسم</label>
                <input type="text" class="form-control" value="{{$PersonalSponsor->name}}" id="inputName" name="fname"
                       required>
            </div>

            <div class="col">
                <label>اسم الاب </label>
                <input class="form-control fc-datepicker" name="mname" placeholder=""
                       type="text" value="{{$PersonalSponsor->mname}}" required>
            </div>

            <div class="col">
                <label>اسم الجد</label>
                <input class="form-control fc-datepicker" value="{{$PersonalSponsor->gname}}" name="gname" placeholder=""
                       type="text" required>
            </div>

            <div class="col">
                <label>اسم العائلة</label>
                <input class="form-control fc-datepicker" name="lname" value="{{$PersonalSponsor->lname}}" placeholder=""
                       type="text" required>
            </div>

        </div>
        {{-- 2 --}}
        <div class="row">
            <div class="col">
                <label for="inputName" class="control-label">المحافظة</label>
                <select name="governorate_id" class="form-control SlectBox" >

                    @isset($governorates)
                        @foreach($governorates as $item)
                            <option @if($PersonalSponsor->governorate_id = $item->id) selected @endif value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>

            <div class="col">
                <label for="inputName" class="control-label">المدينة</label>
                <select name="city_id" class="form-control SlectBox"
                >
                    @isset($citys)
                        @foreach($citys as $item)
                            <option @if($PersonalSponsor->city_id = $item->id) selected @endif value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>

            <div class="col">
                <label for="inputName" class="control-label">الحي</label>
                <select name="district_id" class="form-control SlectBox"
                >
                    @isset($districts)
                        @foreach($districts as $item)
                            <option @if($PersonalSponsor->district_id = $item->id) selected @endif value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>


        </div>


        {{-- 3 --}}
        <div class="row">

            <div class="col">
                <label  class="control-label"> تفاصيل العنوان</label>
                <input type="text" value="{{$PersonalSponsor->address}}" class="form-control form-control-lg"
                       name="address" title=""
                       required>
            </div>


        </div>


        <div class="row">

            <div class="col">
                <label  class="control-label"> الهاتف</label>
                <input type="text" value="{{$PersonalSponsor->telii_phone}}" class="form-control form-control-lg"
                       name="telii_phone" title=" "
                >
            </div>

            <div class="col">
                <label for="inputName" class="control-label">الجوال</label>
                <input type="text" value="{{$PersonalSponsor->phone}}" class="form-control form-control-lg" id="Discount" name="phone"
                       title=" "
                       required>
            </div>

            <div class="col">
                <label for="inputName" class="control-label">البريد</label>
                <input type="email" value="{{$PersonalSponsor->email}}" class="form-control form-control-lg" id="Discount" name="email"
                       title=" "
                       required>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <label for="inputName" class="control-label">الجنسية</label>
                <select name="nationalitie_id" class="form-control SlectBox"
                >
                    @isset($nationalities)
                        @foreach($nationalities as $item)
                            <option @if($PersonalSponsor->nationalitie_id = $item->id) selected @endif value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach
                    @endisset

                </select>
            </div>

            <div class="col">
                <label for="inputName" class="control-label">دولة الاقامة</label>
                <select name="countrie_residence_id" class="form-control SlectBox"
                >
                    @isset($countrieresidence)
                        @foreach($countrieresidence as $item)
                            <option @if($PersonalSponsor->countrie_residence_id = $item->id) selected @endif value="{{$item->id}}"> {{$item->name}}</option>
                        @endforeach
                    @endisset

                </select>
            </div>


        </div>
        <div class="row">
            <div class="col"><br>
                <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4">تحديث</button>

            </div>

        </div>
    </form>
    <div class="row">
        <button value="{{$PersonalSponsor->id}}" class="deleted btn btn-danger font-weight-bold text-uppercase px-9 py-4" >حذف الكفيل</button>

    </div>
</div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js?v=7.0.4')}}"></script>

<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('assets/js/pages/custom/wizard/wizard-3.js?v=7.0.4')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>

    $(document).ready(function () {

        $("#kt_form").validate({
            rules: {

                id_type: {
                    required: true,

                },
                fname: {
                    required: true,
                    maxlength: 20,
                },mname: {
                    required: true,
                    maxlength: 20,
                },gname: {
                    maxlength: 20,
                },lname: {
                    required: true,
                    maxlength: 20,
                },
                governorate_id: {
                    required: true,

                },
                city_id: {
                    required: true,
                },
                district_id: {
                    required: true,
                },
                nationalitie_id: {
                    required: true,
                },
                countrie_residence_id: {
                    required: true,
                },
                phone: {
                    required: true,
                    digits: true,
                    rangelength: [7, 10],

                }, address: {
                    required: true,
                    rangelength: [15, 70],

                },
                email: {
                    required: true,
                    email: true
                },

                telii_phone: {
                    digits: true,
                    rangelength: [7, 9],
                }
            },
            messages: {
                id_type: {
                    required: "يرجى ادخال نوع رقم التعريف",

                },
                fname: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 20 حرف"
                },
                mname: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 20 حرف"
                },
                lname: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 20 حرف"
                }, gname: {

                    maxlength: "الاسم اقل من 20 حرف"
                },
                governorate_id: {
                    required: "يرجى اختيار المحافظة",
                },
                city_id: {
                    required: "يرجى اختيار المدينة",
                },
                district_id: {
                    required: "يرجى اختيار الحي",
                },
                nationalitie_id: {
                    required: "يرجى اختيار الجنسية",
                },
                countrie_residence_id: {
                    required: "يرجى اختيار دولة الاقامة",
                },
                phone: {
                    required: "يرجى رقم الجوال",
                    digits: "يجب ادخال رقم جوال صالح",
                    rangelength: "يرجى التاكد من صيغة رقم الجوال",
                },address: {
                    required: "يرجى العنوان",
                    rangelength: "يرجى ادخال عنوان لايقل عن 15 حرف ولا يزيد عن 70",
                },
                email: {
                    required: "يرجى ادخال الايميل",
                    email: "صيغة الايميل غير صحيحة",
                },

                telli_phone: {
                    digits: "يجب ادخال رقم تليفون صالح",
                    rangelength: "يرجى التاكد من صيغة رقم التليفون",
                }
            },

            submitHandler: function(form) {

                var formData = new FormData($('.update_sponsor')[0]);
                var id = $('#id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    enctype: 'multipart/form-data',
                    url: "/sponsors/updatePersonal/"+id,
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 200) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        }
                        else if(data.status == 400){

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'تم التحديث بنجاح',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#display_error').hide();

                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'فشلت عملية التحديث  ',
                                showConfirmButton: false,
                                timer: 1500
                            })

                        }

                    }
                });
            }
        });

            $(document).on('click', '.deleted', function (e) {
                e.preventDefault();
                var id =  $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/sponsors/personalsponsor/" + id,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 400) {
                            window.location.href = '/dashboard';

                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })

                        }
                    }
                });
            });


      });

</script>
</body>
</html>
