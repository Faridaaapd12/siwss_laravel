<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'pemesanan_id',
        'status_code',
        'status_message',
        'transaction_id',
        'gross_amount',
        'payment_type',
        'transaction_time',
        'transaction_status',
        'bank',
        'va_number',
        'fraud_status',
        'bca_va_number',
        'permata_va_number',
        'pdf_url',
        'finish_redirect_url',
        'bill_key',
        'biller_code',
    ];
}
