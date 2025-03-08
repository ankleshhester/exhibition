@extends('layouts.admin')
@section('content')

<section class="relative w-full h-full py-20 min-h-screen">
    <div class="container mx-auto px-0 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg  bg-white  border-0">
                    <div class="mb-0 px-0 py-4">
                        <div class="text-center mb-3">
                            <div class="flex flex-wrap content-center items-center justify-center">

                                <h6 class="text-blueGray-500 text-sm font-bold">
                                    Please enter your name email id to continue
                                </h6>
                            </div>

                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-4 pt-0">
                        <form method="POST" action="{{ route('visitor.login') }}">
                            @csrf
                            <div class="relative w-full mb-3 item-inline">

                                <input type="text" name="name" class="border-0 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('password') ? ' ring ring-red-300' : '' }}" placeholder="Enter your name">
                            </div>
                            <div class="relative w-full mb-3 item-inline">

                                <input type="text" name="company_name" class="border-0 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('password') ? ' ring ring-red-300' : '' }}" placeholder="Enter your company name">
                            </div>
                            <div class="relative w-full mb-3">

                                <input type="email" name="email" class="border-0 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('email') ? ' ring ring-red-300' : '' }}"placeholder="Enter your email">
                            </div>
                            <div class="relative w-full mb-3">

                                <input type="text" name="mobile" class="border-0 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('mobile') ? ' ring ring-red-300' : '' }}"placeholder="Enter your mobile">
                            </div>
                            <div class="text-center mt-6">
                                <button  class="bg-blueGray-100 text-blueGray-600 active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150" type="submit">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection

