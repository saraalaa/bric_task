@extends('layouts.app')

<form method="post" action="{{ route('customers.update', $customer->id) }}">
    @method('put')
    @include('customer.form')
</form>
