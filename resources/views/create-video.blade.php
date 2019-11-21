@extends('layouts.partials.header')
@section('content')
<div class="wrapper">
    <input type="hidden" value="{{ Auth::id() }}" id="custId">
    <input type="hidden" value="{{ request()->route('id') }}" id="custOrderId">
    <section>
      <img class="hero-bg-top" src="img/bg-top-left.svg" alt="top left icon" aria-hidden="true">
      <div class="container m-50 mtop-70">
          <div class="row">
            <div class="col-lg-1 col-md-1 mb-md-0 mb-4 title">
              <div class="float-left create-pro">
                <a href="#" title="Gender: Who is the audience you are targeting"><h1>?</h1></a>
            </div>
        </div> 
        <div class="col-lg-11 col-md-1 mb-md-0 mb-4 title create-video-small">
            <h3 class="text-center"><b>Create Video</b></h3>
        </div>
    </div>
</div> 
</section>
<section>
    <div class="container m-50 mb-4">
        <div class="row">
           <div class="col-12 " style="font-family:roboto">
            <h4 style="text-transform:capitalize!important;margin-bottom:2rem"><b>Select Video Layout</b></h4>
        </div>
        <div class="col-lg-12 col-md-1 mb-md-0 mb-4 title text-center dis-inl">
            @foreach($master as $data)        
            <div class="col-md-2 text-center removeClass toGetImgId" id="orderDetails_{{ $data->id }}">
                <a href="javascript:void(0);"> 
                    @if(!empty($selectdOrder->image_id))
                    @if($data->id == $selectdOrder->image_id)
                    <img src="{{ URL::asset( 'public/img/'.$data->img ) }}" id="img_{{ $data->id }}" class="create-page-img getImgPath selectedImage" 
                    style=" border : 1px solid #377DFF;background-color :#9EDFFF;">
                    @else
                    <img src="{{ URL::asset( 'public/img/'.$data->img ) }}" id="img_{{ $data->id }}" class="create-page-img getImgPath">
                    @endif
                    @endif
                    @if(empty($selectdOrder->image_id))
                    <img src="{{ URL::asset( 'public/img/'.$data->img ) }}" id="img_{{ $data->id }}" class="create-page-img getImgPath" height="150px" width="150px">
                    @endif
                </a>
                <div class="text-center mt-3">
                    <b id="imgSize">{{ $data->image_size }}</b>
                </div>
                <div class="text-center mt-3" style="font-size: 13px">
                    <b id="imgDesc">{{ $data->description }}</b>
                </div>
            </div>
            @endforeach      
        </div> 
    </div>
</div>
</section>
<section>
    <div class="container m-50" id='productLink'>
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left"  style="display:-webkit-inline-box;"><b>Product Link :</b></h4>           
                @if(!empty($selectdOrder->product_link))
                <input type="text" class="form-check-input filled-in inputProductLink" value="{{ $selectdOrder->product_link }}" style="position: relative;margin-left: 2rem;width:40%;">
                <label class="form-check-label"></label>            
                @else
                <input type="text" class="form-check-input filled-in inputProductLink" style="position: relative;margin-left: 2rem;width:40%;">
                <label class="form-check-label"></label>
                @endif
                
            </div> 
        </div> 
    </div>  
</section>
<section class="hero-bg-section">
  <img class="hero-bg-bottom" src="img/right-blue_morph.svg" alt="blue icon" aria-hidden="true">
  <div class="container m-50">
    <div class="row">
        <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
            <h4 class="text-left text-color"><b>Gender:</b></h4>
            <hr>
            @php $counter = 1; @endphp
            @foreach($gender as $data)
            <div class="mb-1 selectedGender" id="master_{{ $data->id }}">
                @if(!empty($selectdOrder->gender))
                @if( $selectdOrder->gender == $data->id )               
                <input type="checkbox" class="form-check-input filled-in gdr_{{ $data->id }}" checked="checked" id="">
                <label class="form-check-label selectType" for="">{{ $data->gender }}</label> 
                @else
                <input type="checkbox" class="form-check-input filled-in gdr_{{ $data->id }}" id="">
                <label class="form-check-label selectType" for="">{{ $data->gender }}</label>
                @endif 
                @endif 
                @if(empty($selectdOrder->gender))
                <input type="checkbox" class="form-check-input filled-in gdr_{{ $data->id }}" id="">
                <label class="form-check-label selectType" for="">{{ $data->gender }}</label>
                @endif 
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>
<section class="section-blue">
    <div class="container m-50 mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left text-color"><b>Music:</b></h4>
                <hr>
                @foreach($music as $musicData)
                <div class="mb-1 selectedMusic" id="musicType_{{ $musicData->id }}"> 
                    @if(!empty($selectdOrder->music))
                    @if( $selectdOrder->music == $musicData->id )
                    <input type="checkbox" class="form-check-input filled-in music_{{ $musicData->id }}" checked="checked" id="">
                    <label class="form-check-label selectMusicType" for="">{{ $musicData->music }}</label>
                    @else
                    <input type="checkbox" class="form-check-input filled-in music_{{ $musicData->id }}" id="">
                    <label class="form-check-label selectMusicType" for="">{{ $musicData->music }}</label>
                    @endif
                    @endif
                    @if(empty($selectdOrder->music))
                    <input type="checkbox" class="form-check-input filled-in music_{{ $musicData->id }}" id="">
                    <label class="form-check-label selectMusicType" for="">{{ $musicData->music }}</label>
                    @endif
                </div>
                @endforeach           
            </div>
        </div>
    </div>
</section>
<section class="section-blue">
    <div class="container" id="deliversDays">
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left text-color"><b>Select Delivery Days:</b></h4>
                <hr>
                 <!--Blue select-->
                 
                <select name="delivery_day" class="mdb-select md-form colorful-select dropdown-primary DelivrDat" style="display: block !important;width: 30%;">
                  <option selected>Select Delivery</option>  
                  <option value="1">1 Days</option>
                  <option value="2">2 Days</option>
                  <option value="3">3 Days</option>
                  <option value="4">4 Days</option>
                  <option value="5">5 Days</option>
                  <option value="6">6 Days</option>
                  <option value="7">7 Days</option>
                </select>
               
                <!--/Blue select-->      
            </div>
        </div>
    </div>
</section>

<section class="section-blue">
  <div class="container m-50 create-pro text-center">
    <div class="row">
        <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
            <a href="#"><button class="btn waves-effectss btn-blue waves-effect waves-light">BACK</button></a>
            <a href="javascript:void(0);">
                <button class="btn waves-effectss btn-blue waves-effect waves-light Next">NEXT</button>
            </a>
        </div>
    </div>
</div>
</section>
</div>
@endsection