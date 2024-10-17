<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class post extends Component
{


    public $post;

    public $comments;
    /**
     * Create a new component instance.
     */
    public function __construct($post , $comments)
    {
        $this->post = $post;

        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'blade'
        <div {{$attributes}}>
        <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
        <main role="main" class="container">
            <div class="row">
              <div class="col-md-8 blog-main">
          
               
          
                <div class="blog-post md-3">
                  <h2 class="blog-post-title">
          
                      {{ ($post->title) }}
          
                  </h2>
          
                  <p class="blog-post-meta">
                      
                      بقلم{{ ($post->author) }}
          
                  {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
          
                  </p>
          
                  <p>
                      {{ ($post->body) }}
                  </p>
          
                  <h1>التعليقات</h1>
          
                  @if(count($comments) == 0)
          
                  <h3>لا يوجد تعليقات </h3>
          
                  @else
          
                   @foreach($post->comments as $comment)
          
                  <h4>
          
                    {{ ($comment->name) }}
          
                  </h4>
          
                  <p>
                    {{ ($comment->body) }}
                  </p>
          
                   @endforeach 
          
                  @endif
          
                </div>
                
                 
                  
          
          
          
                
    
blade;
    }
}
