<script setup>
  //General imports
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { useForm } from '@inertiajs/vue3'

  //Component imports
  import GeneralField from '@/Components/Form Components/GeneralField.vue';

  //Form
  const form = useForm({
    project_name: null,
    description: null,
    inclusions: null,
    exclusions: null,
    project_value_aud_dollars: null,
  })

  //Submit form
  function submit() {
    form.post('/projects', {
      preserveScroll: true
    })
  }

</script>

<template>
    <Head title="New Project" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Project</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                              <div class="w-full">
                                <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
                                  <form @submit.prevent="submit">

                                    <GeneralField
                                      type="text"
                                      label="Project Name"
                                      field_name="project_name"
                                      :form="form"
                                      :required=true
                                      :autofocus=true
                                    />

                                    <GeneralField
                                      type="textarea"
                                      label="Description"
                                      field_name="description"
                                      :form="form"
                                      :required=true
                                      :autofocus=false
                                      rows="5"
                                    />

                                    <GeneralField
                                      type="textarea"
                                      label="Inclusions"
                                      field_name="inclusions"
                                      :form="form"
                                      :required=true
                                      :autofocus=false
                                      rows="3"
                                    />

                                    <GeneralField
                                      type="textarea"
                                      label="Exclusions"
                                      field_name="exclusions"
                                      :form="form"
                                      :required=false
                                      :autofocus=false
                                      rows="3"
                                    />

                                    <GeneralField
                                      type="number"
                                      label="Project Value"
                                      field_name="project_value_aud_dollars"
                                      :form="form"
                                      :required=true
                                      :autofocus=false
                                    />

                                    <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">
                                      Submit
                                    </button>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>