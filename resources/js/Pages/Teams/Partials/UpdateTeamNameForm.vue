<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';

const props = defineProps({
    team: Object,
    permissions: Object,
    // user: Object,
});


const form = useForm({
    _method: 'PUT',
    name: props.team.name,
    photo: null,
});

const updateTeamName = () => {
    if (photoInput.value) {
      form.photo = photoInput.value.files[0];
    }

    form.post(route('teams.update', props.team), {
        errorBag: 'updateTeamName',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const photoPreview = ref(null);
const photoInput = ref(null);

const selectNewPhoto = () => {
  photoInput.value.click();
};

const updatePhotoPreview = () => {
  const photo = photoInput.value.files[0];

  if (! photo) return;

  const reader = new FileReader();

  reader.onload = (e) => {
    photoPreview.value = e.target.result;
  };

  reader.readAsDataURL(photo);
};

const deletePhoto = () => {
  Inertia.delete(route('current-team-photo.destroy', props.team), {
    preserveScroll: true,
    onSuccess: () => {
      photoPreview.value = null;
      clearPhotoFileInput();
    },
  });
};

const clearPhotoFileInput = () => {
  if (photoInput.value?.value) {
    photoInput.value.value = null;
  }
};
</script>

<template>
    <JetFormSection @submitted="updateTeamName">
        <template #title>
            Team Name
        </template>

        <template #description>
            The team's name and owner information.
        </template>

        <template #form>

            <!-- Profile Photo -->
            <div v-if="$page.props.jetstream.managesProfilePhotos" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input
                ref="photoInput"
                type="file"
                class="hidden"
                @change="updatePhotoPreview"
            >

            <JetLabel for="photo" value="Photo" />

            <!-- Current Profile Photo -->
            <div v-show="! photoPreview" class="mt-2">
              <img :src="team.profile_photo_url" :alt="team.name" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
            </div>

            <JetSecondaryButton class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
              Select A New Photo
            </JetSecondaryButton>

            <JetSecondaryButton
                v-if="team.profile_photo_path"
                type="button"
                class="mt-2"
                @click.prevent="deletePhoto"
            >
              Remove Photo
            </JetSecondaryButton>

            <JetInputError :message="form.errors.photo" class="mt-2" />
          </div>

            <!-- Team Owner Information -->
            <div class="col-span-6">
                <JetLabel value="Team Owner" />

                <div class="flex items-center mt-2">
                    <img class="w-12 h-12 rounded-full object-cover" :src="team.owner.profile_photo_url" :alt="team.owner.name">

                    <div class="ml-4 leading-tight">
                        <div>{{ team.owner.name }}</div>
                        <div class="text-gray-700 text-sm">
                            {{ team.owner.email }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Name -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="name" value="Team Name" />

                <JetInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    :disabled="! permissions.canUpdateTeam"
                />

                <JetInputError :message="form.errors.name" class="mt-2" />
            </div>
        </template>

        <template v-if="permissions.canUpdateTeam" #actions>
            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </JetActionMessage>

            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </JetButton>
        </template>
    </JetFormSection>
</template>
