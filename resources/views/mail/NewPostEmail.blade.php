<p>
{{-- Gentile {{$user->name}}[Administrator], <br> --}}
Gentile [Administrator], <br>
<p style="color:grey">NewUserWelcomeEmail.php</p> <br>
<br>
E' Appena stato creato un post: <br>
Titolo: <strong> {{ $post->title }} </strong> <br>    
Link: <a href="{{ route('admin.posts.show', $post->id) }}">
    {{ route('admin.posts.show', $post->id) }}
</a><br>
<br>
Cordiali Saluti,<br>
Mailtrap.com
</p> 