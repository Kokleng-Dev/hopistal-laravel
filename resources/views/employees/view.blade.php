@extends('layouts.mydashboard')
@section('top-content')
{{-- ជំរាបសួរ {{auth()->user()->name}} --}}
    <div style="background: #0fc70f; color:#fff;">ទំព័រ ព័ត៌មានសមាជិក</div>
@endsection
@section('content')
@include('modals.delete_modal')
    <div class="container">
        <div class="row m-3">
            <div class="col-12 main m-0">
                <a href="{{route('dashboard')}}" class="btn btn-danger btn-lg mb-2 text-white main" style="font-size:16px; margin-bottom:0px !important;">ត្រឡប់ទៅ ទំព័រដើម</a>
                <button disabled class="btn-details btn btn-success btn btn-lg ms-3 mb-2 text-white" style="border-color: #fff !important; font-size:16px; margin-bottom:0px !important;">ព័ត៌មាន សមាជិក</button>
            </div>
        </div>
        <hr class="m-0">
        <div class="row profile">
            <div class="row m-0 p-1">
                <div class="col-lg-5 col-md-12 main">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img src="{{url('assets/images')}}/{{$info->photo}}" class="img-responsive" alt="">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                ឈ្មោះ​ ៖​ @php echo $info->name_kh ? $info->name_kh : "គ្មានទិន្នន័យ"  @endphp
                            </div>
                            <div class="profile-usertitle-job">
                                តំណែង ៖ @php echo $info->position ? $info->position : "គ្មានទិន្នន័យ"  @endphp
                            </div>
                        </div>
                        <div class="profile-userbuttons">
                            <a href="{{route('employee.edit',$info->id)}}"  class="btn btn-warning btn-sm">កែសម្រួល</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                លុបទិន្នន័យ
                            </button>
                            {{-- <a href="{{route('employee.delete',$info->id)}}"  class="btn btn-danger btn-sm">លុបទិន្នន័យ</a> --}}
                        </div>
                    </div>
                </div>
                    <div class="col-lg-7 my-3 p-0">
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="col-lg-12 col-md-12 col-12 px-3 pt-3 text-center">
                                    ព័ត៌មានលំអិត
                                <hr>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">Title</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->title ? $info->title : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">ឈ្មោះជាភាសាខ្មែរ</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->name_kh ? $info->name_kh : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">ឈ្មោះជាភាសាឡាតាំង</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->name_en ? $info->name_en : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">លេខទូរស័ព្ទខ្សែរទី១</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->phone1 ? $info->phone1 : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">លេខទូរស័ព្ទខ្សែរ​ទី២</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->phone2 ? $info->phone2 : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">អង្គភាព</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->department ? $info->department : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">មុខងារ</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->position ? $info->position : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">ផ្នែក</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->part_of ? $info->part_of : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">សមាជិក</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->member ? $info->member : "គ្មានទិន្នន័យ"  @endphp</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 p-3 emp-info">
                                    <label id="label">ផ្សេងៗ</label>
                                    <p class="m-0" style="font-size: 12px; font-style:italic;">@php echo $info->other ? $info->other : "គ្មានទិន្នន័យ"  @endphp</p>
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
        document.querySelector('#home').classList.add("active");
    </script>
@endsection

@section('style')
    <style>
        .btn-details{
            position: relative;
            background: none !important;
            cursor:default !important;
        }
        .btn-details::before{
            content: '';
            width: 2px;
            height: 100%;
            background: #0fc70f;
            position: absolute;
            left: 0px;
            top: 0;
        }
        .btn-details::after{
            content: 'ព័ត៌មាន សមាជិក';
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