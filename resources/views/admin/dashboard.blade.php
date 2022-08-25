@extends('../layouts/backend/master')
@section('title')SHM Store | Admin dashboard @endsection
<link rel="stylesheet" href="{{ asset('backend/css/dashboard.css') }}">
@section('content')
    <div class="row-up clearfix">
        <div class="col-up">
            <div class="card-up">
                <div class="card-body-up clearfix">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/>
                        </svg>
                    </div>
                    <div class="txt">
                        <h4 class="cmn-h4"><span class="counter-up">{{ $dataList['users'] }}</span></h4>
                        <p>Total Users</p>
                    </div>                   
                </div>
            </div>
        </div>
        <div class="col-up">
            <div class="card-up">
                <div class="card-body-up clearfix">
                    <div class="icon">
                        <svg class="order-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path d="M0 24C0 10.75 10.75 0 24 0H96C107.5 0 117.4 8.19 119.6 19.51L121.1 32H312V134.1L288.1 111C279.6 101.7 264.4 101.7 255 111C245.7 120.4 245.7 135.6 255 144.1L319 208.1C328.4 218.3 343.6 218.3 352.1 208.1L416.1 144.1C426.3 135.6 426.3 120.4 416.1 111C407.6 101.7 392.4 101.7 383 111L360 134.1V32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24V24zM224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464zM416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464z"/>
                        </svg>
                    </div>
                    <div class="txt">
                        <h4 class="cmn-h4"><span class="counter-up">{{ $dataList['orders'] }}</span></h4>
                        <p>Total Orders</p>
                    </div>                   
                </div>
            </div>
        </div>
        <div class="col-up">
            <div class="card-up">
                <div class="card-body-up clearfix">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M50.73 58.53C58.86 42.27 75.48 32 93.67 32H208V160H0L50.73 58.53zM240 160V32H354.3C372.5 32 389.1 42.27 397.3 58.53L448 160H240zM448 416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V192H448V416z"/>
                        </svg>
                    </div>
                    <div class="txt">
                        <h4 class="cmn-h4"><span class="counter-up">{{ $dataList['products'] }}</span></h4>
                        <p>Total Products</p>
                    </div>                   
                </div>
            </div>
        </div>
        <div class="col-up">
            <div class="card-up">
                <div class="card-body-up clearfix">
                    <div class="icon">
                        <svg class="cgy-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M88 48C101.3 48 112 58.75 112 72V120C112 133.3 101.3 144 88 144H40C26.75 144 16 133.3 16 120V72C16 58.75 26.75 48 40 48H88zM480 64C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H192C174.3 128 160 113.7 160 96C160 78.33 174.3 64 192 64H480zM480 224C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H192C174.3 288 160 273.7 160 256C160 238.3 174.3 224 192 224H480zM480 384C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384H480zM16 232C16 218.7 26.75 208 40 208H88C101.3 208 112 218.7 112 232V280C112 293.3 101.3 304 88 304H40C26.75 304 16 293.3 16 280V232zM88 368C101.3 368 112 378.7 112 392V440C112 453.3 101.3 464 88 464H40C26.75 464 16 453.3 16 440V392C16 378.7 26.75 368 40 368H88z"/>
                        </svg>
                    </div>
                    <div class="txt">
                        <h4 class="cmn-h4"><span class="counter-up">{{ $dataList['categories'] }}</span></h4>
                        <p>Total Categories</p>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    <div class="graph">
        @include('bar')
    </div>
    <div class="footer"></div>
@endsection






