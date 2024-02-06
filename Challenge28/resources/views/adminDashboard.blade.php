<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 

    <div x-data="component()" x-init="getUsers()" x-cloak class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-button class="ml-3" @click="openModal = true">
                        Add new user
                    </x-button>

                    <div class="w-full lg:w-6/6">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Full name</th>
                                        <th class="py-3 px-6 text-left">Email</th>
                                        <th class="py-3 px-6 text-left">User type</th>
                                        <th class="py-3 px-6 text-center">Is active</th>
                                        <th class="py-3 px-6 text-center"></th>
                                    </tr>
                                </thead>
                                <template x-for="user  in users" :key='user.id'>
                                    <tbody class="text-gray-600 text-sm font-light">

                                        {{-- @foreach ($users as $user) --}}
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td x-text="user.username" class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium" x-text='user.username'></span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-left">
                                                    <span x-text='user.email'></span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class=" items-left">
                                                    <span x-text='user.type'></span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span x-show="user.is_active"
                                                    class="px-3 py-1 rounded-full text-xs bg-green-200">
                                                    Active
                                                </span>
                                                <span x-show="!user.is_active"
                                                    class="px-3 py-1 rounded-full text-xs bg-red-200">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex items-center justify-center">
                                                    <div @click="deactivateUser(user.id)"
                                                        class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110 group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                            id="Capa_1" x="0px" y="0px" viewBox="0 0 30.143 30.143"
                                                            style="enable-background:new 0 0 30.143 30.143;"
                                                            xml:space="preserve">
                                                            <g>
                                                                <path style="fill:#030104;"
                                                                    d="M20.034,2.357v3.824c3.482,1.798,5.869,5.427,5.869,9.619c0,5.98-4.848,10.83-10.828,10.83   c-5.982,0-10.832-4.85-10.832-10.83c0-3.844,2.012-7.215,5.029-9.136V2.689C4.245,4.918,0.731,9.945,0.731,15.801   c0,7.921,6.42,14.342,14.34,14.342c7.924,0,14.342-6.421,14.342-14.342C29.412,9.624,25.501,4.379,20.034,2.357z" />
                                                                <path style="fill:#030104;"
                                                                    d="M14.795,17.652c1.576,0,1.736-0.931,1.736-2.076V2.08c0-1.148-0.16-2.08-1.736-2.08   c-1.57,0-1.732,0.932-1.732,2.08v13.496C13.062,16.722,13.225,17.652,14.795,17.652z" />
                                                            </g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                            <g></g>
                                                        </svg>
                                                        <div
                                                            class="absolute bottom-0 left-0 right-0  flex-col   items-center hidden mb-6 group-hover:flex">
                                                            <span
                                                                class="relative  group-hover:flex z-0 p-2 text-xs leading-none text-white whitespace-no-wrap bg-black shadow-lg">Deactivate</span>
                                                            <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                                                        </div>
                                                    </div>
                                                    <div @click="deleteUser(user.id)"
                                                        class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110 group">
                                                        <svg data-name="martin" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        <div
                                                            class="absolute bottom-0 left-0 right-0  flex-col z-0  items-center hidden mb-6 group-hover:flex">
                                                            <span
                                                                class="relative  group-hover:flex z-0 p-2 text-xs leading-none text-white whitespace-no-wrap bg-black shadow-lg">Delete</span>
                                                            <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </template>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal create user --}}
        <div x-show.transition.duration.500ms="openModal"
            class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center px-4 md:px-0">

            <div @click.away="openModal = false" class="p-10 w-2/4  bg-white shadow-md rounded my-6  z-10">
                <button class="float-right" @click.prevent @click="openModal = false">X</button>
                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" x-model="email" />
                    <div x-show.transition.duration.500ms="emailError"
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span x-text="emailError" class="block sm:inline"></span>
                        <span @click="{emailError = ''}" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>

                </div>
                <!-- Username -->
                <div>
                    <x-label for="username" value="Username" />
                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" x-model='username' />
                    <div x-show.transition.duration.500ms="usernameError"
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span x-text="usernameError" class="block sm:inline"></span>
                        <span @click="{usernameError = ''}" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                        x-model='password' />
                    <div x-show.transition.duration.500ms="passwordError"
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span x-text="passwordError" class="block sm:inline"></span>
                        <span @click="{passwordError = ''}" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>

                </div>
                <div class="flex items-center justify-end mt-4">

                    <button @click="createUser()" @click="$refresh('component')" class="ml-3">
                        Create
                    </button>
                </div>
            </div>

        </div>

        {{-- End modal --}}
    </div>
</x-app-layout>
<script>
    function component() {
        return {
         openModal: false,
         users:[
             
         ],
         "username": "",
         "password": "",
         "email":"",
         "emailError": null,
         "passwordError": null,
         "usernameError": null,

         getUsers() {
            fetch(location.origin + '/api/users').then(res => res.json()).then(data => {this.users = data})
         },
        createUser() {
        axios.post(location.origin +"/api/adminDashboard/create/user" ,
        {
        username: this.username,
        password: this.password,
        email: this.email
        
        })
        .then(res => {
        console.log(res)
        this.openModal = false
        this.getUsers()
        })
        .catch(err => {
        const messages = err.response.data.errors
        console.log(err.response)
        this['emailError'] , this['passwordError'] , this['usernameError'] = null
        Object.entries(messages).filter( errMsg => {
        let errorKey = errMsg[0] + "Error"
        let messages = errMsg[1]
        this[errorKey] = messages
         })
        })
        },
        deleteUser(userId){
            axios.delete(location.origin + `/api/user/${userId}/delete`)
            .then( res => {
    
            this.getUsers()
            })
            .catch( err => {
                console.log(err.response)
            } )
        },
        deactivateUser(UserId){
            // send call to deactivate user
            axios.post(location.origin + `/api/user/${UserId}/deactivate`)
            .then(res => {
                this.getUsers()
              console.log(res)
            })
            .catch(err => {
                console.log(err)

            })
        }
        }
        }
   
</script>