<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InfoBanner from '@/Components/InfoBanner.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: 'admin@gmail.com',
    password: 'admin',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <!-- Test credentials -->
        <div class="grid grid-cols-1">
            <div class="mb-1">
                <InfoBanner 
                    line1="Test Project Owner:" 
                    line2="Email:project@gmail.com" 
                    line3="Password:project"
                />
            </div>
            <div class="mb-1">
                <InfoBanner 
                    line1="Test Contractor:" 
                    line2="Email:contractor@gmail.com" 
                    line3="Password:contractor"
                />
            </div>
            <div>
                <InfoBanner 
                    line1="Test Admin:" 
                    line2="Email:admin@gmail.com" 
                    line3="Password:admin"
                /> 
            </div>
        </div>
        <br>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
        <div class="text-center">
            <br><hr><br>
            <Link :href="route('landing')" class="rounded-lg px-2 py-1 border-2 border-blue-500 text-blue-500 hover:bg-blue-600 hover:text-blue-100 duration-300 mr-2">Home page</Link>
            <Link :href="route('register')" class="rounded-lg px-2 py-1 border-2 border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-gray-100 duration-300">Register Instead</Link>
        </div>
    </GuestLayout>
</template>
