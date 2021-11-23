@extends('layout')

@section('content')

<div class="container">
    <div class="container pt-5">
        <h2 class="fw-bold text-center">Get In Touch</h2>
        <div class="row">
            <div class="col-lg-6 pt-5">
                <form action="">
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Name</label>
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">

                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingPassword">Email</label>
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Password">

                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingPassword">Your Phone</label>
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Password">

                    </div>
                </form>
            </div>
            <div class="col-lg-6 pt-5">
                <form action="">
                    <div class="form-floating">
                        <label for="floatingTextarea">Your Comments</label>

                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 207px"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-5 mb-5">
                    <input type="button" class="btn btn-lg btn-primary" value="Send Message">
                </div>
            </div>
        </div>
    </div>


    @endsection