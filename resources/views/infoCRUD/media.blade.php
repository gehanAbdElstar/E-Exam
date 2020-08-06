
    
 @if(!empty($url))
       @if (strpos(mime_content_type($url), 'image') !== false) 
        <img src="{{url($url)}}" height="160px" width="160px"/>
     
     @elseif (strpos(mime_content_type($url), 'audio')!== false) 
        <audio controls autoplay="">
            <source src="{{url($url)}}" type="audio/mp3">
        </audio>
     @elseif(strpos(mime_content_type($url), 'vedio')!== false) 
        <video controls  height="160"  autoplay="">
            <source src="{{url($url)}}" type="video/mp4">
        </video>
     @else
     @php
       $array= explode('/',$url);
       $filename=end($array);
     @endphp
     <div class="embed-responsive embed-responsive-4by3">
        <iframe  class="embed-responsive-item" src="{{url($url)}}" 
        width="200" height="200"  >
              
            </iframe>
          </div>
            <a target="_blank" href="{{url($url)}}">
            {{$filename}}
            </a>  
    
    @endif
    @endif
