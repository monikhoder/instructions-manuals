<x-usertap>
<x-slot name="title">
    {{ __('Profile') }}
</x-slot>
<div class="py-10 grid col-span-12">
    <div class="col-span-12">
        @include('components.profile.update-profile-information-form')
    </div>
    <div class="col-span-12 mt-2">
        @include('components.profile.update-password-form')
    </div>
    <div class="col-span-12 mt-2">
        @include('components.profile.delete-user-form')
    </div>

</div>


</x-usertap>
