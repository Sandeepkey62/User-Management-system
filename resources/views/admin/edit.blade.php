<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

<style type="text/css">
	table, th, td {
  border: 1px solid;
}
</style>
    <div class="py-12">

        @if(Session::has('msg'))
         {{session::get('msg')}}
        @endif
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

               <form action="{{route('admin.update')}}" method='post'>
               @csrf
               <input type="hidden" name='id' value="{{base64_encode($details->id)}}">
               <label>Name</label>
               <input type='text' name='name' class="form-control" value="{{$details->name}}">
                <label>Email</label>
               <input type='text' name='email' value="{{$details->email}}">
                <label>New password</label>
               <input type='password' name='password'>
               <button type='submit' name='submit'>Update</button>
               </form>
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
