@extends('layouts.app')
@section('content')
  @php
  function nominal($money){
      $rupiah = "Rp " . number_format($money,2,',','.');
      return $rupiah;
  }
  @endphp 
  <div class="p-12">
    <div class="grid grid-cols-9 font-bold text-center text-gray-500 pb-2 gap-6 border-b-2 border-gray-300">
      <div>No</div>
      <div class="col-span-3">Nominal</div>
      <div class="col-span-2">Tipe</div>
      <div class="col-span-3 text-right">Tanggal</div>
    </div>
    @foreach ($histories as  $index => $history)
      <div class="grid grid-cols-9 font-bold text-gray-800 py-2 gap-6 border-b-2 border-gray-300 last:border-0">
        <div class="text-center">{{$index + 1}}</div>
        <div class="col-span-3 text-right">{{nominal($history->nominal)}}</div>
        <div class="col-span-2 text-center"><span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-{{$history->type == 'in' ? 'green' : 'red'}}-500 text-white rounded-full">{{$history->type == 'in' ? 'masuk' : 'keluar'}}</span></div>
        <div class="col-span-3 text-right">{{$history->created_at}}</div>
      </div>
    @endforeach
    <div class="mt-2">
      {{ $histories->links() }}
    </div>
  </div>
@endsection