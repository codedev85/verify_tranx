@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                           <div>
                               <div> <span>Amount: </span> : {{$amount ?? 0}}</div>

                               <div> <span>Verification Count:{{$count ?? 0}} </span></div>
                               <div>
                                   <form action="{{url('verify')}}" method="POST">
                                       @csrf
                                       <input type="text" name="reference" class="verify">
                                       <button class="btn btn-success">Verify</button>
                                   </form>
                               </div>
                           </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
