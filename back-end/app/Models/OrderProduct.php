<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderProduct extends Model
{    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'address_user_id', 'status_id', 'type_ship_id', 'voucher_id', 'note', 'is_payment_online', 'shipper_id', 'image'
    ];
    protected $table = 'orderproducts';

    public function typeShipData()
    {
        return $this->belongsTo(TypeShip::class, 'type_ship_id', 'id')->withTrashed();
    }

    public function voucherData()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id', 'id')->withTrashed();
    }

    public function statusOrderData()
    {
        return $this->belongsTo(Allcode::class, 'status_id', 'code');
    }

}
