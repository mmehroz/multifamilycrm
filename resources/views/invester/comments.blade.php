@foreach($comment as $comments)
<p id="showcomment{{$comments->commentinvester_id}}" class="commet-pp">{{$comments->commentinvester_text}} <span class="comment-datetime"> {{$comments->created_at}}</span> </p> 
@endforeach