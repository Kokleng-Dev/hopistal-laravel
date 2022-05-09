@extends('layouts.mydashboard')
@section('top-content')
    <div style="background: #b145e9; color:#fff;">ទំព័រ កែសម្រួល</div>
@endsection
@section('content')
    <div class="container">
        <div class="row m-3">
            <div class="col-12 main m-0 mb-3">
                <a href="{{route('user')}}" class="btn btn-danger btn-lg mb-2 text-white main" style="font-size:16px; margin-bottom:0px !important;">ត្រលប់ក្រោយ</a>
                <button disabled class="btn btn-success btn btn-lg ms-3 mb-2 text-white btn-details fw-bolder" style="font-size:16px; margin-bottom:0px !important; border-color: #fff !important;">កែសម្រួល</button>
            </div>
            <hr>
        </div>
        <form action="{{route('user.update',$info->id)}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="row p-3">
                @include('alerts.index')
                <div class="col-lg-2 col-md-6 mb-2">
                    <div style="width: 100%; height:100%; border-radius:50%; display: flex; justify-content:center; align-items:center;">
                        <img id="profile" style="width:100%; hieght:100%; border-radius:50%; background-position: center; border: 1px solid black;" 
                            src="{{url('assets/images')}}/{{$info->photo}}{{old('photo')}}" alt="photo">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-3">
                    <label for="name" class="form-label">ឈ្មោះ</label>
                    <input  id="name" type="text" class="form-control mb-2" name="name" placeholder="ឈ្មោះរបស់អ្នក" value="@php echo old('name') ? old('name') : $info->name @endphp">
                    <label for="photo" class="form-label">រូបថត <span class="text-danger">*</span></label>
                    <input id="photo" type="file" class="form-control" name="photo" accept="image/*" onchange="preview(event)" >
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="gender" class="form-label">ភេទ<span class="text-danger">*</span></label>
                    <select id="gender" class="form-select mb-2" name="gender">
                        <option value="0" <?= $info->gender == 0 ? "selected" : ""  ?>>ប្រុស</option>
                        <option value="1" <?= $info->gender == 1 ? "selected" : ""  ?>>ស្រី</option>
                    </select>  
                    <label for="email" class="form-label">អ៉ីម៉ែល<span class="text-danger">*</span></label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="អ៉ីម៉ែល" value="{{$info->email}} {{old('photo')}}">   
                    @error('email')
                        <span class="text-danger" style="font-size: 12px;">ទាមទារតម្រូវឲ្យបញ្ចូលជា អ៉ីម៉ែល​ *</span>
                    @enderror
                </div>
            </div>
            <div class="row p-3">
                <div class="col-12 text-end">
                    <hr>
                    <button type="submit" class="btn btn-lg btn-primary">កែប្រែ</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        document.querySelector('#user').classList.add("active");
        function preview(evt){
            let profile = document.querySelector('#profile');
            profile.src = URL.createObjectURL(evt.target.files[0]);
        }
        function previewToDefult(){
            let profile = document.querySelector('#profile');
            profile.src = "{{url('assets/images/no_profile.jpeg')}}";
        }
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
            background: #b145e9;
            position: absolute;
            left: 0px;
            top: 0;
        }
        .btn-details::after{
            content: 'កែសម្រួល';
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
    </style>
@endsection