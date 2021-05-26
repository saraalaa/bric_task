@extends('layouts.app')

@if(count($customers))
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th class="text-center">edit</th>
        <th class="text-center">delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$customer->name}}</td>
        <td>{{$customer->email}}</td>
        <td class="text-center"><a href="{{url(route('customers.edit',$customer->id))}}" class="btn btn-success btn-xs" ></a></td>
        <td class="text-center">
            <form action="{{ url(route('customers.destroy',$customer->id)) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-xs"></button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@else
    No data here
@endif

<div class="box-body">
    <a href="{{url(route('customers.create'))}}" class="btn btn-dark"> New Customer </a>
</div>
