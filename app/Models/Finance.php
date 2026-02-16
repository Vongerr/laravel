<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 * @property string $hash
 * @property int $budget_category
 * @property int $category
 * @property string $date
 * @property string $time
 * @property string $datetime
 * @property string $username
 * @property string $money
 * @property string $bank
 * @property string $comment
 * @property string $exclusion
 */
class Finance extends Model
{
    const string TAXI = 'taxi';
    const string CAFE = 'cafe';
    const string RESTAURANT = 'restaurant';
    const string FAST_FOOD = 'fast_food';
    const string MARKET = 'market';
    const string PRODUCTS = 'products';
    const string TRANSPORT = 'transport';
    const string SCHOLARSHIP = 'scholarship';
    const string SALARY = 'salary';
    const string TRANSFER = 'transfer';
    const string SPORT = 'sport';
    const string ELECTRONIC = 'electronic';
    const string MEDICAL = 'medical';
    const string BEAUTY = 'beauty';
    const string PHARMACY = 'pharmacy';
    const string ZOO = 'zoo';
    const string DIGITAL_STORE = 'digital_store';
    const string REPAIR = 'repair';
    const string STATIONARY = 'stationary';
    const string EDUCATION = 'education';
    const string COMMUNICATION = 'mobile_communication';
    const string BONUS = 'bonus';
    const string MARKETPLACE = 'marketplace';
    const string FUEL = 'fuel';
    const string LOTTERIES = 'lotteries';
    const string BOOKS = 'books';
    const string SOUVENIRS = 'souvenirs';
    const string ENTERTAINMENTS = 'entertainments';
    const string KIDS = 'kids';
    const string COSMETICS = 'cosmetics';
    const string CLOTHES_AND_SHOES = 'clothes_and_shoes';
    const string GOV_SERVICE = 'gov_service';
    const string TRAIN_TICKET = 'train_ticket';
    const string BANK_SERVICE = 'bank_service';
    const string CASH = 'cash';
    const string HOTELS = 'hotels';
    const string SERVICE = 'service';
    const string FINANCE = 'finance';
    const string CHARITY = 'charity';
    const string AUTO = 'auto';
    const string REFUND = 'refund';
    const string OTHER = 'other';

    const string TINKOFF = 'tinkoff';
    const string ALFA = 'alfa';
    const string OTKRITIE = 'otkritie';
    const string VTB = 'vtb';

    use HasFactory;

    protected $table = 'finance';

    protected $fillable = [
        'hash',
        'budget_category',
        'category',
        'date',
        'time',
        'datetime',
        'username',
        'money',
        'bank',
        'comment',
        'exclusion',
    ];

    public static function create(Request $request): Finance
    {
        $request->validate([
            'budget_category' => 'required|string|max:255',
            'category' => 'required|string',
            'date' => 'required|date|min:0',
            'time' => 'required|date_format:H:i|min:0',
            'datetime' => 'required|date_format:Y-m-d H:i|min:0',
            'username' => 'required|integer|min:0',
            'money' => 'required|integer|min:0',
            'bank' => 'required|integer|min:0',
            'comment' => 'required|integer|min:0',
            'exclusion' => 'required|integer|min:0',
        ]);

        $model = new static();
        $model->hash = $request->hash;
        $model->category = $request->category;

        return $model;
    }
}
