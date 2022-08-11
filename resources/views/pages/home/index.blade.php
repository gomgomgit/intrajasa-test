@extends('layouts.app')
@section('content')
  <div class="flex justify-between p-10 gap-14">
      <a href="{{route('deposit')}}" class="cursor-pointer">
        <div class="flex flex-col items-center gap-6 py-10 w-44 border-4 border-slate-300 rounded-2xl hover:border-sky-200 hover:bg-sky-100 hover:drop-shadow-lg duration-200">
            <i class="fa-solid fa-circle-dollar-to-slot text-5xl text-green-600"></i>
            <p class="font-bold text-xl ">Deposit</p>
        </div>
      </a>
        <a href="{{route('withdraw')}}" class="cursor-pointer">
          <div class="flex flex-col items-center gap-6 py-10 w-44 border-4 border-slate-300 rounded-2xl hover:border-sky-200 hover:bg-sky-100 hover:drop-shadow-lg duration-200">
              <i class="fa-solid fa-sack-dollar text-5xl text-blue-600"></i>
              <p class="font-bold text-xl ">Withdraw</p>
          </div>
        </a>
        <a href="{{route('history')}}" class="cursor-pointer">
          <div class="flex flex-col items-center gap-6 py-10 w-44 border-4 border-slate-300 rounded-2xl hover:border-sky-200 hover:bg-sky-100 hover:drop-shadow-lg duration-200">
              <i class="fa-solid fa-file-invoice text-5xl text-orange-400"></i>
              <p class="font-bold text-xl ">Mutasi</p>
          </div>
        </a>
  </div>
@endsection