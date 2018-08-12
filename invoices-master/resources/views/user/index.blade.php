<div class="m-portlet m-portlet--mobile">

    <div class="m-portlet__body">

        <div><span class="Title">Name : </span><span class="title_info">{{$user->name}}</span></div>
        <div><span class="Title">Email : </span><span class="title_info">{{$user->email}}</span></div>
        <div><span class="Title">Phone : </span><span class="title_info">{{$user->phone}}</span></div>
        <div><span class="Title">Address : </span><span class="title_info">{{$user->address}}</span></div>
        <div><span class="Title">Country : </span><span class="title_info">{{$user->country}}</span></div>
        <div><span class="Title">City : </span><span class="title_info">{{$user->city}}</span></div>
        <hr>

        <img style="width: 500px;height: 300px;" src="{{ asset("storage$user->logo") }}"></img>
        <br>
        <div>
            <a href="{{route('user.edit',$user->id)}}" style="margin-top: 10px;" class="btn btn-warning btn-sm pjax-link" data-id="{{$user->id}}">
                Edit <i class="fa fa-edit"></i>
            </a>
        </div>

    </div>
</div>

