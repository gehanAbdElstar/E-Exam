<div class="text-center">
    <table class=" table-bordered table-striped table-light table-hover table-responsive w-75 table-sm table-fixed">
     <thead class="text-center">
        <tr class="text-center ">
          <th  class="text-center" >name</th>
          <th   class="text-center">number</th>
          <th   class="text-center">subject</th>
          <th  class="text-center"></th>
          <th  class="text-center"> </th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    
       <tbody>
       @foreach ($mainTopics as $mainTopic)
       @php
       $collegeInfo=$mainTopic->collegeInformation;
       @endphp
        
       
           
      
       @foreach ($collegeInfo as $info)
       <tr>
        <td class="text-center">{{ $mainTopic->name }}</td>
        <td class="text-center">{{ $info->topic }}</td>
       <td class="text-right p-2 ">
       <div class="contents">
       {{ $info->contents }}
       </div>
       </td>
       <td >
         @php
         $url=$info->media1_path; 
         @endphp
         @include('infoCRUD.media')
      
         
          
    
       </td>
       <td >
           @php
           $url=$info->media2_path; 
           @endphp
        
         @include('infoCRUD.media')
        
       </td>
    <td>