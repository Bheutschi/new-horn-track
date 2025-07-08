@extends('layouts.app')
@section('title', 'Login')
@section('navbar')
@endsection
@section('content')
    <div class="h-screen flex justify-center items-center">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">Se connecter</legend>
            <a href="{{ route('auth.redirect') }}" class="btn bg-[#2F2F2F] text-white border-black">
                <svg aria-label="Microsoft logo" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M96 96H247V247H96" fill="#f24f23"></path><path d="M265 96V247H416V96" fill="#7eba03"></path><path d="M96 265H247V416H96" fill="#3ca4ef"></path><path d="M265 265H416V416H265" fill="#f9ba00"></path></svg>
                Se connecter avec Microsoft
            </a>
        </fieldset>
    </div>
@endsection
