@extends('layouts.mydashboard')
@section('top-content')
    <div style="background: #2196f3; color:#fff;">បញ្ចូលសមាជិកថ្មី</div>
@endsection
@section('content')
    <div class="container mt-3">
        <form action="{{route('employee.insert')}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="card" style="">
                <div class="card-body">
                    <div class="row">
                        @include('alerts.index')
                        <div class="col-lg-2 col-md-6 mb-2">
                            <div style="width: 100%; height:100%; border-radius:50%; display: flex; justify-content:center; align-items:center;">
                                <img id="profile" style="width:100%; hieght:100%; border-radius:50%; background-position: center; border: 1px solid black;" 
                                    src="{{url('assets/images/no_profile.jpeg')}}" alt="photo">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input  id="title" type="text" class="form-control mb-2" name="title" placeholder="Your title here" value="{{ old('title') }}">
                            <label for="photo" class="form-label">រូបថត <span class="text-danger">*</span></label>
                            <input id="photo" type="file" class="form-control" name="photo" accept="image/*" onchange="preview(event)" value="{{ old('photo') }}" >
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <label for="name_kh" class="form-label">គោត្តនាម​ នាម (ខ្មែរ) <span class="text-danger">*</span></label>
                            <input id="name_kh" type="text" class="form-control mb-2" name="name_kh" placeholder="ឈ្មោះជាភាសាខ្មែរ" value="{{ old('name_kh') }}">    
                            <label for="name_en" class="form-label">គោត្តនាម​ នាម (ឡាតាំង) <span class="text-danger">*</span></label>
                            <input id="name_en" type="text" class="form-control" name="name_en" placeholder="ឈ្មោះជាភាសាឡាតាំង" value="{{ old('name_en') }}">   
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <label for="phone1" class="form-label">លេខទូរស័ព្ទខ្សែរទី១ <span class="text-danger">*</span></label>
                            <input id="phone1" type="text" class="form-control" name="phone1" placeholder="ខ្សែរទី១" value="{{ old('phone1') }}">
                            @error('phone1')
                                <span class="text-danger" style="font-size: 12px;">លេខទូរស័ព្ទខ្សែរទី១ តម្រូវឲ្យបញ្ចូលជាលេខ *</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <label for="phone2" class="form-label">លេខទូរស័ព្ទខ្សែរ​ទី២</label>
                            <input id="phone2" type="text" class="form-control" name="phone2" placeholder="ខ្សែរទី២" value="{{ old('phone2') }}">
                            @error('phone2')
                                <span class="text-danger" style="font-size: 12px;">លេខទូរស័ព្ទខ្សែរទី២ តម្រូវឲ្យបញ្ចូលជាលេខ *</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <label for="department" class="form-label">អង្គភាព</label>
                            <input id="department" type="text" class="form-control" name="department" placeholder="បញ្ចូលអង្គភាព" value="{{ old('department') }}">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <label for="position" class="form-label">តំណែង/តួនាទី</label>
                            <input id="position" type="text" class="form-control" name="position" placeholder="បញ្ចូល តំណែង/តួនាទី" value="{{ old('position') }}">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <label for="part_of" class="form-label">ផ្នែក</label>
                            <input id="part_of" type="text" class="form-control" name="part_of" placeholder="បញ្ចូលផ្នែក" value="{{ old('part_of') }}">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <label for="member" class="form-label">សមាជិក</label>
                            <input id="member" type="text" class="form-control" name="member" placeholder="បញ្ចូលសមាជិក" value="{{ old('member') }}">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <label for="other" class="form-label">ផ្សេងៗ <span class="text-danger">*</span></label>
                            <input id="other" type="text" class="form-control" name="other" placeholder="បញ្ចូលផ្សេងៗ" value="{{ old('other') }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 text-end">
                            <input type="reset" class="btn btn-danger" value="កំណត់ឡើងវិញ" onclick="previewToDefult()" />
                            <button type="submit" class="btn btn-primary">បញ្ចូល</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        document.querySelector('#add').classList.add("active");
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