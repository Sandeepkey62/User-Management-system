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
    	@if(Session::has('success'))
    	{{Session::get('success')}}
    	@endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                	<table class="table ">
                		<thead>
                			<tr>
                				<th>Sr</th>
                				<th>Name</th>
                				<th>Email</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			@foreach($details as $key=>$value)
                			@php 
							$id=base64_encode($value->id);
                			@endphp
                			<tr>
                				<td>{{$value->id}}</td>
                				<td>{{$value->name}}</td>
                				<td>{{$value->email}}</td>
                				<td>
                					<a href="{{route('admin.edit',['id'=>$id])}}">Edit</a>
                				<br><a href="{{route('admin.delete',['id'=>$id])}}">Delete</a></td>
                			</tr>
                			@endforeach
                		</tbody>
                	</table>
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
