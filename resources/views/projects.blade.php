@extends('layaout')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<div class="card mb-30">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Projects</h3>
        <div class="modalbtn">
        <button style="background: #000;color: #fff;border: none;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#projectmodel">
            Create
        </button>
    </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">SL.no</th>
      <th scope="col">Project Name</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php $count=1; ?>
      @foreach($projects as $project)
    <tr>
      <th scope="row">{{$count}}</th>
      <td>{{$project->projectName}}</td>
      <td>{{$project->status}}</td>
    </tr>
    <?php $count++ ?>
    @endforeach
  </tbody>
</table>


<!-- Modal -->  
<div class="modal fade" id="projectmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
            @if(Session::has('flash_success'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_success') }}
              </div>
          @endif
          @if(Session::has('flash_error'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_error') }}
              <!-- Failed To Register Plaese Check try After Some Time -->
              </div>
              @endif
            <form action="{{url('addProject')}}" method="POST" enctype="multipart/form-data">
                @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Project name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="projectname">
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="active" checked>
  <label class="form-check-label" for="exampleRadios1">
    Active
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="inactive">
  <label class="form-check-label" for="exampleRadios2">
    InActive
  </label>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
        </div>
      </div>
    
    </div>
  </div>
</div>





<div class="card mb-30">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Tasks</h3>
        <div class="modalbtn">
        <button style="background: #000;color: #fff;border: none;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#taskmodel">
            manage Task
        </button>
    </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">SL.no</th>
      <th scope="col">Project Name</th>
      <th scope="col">Task Name</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php $count=1; ?>
      @foreach($tasks as $task)
    <tr>
      <th scope="row">{{$count}}</th>
      <td>{{$task->projectName}}</td>
      <td>{{$task->task_name}}</td>
      <td>{{$task->status}}</td>
    </tr>
    <?php $count++ ?>
    @endforeach
  </tbody>
</table>




<!-- Task Modal -->  
<div class="modal fade" id="taskmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
            @if(Session::has('flash_success'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_success') }}
              </div>
          @endif
          @if(Session::has('flash_error'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_error') }}
              <!-- Failed To Register Plaese Check try After Some Time -->
              </div>
              @endif
            <form action="{{url('addTask')}}" method="POST" enctype="multipart/form-data">
                @csrf

  <select class="form-select form-select-lg mb-3" name="project" aria-label=".form-select-lg example">
  <option value="">select Project</option>
    @foreach($projects as $project)
  <option value="{{$project->id }}">{{$project->projectName}}</option>
  @endforeach
</select>
<div class="form-group">
    <label for="exampleInputEmail1">Task name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="taskname">
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="active" checked>
  <label class="form-check-label" for="exampleRadios1">
    Active
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="inactive">
  <label class="form-check-label" for="exampleRadios2">
    InActive
  </label>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
        </div>
      </div>
    
    </div>
  </div>
</div>




<div class="card mb-30">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Time Entry</h3>
        <div class="modalbtn">
        <button style="background: #000;color: #fff;border: none;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#timeentry">
            TIme Entry
        </button>
    </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">SL.no</th>
      <th scope="col">Project Name</th>
      <th scope="col">Task Name</th>
      <th scope="col">Hours</th>
      <th scope="col">Date</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
      <?php $count=1; ?>
      @foreach($TimeEntry as $time)
    <tr>
      <th scope="row">{{$count}}</th>
      <td>{{$time->projectName}}</td>
      <td>{{$time->task_name}}</td>
      <td>{{$time->hours}}</td>
      <td>{{$time->Date}}</td>
      <td>{{$time->description}}</td>
    </tr>
    <?php $count++ ?>
    @endforeach
  </tbody>
</table>




<!-- Task Modal -->  
<div class="modal fade" id="timeentry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
            @if(Session::has('flash_success'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_success') }}
              </div>
          @endif
          @if(Session::has('flash_error'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_error') }}
              <!-- Failed To Register Plaese Check try After Some Time -->
              </div>
              @endif
            <form action="{{url('addTime')}}" method="POST" enctype="multipart/form-data">
                @csrf

  <select class="form-select form-select-lg mb-3" name="project" onchange="tasks(this)" aria-label=".form-select-lg example">
  <option value="">select Project</option>
    @foreach($projects as $project)
  <option value="{{$project->id }}">{{$project->projectName}}</option>
  @endforeach
</select>
<select class="form-select form-select-lg mb-3" name="task" id="task" aria-label=".form-select-lg example">
  <option value="">select task</option>
  
</select>
  <div class="form-group">
    <label for="exampleInputEmail1">Hours</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="hour">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="date">
  </div>  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
   <br> <textarea class="input--style-4"rows="2" cols="40" name="desc"  id="desc" ></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
        </div>
      </div>
    
    </div>
  </div>
</div>



<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
									
<h3>Report</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">SL.no</th>
      <th scope="col">Project Name</th>
      <th scope="col">Total Hour</th>
    </tr>
  </thead>
  <tbody id="report">
      <?php $count=1;
      $totalHour=0;
       ?>
      @foreach($Report as $Reports)
    <tr>
      <th scope="row">{{$count}}</th>
      <td>{{$Reports->projectName}}</td>
     
      @foreach($Reports->project as $time)
      
      <?php $totalHour+=$time->hours;?>
      
      @endforeach
   
      <?php if(sizeof($Reports->tasks) != 0){ ?>
      <td>{{$totalHour}}</td>
      <?php }?> 
    </tr>
    @foreach($Reports->tasks as $task)
    <tr>
      <td></td>
      <td>{{$task->task_name}}</td>
      @foreach($Reports->project as $time)
      @if($task->id == $time->task_id)
      <td>{{$time->hours}}</td>
      @endif
      @endforeach
      
    </tr>
    @endforeach

    <?php $count++; ?>
    @endforeach
  </tbody>
</table>





<script>
  function tasks(id) {
  var id=id.value;
  var data='<option value="">select Task</option>'
  $.ajax({
        method: "GET",
        url: "{{URL::to("taskproject")}}",
        data: {
        _token: '{{ csrf_token() }}',
        'id':id
      },
        success: function(result) {

console.log(result);
          for (let i = 0; i < result.length; i++) {
           data+='<option value="'+result[i].id+'">'+result[i].task_name+'</option>' 
          }
       
           $("#task").html(data)
        }
    });

    
  }
  $("#headerSearch").keyup(function(e){
    e.preventDefault();
//   console.log($("#user_search").val());
  var searchValue=$("#headerSearch").val();
  var data=''
  $.ajax({
        method: "POST",
        url: "{{URL::to("search")}}",
        data: {
        _token: '{{ csrf_token() }}',
        'search':searchValue
      },
        success: function(result) {
         
          // console.log(result.project.length);

            var count=1;
          var totalHour=0;
       
      for(i=0;i<result.length;i++)
      {
        data+='<tr><th scope="row">'+count+'</th><td>'+result[i].projectName+'</td>';
        console.log(result[i].project.length);
        for(m=0;m < result[i].project.length;m++)
        {
          totalHour+=parseInt(result[i].project[m].hours);
        }
      
        if(result[i].tasks != 0){ 
        data+='<td>'+totalHour+'</td></tr>';
       }
       console.log(result[0].tasks[0].task_name);

       for ( l = 0; l < result[i].tasks.length; l++) {
         console.log(result[i].tasks.length);
       data+='<tr><td></td><td>'+result[i].tasks[l].task_name+'</td>';
       for ( k = 0; k < result[i].project.length; k++) {
       
       if(result[i].tasks[l].id == result[i].project[k].task_id)
       {
       data+='<td>'+result[i].project[k].hours+'</td>';
       }
       
      
      }
      data+='</tr>';
     }
     count++;
      }

$("#report").html(data);
        }
    });
});
</script>
@endsection