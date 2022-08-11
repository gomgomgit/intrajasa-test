@extends('layouts.app')
@section('content')
  <div class="px-12 pt-12">
    <div>
      <form action="{{route('postTransaction', 'out')}}" method="POST">
        @csrf
        <div>
          <div class="mb-4">
            <label class="block">
              <span class="block font-bold text-slate-700">Nominal :</span>
              <input type="number" value="tbone" name="nominal" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
              "/>
            </label>
            
            @error('nominal')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
          </div>
          <div>
            <label class="block">
              <span class="block font-bold text-slate-700">Catatan :</span>
              <textarea
                name="note"
                class="mt-1 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                rows="3"
                placeholder="Catatan"
              ></textarea>
            </label>
          </div>
        </div>

        <div class="mt-6 text-center">
          <button class="px-10 py-2 text-white bg-blue-400 hover:bg-blue-500 active:bg-blue-600 duration-200 rounded-full">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection