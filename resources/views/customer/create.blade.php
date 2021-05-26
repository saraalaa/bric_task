@extends('layouts.app')
@inject('customer','App\Models\Customer')

<form method="post" action="{{ route('customers.store') }}">
    @include('customer.form')
</form>
