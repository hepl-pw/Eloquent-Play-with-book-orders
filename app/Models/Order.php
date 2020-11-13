<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    public $timestamps = true;

    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function books()
    {
        return $this
            ->belongsToMany('App\Models\Book')
            ->withPivot('quantity');
    }

    public function statusChanges()
    {
        return $this
            ->hasMany(OrderStatus::class, 'order_id');
    }

    public function activeStatusChanges()
    {
        return $this
            ->hasMany(OrderStatus::class, 'order_id')
            ->whereNotIn('status_id', [4, 5]);
    }

    public function orderedActiveStatusChanges()
    {
        return $this
            ->hasMany(OrderStatus::class, 'order_id')
            ->whereNotIn('status_id', [4, 5])
            ->orderBy('created_at', 'desc');
    }

    public function lastActiveStatusChange()
    {
        return $this
            ->hasOne(OrderStatus::class)
            ->whereNotIn('status_id', [4, 5])
            ->orderBy('created_at', 'desc');
    }

    public function scopeWithCurrentStatus($q)
    {
        $q->addSelect([
            'current_status_date' => OrderStatus::select('order_status.created_at')
                ->whereColumn('order_id', 'orders.id')
                ->whereNotIn('order_status.status_id',[4,5])
                ->latest()
                ->take(1),
            'current_status_id' => OrderStatus::select('order_status.status_id')
                ->whereColumn('order_id', 'orders.id')
                ->whereColumn('created_at', 'current_status_date')
                ->take(1)
        ])->addSelect([
            'current_status_name' => Status::select('name')
                ->whereColumn('id', 'current_status_id')
                ->take(1)
        ]);
    }

    public function owner()
    {
        return $this
            ->belongsTo(User::class, 'user_id');
    }


    /**
     * Status relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function statuses()
    {
        return $this->belongsToMany(Status::class)->withTimestamps();
    }

    public function activeStatus()
    {
        return $this->belongsToMany(Status::class)->withTimestamps()->orderBy();
    }

    /**
     * Academic Year relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    /**
     * format the date of the order
     * @return mixed
     */
    public function getCreationDateAttribute()
    {
        return $this->created_at->format('m d yy, H:m');
    }

    /**
     * return last status assigned to this order
     * @return mixed
     */
    // public function getLastStatusAttribute()
    // {
    //     return $this->statuses->sortBy(function ($status) {
    //         return $status->pivot->created_at;
    //     })->last()->status;
    // }

    /**
     * return the quantity of ordered book
     * @return integer
     */
    public function getBookQuantityAttribute()
    {
        //code here
    }
}
