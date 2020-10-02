@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style>
    body {
        background-color: #9da207;
    }
    .expand-collapse {
        max-width: 960px;
        margin: 0 auto;
    }
    .expand-collapse p {
        background-color: #dfe60a;
        padding: 20px;
        margin: 0;
    }
    .expand-collapse div {
        padding: 0;
        margin: -2px 0 0 0;
    }
    .expand-collapse h3 {
        background-color: #ccc;
        cursor:  pointer;
        padding: 20px;
        margin: 0 0 2px;
    }

</style>

@section('content')
   <div class="container">
       <div class="row">
           <div class="com-md-12">
               <div class="expand-collapse">
                   <h3>What are color codes?</h3>
                   <div>
                       <p>Color codes are ways of representing the colors we see everyday in a format that a computer can interpret and display. Commonly used in websites and other software applications, there are a variety of formats, including Hex color codes, RGB and HSL values, and HTML color names, amongst others. </p>
                   </div>
                   <h3>What is material design?</h3>
                   <div>
                       <p>Material design is a visual language and design system developed by Google with an almost flat style and vibrant color schemes. Material design is a visual language and design system developed by Google with an almost flat style and vibrant color schemes. Material design is a visual language and design system developed by Google with an almost flat style and vibrant color schemes.</p>
                   </div>
               </div>
           </div>
           <div class="col-md-12 mt-4 text-center">
               <a href="{{route('story.create')}}" class="mb-0">
                   <button class="btn btn-success text-capitalize">Create awesome story</button>
               </a>
           </div>

       </div>
   </div>
@endsection

<script>
    $(document).ready(function() {
        $('.expand-collapse h3').each(function() {
            var tis = $(this), state = false, answer = tis.next('div').slideUp();
            tis.click(function() {
                state = !state;
                answer.slideToggle(state);
                tis.toggleClass('active',state);
            });
        });
    });
</script>
