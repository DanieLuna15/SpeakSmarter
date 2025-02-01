<script>
export default {
    name: "LessonForm"
}
</script>

<script setup>

import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

import CollectionSelector from '../Common/CollectionSelector.vue';
import { ref } from 'vue';

defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false
    },
    categories: {
        type: Object,
        required: true
    },
    levels: {
        type: Object,
        required: true
    }
})

const categoriesSelected = ref([]);
const onCategories = (_categories) => {
    categoriesSelected.value = _categories
}



defineEmits(['submit'])  
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update lesson' : 'Create a new lesson' }}
        </template>

        <template #description>
            <p class="text-gray-600">
                {{ updating ? 'Update the selected lesson' : 'Create a new lesson from scratch' }}
            </p>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                    autocomplete="name" />
                <InputError :message="$page.props.errors.name" class="mt-2" />
                <br>
                <InputLabel for="description" value="Description" />
                <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" autofocus
                    autocomplete="description" />
                <InputError :message="$page.props.errors.description" class="mt-2" />
                <br>
                <InputLabel for="content_uri" value="Content Uri" />
                <TextInput id="content_uri" type="text" class="mt-1 block w-full" v-model="form.content_uri" autofocus
                    autocomplete="content_uri" />
                <InputError :message="$page.props.errors.content_uri" class="mt-2" />

                <br>
                <InputLabel value="PDF" />
                <SecondaryButton class="mt-2 mr-2" type="button" @click="$emit('add-pdf')">Upload Pdf</SecondaryButton>
                <InputError :message="$page.props.errors.pdf_uri" class="mt-2" />

                <br>
                <div class="w-full mt-4">
                    <div class="flex">
                        <div class="w-1/2 mr-1">
                            <InputLabel for="level_id" value="Level" />
                            <select name="level_id" id="level_id" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" v-model="form.level_id">
                                <option v-for="level in levels" :value="level.id">{{ level.name }}</option>
                            </select>
                            <InputError :message="$page.props.errors.level_id" class="mt-2" />
                        </div>

                        <div class="w-1/2 ml-1">
                            <InputLabel for="category_id" value="Category" />
                            <CollectionSelector name="categories" id="categories" :collection="categories" @onCategories="onCategories" />
                            <InputError :message="$page.props.errors.category_id" class="mt-2" />
                        </div>
                    </div>
                </div>

            </div>
        </template>
        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>


<!-- $table->string('name', 150);
$table->text('description'); // Eliminado ->max(400)
$table->string('image_uri', 255)->nullable();
$table->string('content_uri', 255);
$table->string('pdf_uri', 255);
$table->boolean('is_free')->default(false); -->
