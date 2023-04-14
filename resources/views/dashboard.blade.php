<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดี , {{Auth::user()->name}}

            <b class="float-end">จำนวนผู้ใช้ระบบ {{count($users)}} คน</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">Email</th>
                        <th scope="col">วันที่เข้าสู่ระบบ</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($users as $row)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->created_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>