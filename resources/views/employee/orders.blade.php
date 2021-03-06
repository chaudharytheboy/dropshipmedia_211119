@extends('layouts.elements.layout')
@section('content')
<style>
label {
    margin-left: 0px;}
.lbld {
    display: -webkit-inline-box;
    width: 26px;
    padding: 4px;
    background: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(38%,#ffffff), color-stop(100%,#cccccc));
    text-align: center;
    box-shadow: 0px 3px 5px #9a9a9a;
    border-radius: 4px;
    font-weight: bold;
    font-size: 15px;
    padding-left: 8px;
}

.lblh {
    display: -webkit-inline-box;
    width: 26px;
    padding: 4px;
    background: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(38%,#ffffff), color-stop(100%,#cccccc));
    text-align: center;
    box-shadow: 0px 3px 5px #9a9a9a;
    border-radius: 4px;
    font-weight: bold;
    font-size: 15px;
}

.lblm {
    display: -webkit-inline-box;
    width: 26px;
    padding: 4px;
    background: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(38%,#ffffff), color-stop(100%,#cccccc));
    text-align: center;
    box-shadow: 0px 3px 5px #9a9a9a;
    border-radius: 4px;
    font-weight: bold;
    font-size: 15px;
}

.lbls {
    display: -webkit-inline-box;
    width: 26px;
    padding: 4px;
    background: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(38%,#ffffff), color-stop(100%,#cccccc));
    text-align: center;
    box-shadow: 0px 3px 5px #9a9a9a;
    border-radius: 4px;
    font-weight: bold;
    font-size: 15px;
}

 .label-b{
    margin:0px 8px;
    font-size: 20px;
    font-weight: bolder;
    }
table thead{
    border-bottom: 1px solid #e2e1e1;
    background: whitesmoke;
    font-size: 16px;
    background: #3c8dbc5c;
    font-size: 14px;
    letter-spacing: 1px;
    }
    table, th, td {
      border: 1px solid whitesmoke;
      font-size: 14px;
    }
    
    .box-body{padding:10px;}
    table.dataTable {
        margin-top: 0px !important;
    }
    body {
    background: #fff;
    }
    .box {
    margin-bottom: 0px;
    box-shadow: none;
    }
    ul.pagination {
    margin-top: 4px;
    }
    .content-wrapper {
    overflow: auto;
    height: 607px !important;
    }
    table thead tr th{padding: 10px 10px;}  
    table tbody tr td{padding: 10px;}
    .box-body{padding:0px;}
</style>
@php $orderItems = array(); @endphp
@if(sizeof($customerOrders))
	@foreach($customerOrders as $ord)
		@if(!array_key_exists($ord->id,$orderItems))
			@php $orderItems[$ord->id] = array(); @endphp
		@endif
		@php $orderItems[$ord->id][] = array('ordid'=>$ord->id,'web_link'=>$ord->website_link,'prod_link'=>$ord->product_link);  @endphp
	@endforeach
@endif
@if(sizeof($items))
	@foreach($items as $item)
		@if(!array_key_exists($item->customer_order_id,$orderItems))
			@php $orderItems[$item->customer_order_id] = array(); @endphp
		@endif
		@php $orderItems[$item->customer_order_id][] = array('ordid'=>$item->customer_order_id,'web_link'=>$item->website_link,'prod_link'=>$item->product_link);   @endphp
	@endforeach
@endif

<script type='text/javascript'>
	var orders = '<?php echo json_encode($orderItems);?>';
</script>
<input type="hidden" value="{{ Auth::id() }}" id="logdInEmpId"/>
<div>
    @if(sizeof($customerOrders) <= 0)
        <h1 class="text-center">No Orders Available Now</h1>
    @endif
</div>   
<ol class="breadcrumb" style="padding: 15px 10px!important">
    <!--<li><a href="#"><i></i></a></li>
    <li></li>-->
    <marquee style="color: #3c8dbc; font-size: 20px;font-family: Book Antiqua" behavior="alternate" > <p style="margin: 0;">Employee Dashboard</p></marquee>
</ol>
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table-bordered table-striped" id="employetable"  style="table-layout:fixed;word-break:break-all;width:100%">
            <thead> 
            <tr>               

        <table id="example1" class="table" style="table-layout:fixed;word-break:break-all;width:100%">
            <thead>                
                <th style="text-align:center">OrderId</th>  
                <th>Title</th>   
                <th>Status</th>
                <th>Delivery Date</th>
                <th>CommentByCustomer</th>
                <th width="200px">Action</th>
                <th style="text-align:center">Video Status</th>
            </tr>
            </thead>
            <tbody>
                @foreach($customerOrders as $order)
                @if(!empty($order->id))      
                <tr id="orderId_{{ $order->id }}" class="">   
                <td style="display:none;"></td>                
                    <td style="text-align:center">{{ $order->id }}</td>
                    <td class="orderrDesc">
                         <a href="javascript:void(0);" id="{{ $order->id }}" class="btn btn-primary orderdetails"
                         style="text-decoration:underline;" >Brief Details
                         </a>
                    </td>
                    <td>
                        @if(!empty( $order->is_assigned ))
                              <p>Order has been taken  ...!!</p>
                        @else <p>Order add to assign ..!!</p>
                        @endif
                    </td>
                    <td>
                        @if(!empty($order->order_assign_time))
                        {{$order->order_assign_time}}
                                @endif

                    </td>
                       <td>
                          @if($order->CommentByCustomer)
                           <div>
                               {{$order->CommentByCustomer}}
                           </div>
                           @else
                           <div>
                               Not Applicable
                           </div>
                           @endif
                        </td>
                    <td class="assignBtn">
                         @if($order->change_thumb == 2  && $order->change_stop_scroll == 2)
                               <div style="margin-top:1rem;display: block;">
                                    <button type="button" class="btn btn-primary comment scrollall" id="{{ $order->id }}"
                                         style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px; overflow:auto;">Revise For Change Thumbnail And StopScroll
                                         style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px;overflow:auto;">Revise For Change Thumbnail And StopScroll
                                    </button>
                                </div>

                        @elseif($order->change_stop_scroll == 2)

                         <div style="margin-top:1rem;display: block;" class="HideRevise" id="revise_{{ $order->id }}">
                                    <button type="button" class="btn btn-primary comment scrollStop" id="{{ $order->id }}" style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px; overflow:auto;">Revise For Change StopScroll
                                    </button>
                                </div>
                                @elseif($order->change_stop_scroll == 2)
                                <div style="margin-top:1rem;display: block;">
                                    <button type="button" class="btn btn-primary comment scrollthumbnail" id="{{ $order->id }}" style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px;overflow:auto;">Revise For Change Thumbnail
                                    </button>
                                </div>

                             @endif
                             @if(empty($order->is_assigned ))
                                <div style="margin-top:1rem;display: block;" id="order-asign_{{ $order->id }}">
                                    <button type="button" class="btn btn-primary assignOrder" id="order_{{ $order->id }}"
                                         style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px;">Assign
                                    </button>
                                </div>
                             @endif
                             @if( $order->is_assigned == Auth::id()  && $order->order_counter == 1)
                            <p id="counter_{{ $order->id }}" uploadVideo="{{ $order->employe_video }}" role="singlewindow" class="counter" title="{{(strtotime($order->order_assign_time) * 1000)}}" style="margin-top: 1rem;"></p> 
                            @elseif($order->is_assigned == Auth::id()  && $order->order_counter == 0)
                            <div class="rejectOrProBtn">
                                <div style="display:flex;" id="orderSuccesReject_{{ $order->id }}">
                                <div style="margin-top:1rem;margin-right: 2rem">
                                    <button type="button" class="btn btn-danger rejectOrder"  id="reject_{{ $order->id }}" style="border-radius:5px;letter-spacing: 1px;">Reject</button>
                                </div>
                                <div style="margin-top:1rem;">
                                    <button type="button" class="btn btn-success proceedOrder" id="proceed_{{ $order->id }}" style="border-radius:5px;letter-spacing: 1px;">Proceed</button>
                                </div>
                                </div>  
                            </div>
                            @elseif(!empty($order->is_assigned) &&  $order->is_assigned != Auth::id() ) 
                            <div class="assignBtn"> 
                                <div style="margin-top:1rem;display: block;" id="order-asign_{{ $order->id }}">
                                    <button type="button" class="btn btn-primary assignOrder" id="order_{{ $order->id }}"
                                            style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px;" disabled>Assigned
                                    </button>
                                </div>
                            </div>                
                            @endif
                            <div style="display: none"  class="rejectOrProBtn">
                            <div style="display:flex;" id="orderSuccesReject_{{ $order->id }}">
                                <div style="margin-top:1rem;margin-right: 2rem">
                                    <button type="button" class="btn btn-danger rejectOrder"  id="reject_{{ $order->id }}" style="border-radius:5px;letter-spacing: 1px;">Reject</button>
                                </div>
                                <div style="margin-top:1rem;">
                                    <button type="button" class="btn btn-success proceedOrder" id="proceed_{{ $order->id }}" style="border-radius:5px;letter-spacing: 1px;">Proceed</button>
                                </div>
                            </div>  
                        	</div>
                    </td>
                    @if($order->is_assigned == Auth::id())
                    <td style="text-align:center">

                         @if($order->employe_video)
                                <p style="color:blue">Video Uploaded</p>
                            </div>
                            @else
                             <button type="button" class="btn btn-primary openUploadVideoModal" id="order_{{ $order->id }}">UploadVideo</button>

                        @endif
                    </td>                       
                    @endif
                </tr>
                @else
                 @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

<!-- End Add Customer Video modal-->
<div class="modal fade" id="AddCustomerVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add CustomerVideo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>            
            <form action="javascript:void(0);" class="customerVideo" method="post" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">UploadVideo</label>                    			<select id="orders" name="orders">
                        	<option value="0">Select</option>
                        	
                        </select>
                                              
                    </div>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">UploadVideo</label>                    
                        <input type="file" name="video" accept="video/*" id="uploadedVideo" class="form-control ">
                        <input type="hidden" id="orderIdForUploadVideo" name="orderid" value="">                         
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                    <button class="btn btn-deep-orange" id="Addvideo"  
                            style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End End Customer Video modal-->
<div class="modal fade" id="commentPopUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Revise order</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> 
<form method="post" action="javascript:void(0);">
<div class="modal-body mx-3">
    <input type="hidden" value="{{ $order->id }}">

 <center><h4>Are You Sure Want To Assign Order</h4></center>
</div>
<div class="modal-footer d-flex justify-content-center " style="text-align: center" >
<button class="btn btn-deep-orange Rewise" id="{{ $order->id }}"
style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;" >ok</button>
</div>
</form>
</div>
</div>
</div>
<div class="modal fade" id="orderdetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Brief Details</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> 
<form method="post" action="javascript:void(0);">
<div class="modal-body mx-3">
</div>
<h5>Other</h5>
<div id='other' name="other_link"></div>
<h5>Term Condition</h5>
<div id='term' name="term_condition"></div>
<h5>Product Link</h5>
<div id='prolink' name="pro"></div>
<h5>Website link</h5>
<div id='weblink' name="web"></div>
<div class="modal-footer d-flex justify-content-center " style="text-align: center" >
<button class="btn btn-deep-orange Rewise" id="{{ $order->id }}"
style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;" >ok</button>
</div>
</form>
</div>
</div>
</div>