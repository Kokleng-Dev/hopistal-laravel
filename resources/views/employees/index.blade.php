@extends('layouts.mydashboard')
@section('top-content')
{{-- ជំរាបសួរ {{auth()->user()->name}} --}}
    <div style="background: #0fc70f; color:#fff;">បញ្ជីឈ្មោះសមាជិក</div>
@endsection
@section('content')
    @include('modals.import_excel')
    <div class="container mt-3">
        <div class="row">
            @include('alerts.index')
            
                <div class="col-12">
                    <a href="{{route('employee.add')}}" class="btn btn-lg mb-2 text-white" style="font-size:16px; background: #0fc70f">បញ្ចូលសមាជិកថ្មី</a>
                    <a href="{{route('employee.export')}}" class="btn btn-lg mb-2 text-white btn-secondary" style="font-size:16px;">Export Excel</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#import_excel_file" class="btn btn-lg mb-2 text-white btn-primary" style="font-size:16px;">Import Excel</button>
                </div>
        
            @foreach ($employees as $employee)
                <a href="{{route('employee.view',$employee->id)}}" class="col-12 col-md-6 col-lg-6 text-decoration-none">   
                    <div class="card mb-2">
                        <div class="card-body" style="cursor: pointer;">
                            <div class="row">
                                <div class="col-lg-10 col-md-10 col-sm-9 col-8 rounded-1 d-flex items-center px-0 ps-2">
                                    <div>
                                        <img src="{{url('assets/images')}}/{{$employee->photo}}" alt="" style="object-fit: cover;  width: 50px; height: 50px; border-radius:50%;">
                                    </div>
                                    <div class="ps-3 py-1" style="width:calc(100% - 50px); height:50px;">
                                        <p style="margin:0px; color:#000; font-weight: bolder; font-size:14px">{{$employee->name_kh}}</p>
                                        <p style="margin:0px; color:#6c757d; font-size:10px"><small><i>{{$employee->position}}</i></small></p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-4 text-end" style="font-size: 12px; line-height:50px;"> <small  onMouseOver="this.style.color='#b145e9'"
                                    onMouseOut="this.style.color='#2196f3'" style="color:#2196f3">មើលបន្ថែម</small></div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelector('#home').classList.add("active");
    </script>
@endsection