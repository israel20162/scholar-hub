 @props(['placeHolder'])

 <form class="md:w-1/3 flex justify-evenly gap-1 mb-3 ml-auto md:mr-1 ">
     <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search {{$placeHolder}}..."
         class="w-full p-2 rounded-lg shadow-sm text-gray-900 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-500">
     <img wire:loading.delay.long wire:target="search" class="h-8 w-8 my-auto" src="{{ asset('svg/spinner-2.svg') }}" />
 </form>
