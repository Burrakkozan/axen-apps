<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button class="mr-5" wire:click="dispatchEvent">
            {{ __('Dispatch Event') }}
        </x-jet-button>
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Quantıtıy</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">slug</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">content</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if ($products->count())
                            @foreach ($products as $Product)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $Product->title }}
                                    </td>

                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $Product->quantity }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $Product->Price }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $Product->category_id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        <img src="{{ Storage::url("/storage/app/{$Product->image}") }}" alt="{{ $Product->image }}" width="60" />
                                    </td>

                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        @if ($Product->status == 1)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Active
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                              Inactive
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        <a
                                            class="text-indigo-600 hover:text-indigo-900"
                                            target="_blank"
                                            href="{{ URL::to('/'.$Product->slug)}}"
                                        >
                                            {{ $Product->slug }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{!! \Illuminate\Support\Str::limit($Product->content, 50, '...') !!}</td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button wire:click="updateShowModal({{ $Product->id }})">
                                            {{ __('Update') }}
                                        </x-jet-button>
                                        <x-jet-danger-button wire:click="deleteShowModal({{ $Product->id }})">
                                            {{ __('Delete') }}
                                            </x-jet-button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <br/>
    {{ $products->links() }}

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Page') }} {{ $modelId }}
        </x-slot>

        <form wire:submit.prevent="create">
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.defer="title" />
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Keywords') }}" />
                    <x-jet-input id="keywords" class="block mt-1 w-full" type="text" wire:model.defer="keywords" />
                    @error('keywords') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('detail') }}" />
                    <x-jet-input id="detail" class="block mt-1 w-full" type="text" wire:model.defer="detail" />
                    @error('details') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Price') }}" />
                    <x-jet-input id="price" class="block mt-1 w-full" type="number" wire:model.defer="price" />
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Sale Price') }}" />
                    <x-jet-input id="price" class="block mt-1 w-full" type="number" wire:model.defer="sale_price" />
                    @error('sale_price') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('quantity') }}" />
                    <x-jet-input id="quantity" class="block mt-1 w-full" type="number" wire:model.defer="quantity" />
                    @error('quantity') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <x-jet-label for="status" value="{{ __('Status') }}" />
                    <select wire:model="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status') <span class="error">{{ $message }}</span> @enderror


                <select wire:model="category_id" class="form-control">
                    <option> Select Category </option>
                    @php($categories= \App\Models\Category::all())
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <label class="text-danger">{{$message}}</label>
                @enderror

                <div class="mt-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                         <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        http://localhost:8000/
                    </span>
                        <x-jet-input id="slug" class="block mt-1 w-full" type="text" wire:model.defer="slug" placeholder="url-slug" autocomplete=true />
                    </div>
                    @error('slug') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4" wire:model.debounce.365ms="content" wire:ignore>
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white">
                            <label class="block text-gray-700 text-sm text-xl font-bold mb-2" for="content">
                                {{ __('Content') }}
                            </label>
                            <div class="body-content">
                                <input id="content" value="" type="hidden" name="content">
                                <trix-editor input="content"></trix-editor>
                            </div>
                        </div>
                    </div>
                    @error('content')
                    <p class="text-red-700 font-semibold mt-2">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Image') }}" />
                    <x-jet-input id="image" class="block mt-1 w-full" type="file" wire:model.defer="image" />
                    @error('image') <span class="error">{{ $message }}</span> @enderror
                </div>



            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-button>
            </x-slot>
        </form>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                    </x-jet-danger-button>
                    @else
                        <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                            {{ __('Create') }}

                            </x-jet-danger-button>
            @endif

        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}

    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Page') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this page? Once the page is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Page') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>