<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StateRoute extends Model
{
    protected $fillable = ['from_state_id','to_state_id','title','slug','min_cost','max_cost','miles'];

    public function fromState(): BelongsTo { return $this->belongsTo(State::class,'from_state_id'); }
    public function toState(): BelongsTo { return $this->belongsTo(State::class,'to_state_id'); }
}
