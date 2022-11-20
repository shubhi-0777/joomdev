@extends('layout')
  
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email Templates') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                   Welcome
                </div>

                <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary" >
                              <a  class="nav-link" style="color: #FFF"; href="{{ route('add.template') }}">Add Template</a>  
                              </button>
                </div>


                
                        <div class="py-12">

                        <div class="container">

                        <div class="row">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">Template Id</th>
                                    
                                    <th scope="col">Email Template</th>
                                    <th scope="col">Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($email_templates as $template)



                                    <tr>
                                   
                                    <td>{{ $template->id }}</td>
                                    <td>{!! $template->template !!}</td>
                                    <td>{{ Carbon\Carbon::parse($template->created_at)->diffforHUmans() }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>



                        </div>
                        </div>


                        </div>


            </div>
        </div>
    </div>
</div>
@endsection