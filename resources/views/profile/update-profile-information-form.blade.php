<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información de perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Fotografia') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="object-cover w-20 h-20 rounded-full">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block w-20 h-20 rounded-full"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Seleccionar fotografia') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Eliminar Fotografia') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre completo') }}" />
            <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
            <x-jet-input id="email" type="email" class="block w-full mt-1" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Institución -->
        <div class="col-span-6 sm:col-span-4">
            <label for="institution">Institución</label>
            <select name="institution_id" id="institution_id" class="block w-full mt-1" wire:model.defer="state.institution_id">
                <option value="{{ Auth::user()->institution->id }}" selected>{{ Auth::user()->institution->name }}</option>
                @foreach ($institutions as $item)
                    @if($item->id != Auth::user()->institution->id)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('institution_id') <span class="mt-2 text-sm text-red-500">{{ $message }}</span>@enderror
        </div>

        <!-- Decsription -->
        <div class="col-span-6 sm:col-span-4">
            <label for="description">Descripción</label>
            <textarea class="block w-full mt-1" id="description"  wire:model.defer="state.description" ></textarea>
            @error('description') <span class="mt-2 text-sm text-red-500">{{ $message }}</span>@enderror
        </div>

        <!-- Decsription -->
        <div class="col-span-6 sm:col-span-4">
            <label for="estudies">Formación academica</label>
            <textarea class="block w-full mt-1" id="estudies"  wire:model.defer="state.estudies" ></textarea>
            @error('estudies') <span class="mt-2 text-sm text-red-500">{{ $message }}</span>@enderror
        </div>

        
        
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Información actualizada.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
