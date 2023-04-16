<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ["title", "image", "text"];

    public function getAbstract($max=50) {
        return substr($this->text, 0, $max) . "...";
    }

    public static function generateSlug($title) {
        //genera slug
        $possible_slug = Str::of($title)->slug('-');

        //array di progetti in cui lo slug = $possible_slug
        $projects = Project::where('slug',  $possible_slug)->get();

        //controllo che slug sia unico e se non lo è lo rigenero
        //while finchè c' è qualcosa dentro array projects, se è vuoto (e quindi slug è unico) non entrerà nemmeno nel while
        $original_slug = $possible_slug;
        $i = 2;
        
        while(count($projects)) {
            $possible_slug = $original_slug . "-" . $i;
            $projects = Project::where('slug',  $possible_slug)->get();
            $i++;
        }

        return $possible_slug;
    }
}