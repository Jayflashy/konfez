
@extends('install.layout')
@section('title')Agreement @endsection

@section('content')

<div class="card">    
    <div class="card-header">
        <h4 class="fw-bold mb-0">Installation Agreement</h4>
    </div>

    <div class="card-body"> 
        <h3 class="mt-auto strong">Installation</h3>
        <p>The installation process of the product is straight forward, and the steps that you need to take in order to install it are mentioned in the documentation of the product. It is your responsibility to follow the guide and properly install the product as mentioned.</p>
        <p>If you need installation support, please read the Installation Services section in the documentation, and don't hesitate to <a target="_blank" href="https://codecanyon.net/user/jadesdeveloper">Contact Me</a>.</p>
        <hr>
        <h3 class="mt-3 strong">Usage of the License</h3>
        <p>Depending on what license you got, you are entitled to use it as written on Envato's Codecanyon license details.</p>
        <p class="fw-bold">Regular Licenses are NOT allowed to use the product as a business</p>
        
        <h6>NOTE: You can only use this script for one (1) domain only, additional license purchase required for each additional domain</h6>
        <br>
        <h5>Unlimited Licenses are available.</h5>
        <p>Any wrongdoings regarding your license will lead to it being deleted and your access being restricted.</p>
        <hr>

        <h3 class="mt-3 strong">Customer Support</h3>
        
        <p>Support does not mean any of the following:</p>
        <ul>
            <li>Modification help</li>
            <li>Customization help</li>
            <li>Providing help for problems created while altering/modifying the product.</li>
        </ul>
        <p>When you start to modify and customize the product, you are taking full responsibility for your own changes.</p>
        <hr>
        <form action="{{route('install.requirement')}}" method="get">
            <div class="form-group">
                <input type="checkbox" id="agree" name="agree" required> I agree to the terms of use and policy of Konfez
            </div>

            <div class="text-center">
                <button  class="btn btn-primary" type="submit"> Next Step</button>
            </div>
        </form>

    </div>
</div>
@endsection