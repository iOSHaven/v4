<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';

const form = useForm({
    name: '',
    website: ''
});

const createTeam = () => {
    form.post(route('teams.store'), {
        errorBag: 'createTeam',
        preserveScroll: true,
    });
};

console.log(this)
</script>

<template>
    <JetFormSection @submitted="createTeam">
        <template #title>
            Team Details
        </template>

        <template #description>
            Create a new team to collaborate with others on projects.
        </template>

        <template #form>
            <div class="col-span-6">
                <JetLabel value="Team Owner" />

                <div class="flex items-center mt-2">
                    <img class="object-cover w-12 h-12 rounded-full" :src="$page.props.user.photo_url" :alt="$page.props.user.name">

                    <div class="ml-4 leading-tight">
                        <div>{{ $page.props.user.name }}</div>
                        <div class="text-sm text-gray-700">
                            {{ $page.props.user.email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="name" value="Team Name" />
                <JetInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
                <JetInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <JetLabel for="name" value="Website" />
              <JetInput
                  id="website"
                  v-model="form.website"
                  type="text"
                  class="block w-full mt-1"
              />
              <JetInputError :message="form.errors.website" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </JetButton>
        </template>
    </JetFormSection>
</template>
