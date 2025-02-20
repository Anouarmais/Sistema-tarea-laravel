
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<x-app-layout>
   

   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                   <h1 class="text-center text-7xl text-black">Lista de tareas</h1>
                   <br>

                  
                   <x-todasuser :tasks="$tasks" :users="$users" :projects="$projects ?? collect()"></x-todasuser>
                   <div class="flex justify-end ml-4">

</div>

               </div>
           </div>
       </div>
   </div>
</x-app-layout>
<x-footer></x-footer>
</body>
</html>