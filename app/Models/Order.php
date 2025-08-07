<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    /**
     * Set default discount percent
     */
    const DISCOUNT_PERCENT = 5;
    const TYPE_PAYMENT = [
        1 => "Thanh toán khi nhận hàng",
        2 => "Momo",
        // 3 => "Apple Pay",
        // 4 => "Paypal",
    ];
    const TYPE_PAYMENT_DESCRIPTION = [
        0 => "Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.",
        1 => "Trả tiền mặt khi giao hàng.",
    ];

    const STATUS_PENDING = 0;
    const STATUS_CONFIRMED = 1;
    const STATUS_TRANSFERRED = 2;
    const STATUS_SHIPPING = 3;
    const STATUS_COMPLETED = 4;
    const STATUS_CANCELED = 99;

    public $timestamps = true;
    protected $fillable = array(
        'total_price',
        'discount_percent',
        'discounted_price',
        'payment_method',
        'code',
        'status',
        'note',
    );

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function order_customer()
    {
        return $this->hasOne(OrderCustomer::class, 'order_id');
    }


    public static function generateRandomCodes($length = 8)
    {
        do{
            $code = strtoupper(Str::random($length));
            $coupon = Order::query()->where("code", $code)->first();
        }while ($coupon);

        return $code;
    }

    public static function getOrderSuccessByPhone($phone)
    {
        return Order::query()->where("status", self::STATUS_COMPLETED)->whereHas("order_customer", function($query) use($phone){
            $query->where("phone", $phone);
        })->first();
    }

    public static function getOrderSuccessByCode($code)
    {
        return Order::query()->whereHas("order_customer", function($query) use($code){
            $query->where("code", $code);
        })->first();
    }
}
