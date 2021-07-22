<div class="flex flex-col">
<div>Student Name: {{$name->title }} {{$name->firstname }} {{$name->middlename }} {{$name->surname }}</div>
<div>Student ID: {{$student_id}}</div>
<div>Faculty Code : {{$fac_id}} Faculty </div>
<div>Department Code: {{$dept_id}}</div>

 <div>
     @foreach ($schools as $faculty )
        <div>{{$faculty->school_title}}</div>
        @foreach($faculty->departments as $department)
            <div>Department of {{$department->dept_title}}</div>
        @endforeach
    @endforeach
 </div>  
</div>
