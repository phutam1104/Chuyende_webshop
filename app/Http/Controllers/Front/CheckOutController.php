<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService, $orderDetailService;
    public function __construct(
        OrderServiceInterface $orderService,
        OrderDetailServiceInterface $orderDetailService
    ) {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('pages.checkout.checkout', compact('carts', 'total', 'subtotal'));
    }
    public function addOrder(Request $request)
    {
        //Thêm Đơn Hàng
        $order = $this->orderService->create($request->all());

        //Thêm chi tiết đơn hàng
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];
            $this->orderDetailService->create($data);
        }
        if ($request->payment_type == 'pay_later') {

            //Gửi email
            $total=Cart::total();
            $subtotal=Cart::subtotal();
            $this->sendEmail($order,$total,$subtotal);
            // Xóa giỏ hảng
            Cart::destroy();


            // Trả về kết quả thông báo
            return redirect('checkout/result')->with('notification', 'Bạn đã đặt hàng thành công! Hãy kiểm tra email.');
        }
        if($request->payment_type == 'online_payment'){
            //Lay URL thanh toan VNPay
            $data_url=VNPay::vnpay_create_payment([
                'vnp_TxnRef'=>$order->id,
                'vnp_OrderInfo'=>'Mô tả đơn hàng ở đây...',
                'vnp_Amount'=>Cart::total(0,'',''),
            ]);
            return redirect()->to($data_url);
        }
    }
    public function vnPayCheck(Request $request){
        //Lay data tu URL (do VNPay gui ve qua $vnp_Return)
        $vnp_Response = $request->get('vnp_ResponeCode');
        $vnp_TxnRef=$request->get('vnp_TxnRef');//order_id
        $vnp_Amount=$request->get('vnp_Amount');

        // Kiem tra data, xem ket qua giao dich tra ve VNPay hop le khong
        if($vnp_Response!=null){

            if($vnp_Response == 00){
                //Xoa gio hang
                Cart::destroy();
                //Thong bao
                return redirect('check/result')->with('Thông báo','Thành công! Bạn đã thanh toán thành công. Hãy kiểm tra email của bạn.');
            }
            else
            {//Neu khong thanh cong
                //Xoa don hang đã thêm vào database
                $this->orderService->delete($vnp_TxnRef);

                //Thong bao loi
                return redirect('check/result')->with('Thông báo','Lỗi:Đã hủy thanh toán của bạn');

            }
        }
    }
    public function result()
    {
        $notification = session('notification');
        return view('pages.checkout.result', compact('notification'));
    }
    public function sendEmail($order,$total,$subtotal){
        $email_to=$order->email;
        Mail::send('pages.checkout.email',compact('order','total','subtotal'),
        function($message)use($email_to){
                $message->from('nguyenphutam201@gmail.com','Nấm Store');
                $message->from($email_to,$email_to);
                $message->subject('Thông báo đơn hàng');

        }
    );
    }
}
