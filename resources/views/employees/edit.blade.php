@extends('layouts.mydashboard')
@section('top-content')
    <div style="background: #0fc70f; color:#fff;">ទំព័រ កែសម្រួល</div>
@endsection
@section('content')
    <div class="container">
        <div class="row m-3">
            <div class="col-12 main m-0 mb-3">
                <a href="{{route('employee.view',$info->id)}}" class="btn btn-danger btn-lg mb-2 text-white main" style="font-size:16px; margin-bottom:0px !important;">ត្រឡប់ទៅ ទំព័រដើម</a>
                <button disabled class="btn btn-success btn btn-lg ms-3 mb-2 text-white btn-details fw-bolder" style="font-size:16px; margin-bottom:0px !important; border-color: #fff !important;">កែសម្រួល</button>
            </div>
            <hr>
        </div>
        <form action="{{route('employee.update',$info->id)}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
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
                    <label for="title" class="form-label">Title</label>
                    <input  id="title" type="text" class="form-control mb-2" name="title" placeholder="Your title here" value="@php echo old('title') ? old('title') : $info->title @endphp">
                    <label for="photo" class="form-label">រូបថត <span class="text-danger">*</span></label>
                    <input id="photo" type="file" class="form-control" name="photo" accept="image/*" onchange="preview(event)" >
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="name_kh" class="form-label">គោត្តនាម​ នាម (ខ្មែរ) <span class="text-danger">*</span></label>
                    <input id="name_kh" type="text" class="form-control mb-2" name="name_kh" placeholder="ឈ្មោះជាភាសាខ្មែរ" value="{{$info->name_kh}} {{old('name_kh')}}">    
                    <label for="name_en" class="form-label">គោត្តនាម​ នាម (ឡាតាំង) <span class="text-danger">*</span></label>
                    <input id="name_en" type="text" class="form-control" name="name_en" placeholder="ឈ្មោះជាភាសាឡាតាំង" value="{{$info->name_en}} {{old('name_en')}}">   
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="phone1" class="form-label">លេខទូរស័ព្ទខ្សែរទី១ <span class="text-danger">*</span></label>
                    <input id="phone1" type="text" class="form-control" name="phone1" placeholder="ខ្សែរទី១" value="{{$info->phone1}} {{old('phone1')}}">
                    @error('phone1')
                        <span class="text-danger" style="font-size: 12px;">លេខទូរស័ព្ទខ្សែរទី១ តម្រូវឲ្យបញ្ចូលជាលេខ *</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="phone2" class="form-label">លេខទូរស័ព្ទខ្សែរ​ទី២</label>
                    <input id="phone2" type="text" class="form-control" name="phone2" placeholder="ខ្សែរទី២" value="{{$info->phone2}} {{old('phone2')}}">
                    @error('phone2')
                        <span class="text-danger" style="font-size: 12px;">លេខទូរស័ព្ទខ្សែរទី១ តម្រូវឲ្យបញ្ចូលជាលេខ *</span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="department" class="form-label">អង្គភាព</label>
                    <input id="department" type="text" class="form-control" name="department" placeholder="បញ្ចូលអង្គភាព" value="{{$info->department}} {{old('department')}}">
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="position" class="form-label">តំណែង/តួនាទី</label>
                    <input id="position" type="text" class="form-control" name="position" placeholder="បញ្ចូល តំណែង/តួនាទី" value="{{$info->position}} {{old('position')}}">
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="part_of" class="form-label">ផ្នែក</label>
                    <input id="part_of" type="text" class="form-control" name="part_of" placeholder="បញ្ចូលផ្នែក" value="{{$info->part_of}} {{old('part_of')}}">
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="member" class="form-label">សមាជិក</label>
                    <input id="member" type="text" class="form-control" name="member" placeholder="បញ្ចូលសមាជិក" value="{{$info->member}} {{old('member')}}">
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="other" class="form-label">ផ្សេងៗ <span class="text-danger">*</span></label>
                    <input id="other" type="text" class="form-control" name="other" placeholder="បញ្ចូលផ្សេងៗ" value="{{$info->other}} {{old('other')}}">
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
        document.querySelector('#home').classList.add("active");
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
            background: #0fc70f;
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