@php
    $updatestatus = false;
    if (isset($categorydata)) {
        $updatestatus = true;
    }
@endphp
@extends('layouts.AdminLayout')
@section('title', 'Category Add')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/category.css') }}">
@endsection

@section('header')
    Category {{ $updatestatus == true ? 'Edit' : 'Add' }}
@endsection

@section('content')
    <div class="container">
        <div class="input">
            <form
                action="{{ $updatestatus == true ? route('CategoryUpdate', $categorydata->id) : route('CategoryCreateProcess') }}"
                method="post">
                @csrf
                @if ($updatestatus == true)
                    @method('PATCH')
                @endif
                <input type="hidden" name="id" value="{{ $updatestatus == true ? $categorydata->id : '' }}">
                <div class="category-name">
                    <label>Category Name</label>
                    <input type="text" name="name" value="{{ $updatestatus == true ? $categorydata->name : '' }}">
                </div>
                <div class="btn-2">
                    <a class="button-link" href="{{ route('Category') }}">Cancle</a>
                    <button class="button-link" type="submit">{{ $updatestatus == true ? 'Update' : 'Add' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
