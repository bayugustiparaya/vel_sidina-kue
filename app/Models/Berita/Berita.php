<?php

namespace App\Models\Berita;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'slug',
        'kategori_id',
        'bigimage',
        'body',
        'is_publish',
        'posted_by',
        'edited_by'
    ];

    protected $cast = [
        'kategori_id' => 'integer',
        'is_publish' => 'integer',
        'posted_by' => 'integer',
        'edited_by' => 'integer'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function postedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

    public function editedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'edited_by');
    }

    public function getLessBodyAttribute()
    {
        return Str::limit(strip_tags($this->body), 70);
    }
}
