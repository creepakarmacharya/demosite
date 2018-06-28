@extends('layouts.app')

@section('content')
  <div class="container">

    <form method="POST" action="/page/captcha">
{{ csrf_field() }}
      <div class="clearfix">
        <div class="pull-left">
          <div class="lead">
            <strong>Use Captcha</strong>
          </div>
        </div>
        <div class="clearfix">
                            <div>
                                <div>
                                    <label>
                                   {!! captcha_img() !!}  
                                   <br />
                                   <input type="text" name="captcha">
                                    </label>
                                </div>
                                <button type="submit" name="check">Check</button>
                            </div>
                        </div>

     
</div>
</form>

  </div>
@endsection
