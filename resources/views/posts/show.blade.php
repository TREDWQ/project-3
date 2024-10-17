


@section('title', $post->title)

<x-layout>
  <x-post :post="$post" :comments="$comments" class="font-weight-blod"/>
  
  

    <a class="btn btn-primary" href="/posts/{{$post->id}}/edit" >تعديل المقالة </a>


    <h3>اضف تعليق</h3>
    

  <x-creatcomment :post="$post"/>




</div><!-- /.row -->

</main><!-- /.container -->

</x-layout>