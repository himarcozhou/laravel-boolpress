# Notes Relazioni

## One to One
- 2 model associati tra di loro
  - 1° model
    ```php
    public function nomeDelSecondoModel(){
       return $this->hasOne("App\NomeModel2")
    }
    ```
  - 2° model
    ```php
    public function nomeDelPrimoModel(){
       return $this->belongsTo("App\NomeModel1")
    }
    ```

## One to Many
- 2 model associati tra di loro
  - 1° model
    ```php
    public function nomeDelSecondoModel(){
       return $this->hasMany("App\NomeModel2")
    }
    ```
  - 2° model
    ```php
    public function nomeDelPrimoModel(){
       return $this->belongsTo("App\NomeModel1")
    }
    ```

## Many to Many
- dobbiamo creare la tabella ponte o "pivot".
  - il nome della tabella deve esser `tabella1(in Singolare)_tabella2(in Singolare)`
  ```php
  Schema::create('post_tag', function (Blueprint $table) {
            // Foreign key 1
            $table->unsignedBigInteger("post_id");
            $table->foreign("post_id")
                ->references("id")
                ->on("posts");

            // Foreign key 2
            $table->unsignedBigInteger("tag_id");
            $table->foreign("tag_id")
                ->references("id")
                ->on("tags");

            /* 
            $table->foreignId("post_id")->constrained();
            $table->foreignId("tag_id")->constrained(); 
            */

            $table->primary(["post_id", "tag_id"]);

            $table->timestamps();
        });
  ```
- 2 model associati tra di loro
  - 1° model
    ```php
    public function nomeDelSecondoModel(){
       return $this->belongsToMany("App\NomeModel2")
    }
    ```
  - 2° model
    ```php
    public function nomeDelPrimoModel(){
       return $this->belongsToMany("App\NomeModel1")
    }
    ```