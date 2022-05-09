@extends('layouts.mydashboard')
@section('top-content')
{{-- ជំរាបសួរ {{auth()->user()->name}} --}}
    <div style="background: #ffa117; color:#fff;">ទំព័រ ប្ដូរលេខសម្ងាត់</div>
@endsection
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('user.updatePassword',auth()->user()->id)}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                            ប្ដូរលេខសម្ងាត់
                            <hr>
                        </div>
@include('alerts.index')
                        <div class="col-lg-4 col-md-12 col-12">
                            <label for="username" class="form-label">គណនី​អ្នកប្រើប្រាស់</label>
                            <input type="text" class="form-control" value="{{auth()->user()->username}}" disabled>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <label for="password" class="form-label">លេខសម្ងាត់​</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="បញ្ចូលលេខសម្ងាត់">
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <label for="password_confirmation" class="form-label">បញ្ជាក់សម្ងាត់</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="បញ្ជាក់លេខសម្ងាត់">
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-check pt-3">
                                <input class="form-check-input" type="checkbox" id="flexCheckChecked" onclick="myFunction()">
                                <label class="form-check-label" for="flexCheckChecked">
                                មើលលេខសម្ងាត់
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                            <div class="col-lg-12 col-md-12 col-12 text-end">
                                <button type="reset" class="btn btn-danger">កំណត់ឡើងវិញ</button>
                                <button type="submit" class="btn btn-primary">យល់ព្រម</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("password_confirmation")
            if (x.type === "password" && y.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
        document.getElementById('login_P').classList.add("active");
    </script>
@endsection
