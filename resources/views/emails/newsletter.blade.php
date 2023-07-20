<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['subject']}}</title>

    <link href="{{ static_asset('css/vendors.css') }}" rel="stylesheet">

    <style type="text/css">
    body{
      margin: 0;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.6;
      color: #212529;
      text-align: left;
      background-color: #ebf6de;
      /*background-color: #e9ecef;*/

    }
    .mail-title {
      background: #cabed3;
      border-bottom: 1px solid #e5e9f2;
      padding: 10px 20px;
      border-radius: .25rem;
      text-align: center;
      margin-top: 1rem;
      margin-bottom: 1rem;
    }
    .mail-title a {
        color: #080c10;
        font-size: 19px;
        font-weight: bold;
        text-decoration: none;
    }
    .footer {
      background: #cabed3;
      border-bottom: 1px solid #e5e9f2;
      padding: 20px 30px;
      border-radius: .25rem;
      text-align: center;
      margin-top: 1rem;
      margin-bottom: 1rem;

    }

    .footer p {
        color: #212529;
        font-size: 14px;
        text-align: center;
    }

    .content{
      font-size: 1.2rem;
      font-weight: 400;
      line-height: 1.6;
    }

    </style>
</head>
<body>
    <div class="mail-title">
        <a href="{{route('index')}}"> {{get_setting('title')}}</a>
    </div>

    <!-- <h2>Hello!</h2> -->

    <p class="content">{!! $data['content'] !!}</p>

    <hr class="mb-0">
    
    <p style="margin-botton: 0px;">@lang('Best Regards'),</p>
    <p>{{get_setting('title')}}</p>

    <!-- Footer -->
    <div class="footer py-4">
       <p> © {{ date('Y') }} {{get_setting('title')}}. @lang('All rights reserved'). </p>
    </div>
</body>
</html>


