@extends('layouts.auth')
@section('content')
  <div class="flex justify-between p-10 gap-14">
      <form class="w-full" action="{{route('loginProcess')}}" method="POST">
        @csrf
        <div>
          <div class="mb-4">
            <label class="block">
              <span class="block font-bold text-slate-700">Email :</span>
              <input type="email" value="admin@email.com" name="email" class="mt-1 w-full block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
              "/>
            </label>
            
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            @error('login_gagal')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-4">
            <label class="block">
              <span class="block font-bold text-slate-700">Password :</span>
              <input type="password" value="masukaja" name="password" class="mt-1 w-full block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
              "/>
            </label>
            
            @error('password')
              <div class="text-red-500">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="mt-6 text-center flex flex-col gap-3">
          <button class="px-10 py-2 text-white bg-blue-400 hover:bg-blue-500 active:bg-blue-600 duration-200 rounded-full">
            Masuk
          </button>

          <a href="{{route('register')}}" class="font-bold text-sm text-blue-500">daftar</a>
        </div>
      </form>
  </div>
@endsection