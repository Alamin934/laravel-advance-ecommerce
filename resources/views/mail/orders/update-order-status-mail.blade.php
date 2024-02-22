<div style="text-align: center!important">
    <h2>Dear, {{$data['order']['customer_name']}}!</h2>

    <p>Your Order has been Shipped. It's Deliverd Estimated Date{{date('M d',
        strtotime($data['order']['updated_at']."+2days"))}}</p>


    <p>Your Order has been Deliverd. Thank you for build a relationship with us. If you want, you can rate this
        product.<a href="">Click</a></p>

    <a href="{{route('dashboard.order.details',$data['order']['id'])}}"
        style="background: #00b97c;color:#fff;padding:8px 18px; ">Track Your Order</a>
</div>