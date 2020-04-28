@extends('layouts.master')

@section('content')
    <!-- Offers Form Section-->
    <div class="flex-center position-ref full-height col-6">
        <div class="content">
            <div class="title m-b-md">
                {{__('messages.Add your offer')}}

            </div>
            '
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}

                </div>
            @endif

            <br>
            <form method="POST" action="{{route('offers.store')}}" enctype="multipart/form-data">
                @csrf
                {{-- <input name="_token" value="{{csrf_token()}}"> --}}


                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer photoLabel')}}</label>
                    <input type="file" class="form-control" name="photo">
                    @error('photo')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name ar')}}</label>
                    <input type="text" class="form-control" name="name_ar" placeholder="{{__('messages.Offer Name')}}">
                    @error('name_ar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name en')}}</label>
                    <input type="text" class="form-control" name="name_en" placeholder="{{__('messages.Offer Name')}}">
                    @error('name_en')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer Price')}}</label>
                    <input type="text" class="form-control" name="price" placeholder="{{__('messages.Offer Price')}}">
                    @error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer details ar')}}</label>
                    <input type="text" class="form-control" name="details_ar"
                           placeholder="{{__('messages.Offer details')}}">
                    @error('details_ar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer details en')}}</label>
                    <input type="text" class="form-control" name="details_en"
                           placeholder="{{__('messages.Offer details')}}">
                    @error('details_en')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
            </form>


        </div>
    </div>
@stop
