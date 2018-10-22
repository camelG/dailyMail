@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-info">
                <div class="card-header">{{ $title }}</div>

            <form action="/home/send" method="POST">
                <div class="card-body" style="padding:25px;">

                        <div class="row">
                        <textarea class="col-sm-12 form-control" name="text" rows="5" style="overflow:auto;white-space:pre;">
磯村社長　中田さん

お疲れ様です。本日の作業日報、報告いたします。

                        </textarea>
                        </div>

                        <div id="rowrows">
                        @section('timeline')
                        <div class="row" style="margin-top: 20px;">
                            <div class="form-group">
                                <select name="jobstart[]" class="form-control" id="select1">
                                @for( $i = 10; $i < 19; $i++ )
                                <option value="{{ $i }}:00">{{ $i }}:00</option>
                                @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="jobend[]" class="form-control" id="select2">
                                @for( $i = 11; $i < 21; $i++ )
                                <option value="{{ $i }}:00">{{ $i }}:00</option>
                                @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="staticEmail2" class="sr-only">Email</label>
                                <input type="text" name="job[]" class="form-control" id="staticEmail2">
                            </div>
                        </div>
                        <div class="row">
                            <textarea class="col-sm-12 form-control" name="jobinfo[]" rows="3" style="overflow:auto;white-space:pre;"></textarea>
                        </div>
                        @show
                        </div>
                        <div class="row">
                            <div class="" style="margin: 10px 0;">
                                <button type="button" class="addOneRow btn btn-danger rounded-circle p-0" style="margin-left: 10px;width:2.5rem;height:2.5rem;">＋</button>
                            </div>
                        </div>
                </div>

                        <div class="card-footer bg-transparent border-0" style="padding: 10px;">
                        <textarea class="col-sm-12 form-control" name="hope" rows="5" style="overflow:auto;white-space:pre;">
【感想・希望】
　なし
                        </textarea>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" style="margin-top: 10px;" class="col-sm-12 btn btn-primary right"><h2>送信</h2></button>
                        </div>
            </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$('.addOneRow').click(function(){
    $('#rowrows').append(`@yield("timeline")`)
});
</script>
@endsection
