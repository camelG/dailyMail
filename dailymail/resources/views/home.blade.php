@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    <form action="/home/send" method="POST">
                        <div class="row">
                            <div class="col-sm-12">    お疲れ様です。本日の作業日報、報告いたします。</div>
                        </div>
                        <div class="row">
                        <textarea class="col-sm-12 form-control" name="text" rows="10" style="overflow:auto;">
                        </textarea>
                        </div>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-sm-12">    以上</div>
                        </div>
                        
                        <div class="row" style="margin-bottom:20px;">
                            <div class="col-sm-12">    {{ $name }}</div>
                        </div>
                        <div class="row">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" style="margin-top: 10px;" class="col-sm-12 btn btn-primary right"><h2>送信</h2></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
