<script setup>
  //General imports
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { useForm } from '@inertiajs/vue3'

  //Component imports
  import GeneralField from '@/Components/Form Components/GeneralField.vue';

  //Props
  const props = defineProps({ 
      company: Object
  })

  //Form
  const form = useForm({
    company_name: props.company.company_name,
    company_email: props.company.company_email,
    address: props.company.address,
    website: props.company.website,
  })

  //Submit form
  function submit() {
    form.put('/companies/'+props.company.id, {
      preserveScroll: true
    })
  }

</script>

<template>
    <Head title="Edit Company" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit {{ company_name }}</h2>
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
                                      label="Company Name"
                                      field_name="company_name"
                                      :form="form"
                                      :required=true
                                      :autofocus=true
                                    />

                                    <GeneralField
                                      type="email"
                                      label="Company Email"
                                      field_name="company_email"
                                      :form="form"
                                      :required=true
                                      :autofocus=false
                                    />

                                    <GeneralField
                                      type="text"
                                      label="Address"
                                      field_name="address"
                                      :form="form"
                                      :required=true
                                      :autofocus=false
                                    />

                                    <GeneralField
                                      type="url"
                                      label="Website"
                                      field_name="website"
                                      :form="form"
                                      :required=false
                                      :autofocus=false
                                    />

                                    <div v-if="form.isDirty" class="text-center">
                                      There are unsaved form changes.
                                    </div>

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