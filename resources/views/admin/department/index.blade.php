<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดี , {{Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    @if(session("success"))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">ตางรางข้อมูลแผนก</div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อแผนก</th>
                                    <th scope="col">UserID</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $row)
                                <tr>
                                    <td>{{$departments->firstItem()+$loop->index}}</td>
                                    <td>{{$row->department_name}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td><a href="{{url('/department/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a></td>
                                    <td><a href="{{url('/department/softdelete/'.$row->id)}}" class="btn btn-danger">ลบ</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$departments->links()}}
                        <div class="card">
                            <div class="card-header">ถังขยะ</div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">ชื่อแผนก</th>
                                        <th scope="col">พนักงาน</th>
                                        <th scope="col">กู้คืนข้อมูล</th>
                                        <th scope="col">ลบข้อมูลถังขยะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trashDepartment as $row)
                                    <tr>
                                        <td>{{$trashDepartment->firstItem()+$loop->index}}</td>
                                        <td>{{$row->department_name}}</td>
                                        <td>{{$row->user->name}}</td>
                                        <td><a href="{{url('/department/edit/'.$row->id)}}" class="btn btn-primary">กู้คืนข้อมูล</a></td>
                                        <td><a href="{{url('/department/softdelete/'.$row->id)}}" class="btn btn-danger">ลบข้อมูลถังขยะ</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$trashDepartment->links()}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('addDepartment')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="department_name">ชื่อแผนก</label>
                                    <input type="text" name="department_name" class="form-control">
                                </div>
                                @error('department_name')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>
                                <input type="submit" value="บันทึก" class="btn btn-primary" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>