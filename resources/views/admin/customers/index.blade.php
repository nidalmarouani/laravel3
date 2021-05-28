@extends('layouts.adminlayout')

@section('content')

@if (session('deleteCustomer'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('deleteCustomer') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>iD customer</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>email</th>
        <th>Phone</th>
        <th>operation</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
      <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->firstname}}</td>
        <td>{{$customer->lastname}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->phone}}</td>
        <td>
        <a href="{{route('customers.edit',['customer'=>$customer->id])}}"> <i class="fas fa-edit"></i> </a>
        <a href="{{route('customers.show',['customer'=>$customer->id])}}">  <i class="fas fa-eye"></i> </a>
        <a href="#"  onclick="event.preventDefault();
        document.getElementById('delete').submit()"> <i class="fas fa-trash-alt"></i> </a>
        <form id="delete" action="{{ route('customers.destroy',['customer'=>$customer->id]) }}" method="POST" >
            @csrf
            @method('DELETE')
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    {{$customers->links()}}
  </div>

@endsection
