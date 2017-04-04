<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'abbreviation', 'teacherName', 'description', 'public'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        return $this->comments()->create(['user_id' => auth()->id(), 'body' => $body]);
    }

    public static function getEmptySlotsOnARow($courseCount)
    {
        $emptySlotCount = 0;
        $totalCourseSlots = 3;

        while ($courseCount > $totalCourseSlots) {
            $totalCourseSlots += 3;
        }

        $emptySlotCount = $totalCourseSlots - $courseCount;

        return array_fill (0, $emptySlotCount, 0);
    }
}
