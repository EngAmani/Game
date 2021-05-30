
<style>
#x td 
{
    text-align:center;
    vertical-align: middle;
}

td{
  text-align:center;
  direction: rtl;

}

th{
  text-align:center;
  direction: rtl;

}
#x {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  direction: rtl;
  
}

h4{
  direction: rtl;
}

img{
  margin-right:620px;
  margin-bottom:10px;
  margin-top:0px;
  direction:rtl;
}
#x td, #x th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align:center;

}

#x tr:nth-child(even){background-color: #ffffff;}

#x tr:hover {background-color:#3F2986;}

#x th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #3F2986;
  color: white;
  direction: rtl;
}


</style>

<?php $name=[];?>
@foreach($posts as $post)
<?php
$name=$post->user->name?>
@endforeach



<style>
#tail td{
  border: 1px solid white;

 
  }



@page {
	header: page-header;
	footer: page-footer;
}
thead{display: table-header-group;}
tfoot {display: table-row-group;}
tr {page-break-inside: avoid;}
</style>

<htmlpageheader name="page-header">
<img src="C:\Users\controlcenter\Desktop\1045684.jpg" alt="امانة جدة" width="120" height="120">



<p style="text-align:left;color:#000000; float:left">

الموظفة:{{$name}}  
<span style="color:white">--------------------------------------------------------------------</span>
  <span style="float:left;">
  إدارة المراقبة الإلكترونية لتتبع المركبات        </span> 

</p> 

<!-- <table id="info">
  <tr>
    <th>الموظف</th>
    <th>الإدارة</th>
  </tr>
  <tr>
    <td>{{$name}}</td>
    <td>إدارة المراقبة الإلكترونية للتبع المركبات</td>
  </tr>

</table> -->

</htmlpageheader>

<htmlpagefooter name="page-footer" >




<p style="text-align:left;color:#9a9a9a;">
ملخص الحضور و الإنصراف لموظفات مركز التحكم  
<span style="color:white">-------------------------------------------------------------</span>
  <span style="float:right;">
   الإدارة العامة للتحكم        </span> 
</p>
</htmlpagefooter>



<?php
$datel = \Carbon\Carbon::now();

$datel->startOfMonth()->subMonth()->format('F Y');
?>



<table id="x" class="table table-striped mt-3">
  <thead>
    <tr>
    <th scope="col"></th>
   
      <th scope="col">التاريخ</th>
      <th scope="col">الحضور</th>
      <th scope="col">الانصراف</th>
      <th scope="col">وقت إضافي</th>
      <th scope="col">التأخير</th>
      <th scope="col">دقائق الاستئذان</th>
      <th scope="col">غياب</th>
      <th scope="col">نوع الغياب</th>
      <th scope="col">ملاحظات</th>
    </tr>
  </thead>
  <tbody>
  <?php $global_format = env("GLOBAL_DATE_FORMAT","d-m-Y"); ?>

   @foreach($posts as $post)
    <tr>

    <!-- <th scope="row">{{ $post->id}}</th> -->
    <th scope="row" class="table-buttons">

    
    <?php 
       $late=$post->lateCal($post->id);
       $excus=$post->excuse_time;
       if($late>=$excus){
        $late=$late-$excus;
       }
       else{
        $late=$post->lateCal($post->id);
       }
       ?>
     
    <?php
    $name=$post->user->name;
   
    ?>

    <td>{{ Carbon\Carbon::parse($post->date)->format('y/m/d')}}</td>


</th>


    <td>{{$post->timeInCal($post->id)}}</td>
    <td>{{$post->timeOutCal($post->id)}}</td>
    <td>{{$post->offerTime($post->id)}}</td>
    <td>{{  $late }}</td>
    <td>{{$post->excuse_time}}</td>
    <td>{{ $post->absent }}</td>
    <td>{{ $post->absent_type }}</td>
    <td>{{ $post->notes }}</td>
        <!-- <form class="delete-form" style="margin:0;padding:0;"method="POST"action="{{ route('posts.destroy',$post)}}">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger btn-delete" style="background-color:#bf311a;color:white;">
        <i class="fa fa-trash"></i></button>
      </form> -->
     

   

      <!-- <th scope="row">{{ $post->ملاحظات}}</th>

      <td>{{ $post->نوع_الغياب }}</td>
      <td>{{ $post->غياب }}</td>
      <td>{{ $post->lateCal($post->id) }}</td>
      <td>{{$post->offerTime($post->id)}}</td>
      <td>{{ $post->مدة_الإستئذان }}</td>
      <td>{{ $post->وقت_الخروج }}</td>
      <td>{{ $post->وقت_الدخول }}</td>
      <td>{{ $post->التاريخ }}</td>
      <td>{{ $post->الموظف }}</td>
      <td>{{ $post->id }}</td> -->

      <!-- <td class="table-buttons">
        <a href="{{ route('posts.show', $post) }}" class="btn btn-light" style="background-color:#009F93; color:white;">
        <i class="fa fa-eye"></i>
      </a>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary" stule="background-color:7399C6; color:white;">
          <i class="fa fa-pencil"></i>
        </a>

         
        <a href="{{ route('delete', $post) }}" class="btn btn-danger" stule="background-color:7399C6; color:white;">
          <i class="fa fa-pencil"></i>
        </a>
        <!-- <form class="delete-form" style="margin:0;padding:0;"method="POST"action="{{ route('posts.destroy',$post)}}">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger btn-delete" style="background-color:#bf311a;color:white;">
        <i class="fa fa-trash"></i></button>
      </form> --> 



      <!-- </td> -->
 
    </tr>

  @endforeach
  </tbody>
</table>
<?php $etyadi=0; $exs=0; $latecal=0; $hour=0;$extra=0; $etrary=0;  $marady=0; $wafaa=0; $bdon=0; $exsCounter=0; $lateCounter=0; $absCounter=0;?>

 @foreach($posts as $post)
 <!-- calculate absent e3tyady -->
 @if($post->absent_type=="إعتيادي")

<?php  $etyadi++ ?>
@endif

@if($post->absent_type=="إضطراري")

<?php  $etrary++ ?>
@endif

@if($post->absent_type=="مرضي")

<?php  $marady++ ?>
@endif

@if($post->absent_type=="وفاة")

<?php  $wafaa++ ?>
@endif

@if($post->absent_type=="بدون عذر")

<?php  $bdon++ ?>
@endif

@if($post->excuse_time!=null)

<?php  $exsCounter++ ?>
@endif

@if($post-> $late!=null)

<?php  $lateCounter++ ?>
@endif


<?php $exs=$exs+$post->excuse_time;
$hourExs=intdiv($exs,60);
$minutesExs=$exs%60;

?>
@if($post->absent!=null)
<?php
$absCounter++;
?>
@endif
<?php 

$latecal=$latecal+$post->lateCal($post->id);

$hour=intdiv($latecal,60);
$munites=$latecal%60;
?>

<?php
$extra=$extra+$post->offerTime($post->id);
$munitesExtra=$extra%60;
$extraH=intdiv($extra,60);

?>
@endforeach 

<?php 
if($latecal>=$exs){

  $latecal=$latecal-$exs;
  $hour=intdiv($latecal,60);
$munites=$latecal%60;
} else{
 
  $hour=intdiv($latecal,60);
  $munites=$latecal%60;
}
?>
<style>#tab {
  border: 1px solid black;
  direction: rtl;
  width:300px;
  margin-left:420px;
  border-color:#999999;
}

.head{

  color: #3F2986;
  font-weight:bolder;
}

#short{
border-collapse: collapse;
direction: rtl;
width:115%;
height:100%;

}


td{
  text-align:center;

}
#short th {
  height: 40px;
  font-size: large;
  background-color:#3F2986;
  color:white;
}

.s{
  height:30px;
  background-color:#C0C0C0
  

}
.t{
  height:30px;
  background-color:#00aab8

  


}

.y{
  height:30px;
  background-color:#C0C0C0


}

table, td, th {
  border: 1px solid #ddd;
}

</style>


<br></br>
<br></br>
<br></br>

<div class="short">

<table  name="short" id="short" border="1" style="direction: rtl;">
<tr>
<th colspan="10">ملخص الحضور والغياب</th>

</tr>
  <tr>
    <th colspan="6" >الإجازات و الغياب</th>
     <th colspan="2">الإستئذان</th>

    <th colspan="2">التأخير</th>
  </tr>
  <tr>
  <td class="s">العدد</td>
    <td class="s">إعتيادي</td>
    <td class="s">إضطراري</td>
    <td class="s">مرضي</td>
    <td class="s">وفاة</td>
    <td class="s">بدون عذر</td>
    <td class="t">العدد</td>
    <td class="t">فترة الإستئذان</td>
        <td class="y">العدد</td>
    <td class="y">فترة التأخير</td>
  </tr>

   <tr>

   <td>{{$absCounter}}</td>
    <td>{{$etyadi}}</td>
    <td>{{$etrary}}</td>
    <td>{{$marady}}</td>
    <td>{{$wafaa}}</td>
    <td>{{$bdon}}</td>
    <td> {{$exsCounter}}</td>
    <td>{{$hourExs}}ساعات و {{$minutesExs}}دقيقة</td>
        <td>{{$lateCounter}}</td>
    <td>{{$hour}}ساعات و {{$munites}}دقيقة</td>
  </tr>

</table>
</div>
<style> 
 * { font-family: Arial,DejaVu Sans, sans-serif; }
</style>