@extends('layouts.mydashboard')
@section('top-content')
{{-- ជំរាបសួរ {{auth()->user()->name}} --}}
    <div style="background: #b145e9; color:#fff;">ទំព័រ ព័ត៌មានផ្ទាល់ខ្លួន</div>
@endsection
@section('content')

    <div class="container">
        <div class="row m-3">
            <div class="col-12 main m-0">
                <a href="{{route('dashboard')}}" class="btn btn-lg mb-2 text-white main" style="background: #0fc70f; font-size:16px; margin-bottom:0px !important;">បញ្ជី ឈ្មោះសមាជិក</a>
                <button disabled class="btn-details btn btn-success btn btn-lg ms-3 mb-2 text-white" style="border-color: #fff !important; font-size:16px; margin-bottom:0px !important;">ព័ត៌មាន ផ្ទាល់ខ្លួន</button>
            </div>
        </div>
        <hr class="m-0">
        <div class="row profile">
@include('alerts.index')
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 main">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img src="{{url('assets/images')}}/{{auth()->user()->photo}}" class="img-responsive" alt="">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                ឈ្មោ ៖ {{auth()->user()->name}}
                            </div>
                            <div class="profile-usertitle-job">
                                ភេទ ៖ <?=  auth()->user()->gender == 0 ? "ប្រុស" : "ស្រី" ?>
                            </div>
                        </div>
                        <div class="profile-userbuttons">
                            <a href="{{route('user.edit',auth()->user()->id)}}"  class="btn btn-warning btn-sm">កែសម្រួល</a>
                            <button type="button" class="btn btn-primary btn-sm btn-status" disabled style="border-color: #fff !important;">
                                គណនី ដំណើរការ
                            </button>               
                        </div>
                    </div>
                </div>
                    <div class="col-lg-6 my-3 p-0">
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="col-lg-12 col-md-12 col-12 px-3 pt-3 text-center">
                                    ព័ត៌មានលំអិត
                                <hr>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">ឈ្មោះ</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">{{auth()->user()->name}}</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">ភេទ</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;"><?=  auth()->user()->gender == 0 ? "ប្រុស" : "ស្រី" ?></p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">អ៉ីម៉ែល</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">{{auth()->user()->email}}</p>                                    
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">កាលបរិច្ឆេទបង្កើតគណនី</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">{{auth()->user()->created_at->format('d-m-Y h:i:s')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelector('#user').classList.add("active");
    </script>
@endsection

@section('style')
    <style>
        .btn-details,.btn-status{
            position: relative;
            background: none !important;
            cursor:default !important;
        }
        .btn-details::before,.btn-status::before{
            content: '';
            width: 2px;
            height: 100%;
            background: #b145e9;
            position: absolute;
            left: 0px;
            top: 0;
        }
        .btn-details::after,.btn-status::after{
            content: 'ព័ត៌មាន ផ្ទាល់ខ្លួន';
            width: 100%;
            height: 100%;
            display: flex;
            color: #000;
            justify-content: center;
            align-items: center;
            position: absolute;
            left: 0;
            top: 0;
        }
        .btn-status::after{
            content:  'គណនី ដំណើរការ';
        }





        .main{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
        }
        .emp-info{
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row;
        }

        .profile {
            margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }
        .profile-userpic{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile-userpic img {
            position: relative;
            float: none;
            margin: 0 auto;
            width: 100px;
            height: 100px;
            background-position: center;
            object-fit: cover;
            border: 0.5px solid  rgba(0, 0, 0, 0.7);
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }
        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }
        label{
            width: 50%;
            height: 100%;
        }
        #label{
            position: relative;
            display: block;
        }
        #label::before{
            content: '៖';
            position: absolute;
            width: 100%;
            height: 100%;
            left: 100%;
            top: 0%;
        }
    </style>
@endsection


