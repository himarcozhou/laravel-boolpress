<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model {
  protected $fillable = ["title", "content", "category_id", "slug", "cover_url"];

  public function user() {
    return $this->belongsTo("App\User");
  }

  public function category(){
    return $this->belongsTo("App\Category");
  }

  public function tags() {
    return $this->belongsToMany("App\Tag");
  }
}
