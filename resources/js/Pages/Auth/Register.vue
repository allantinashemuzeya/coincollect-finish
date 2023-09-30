<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="col-md-12 mb-3">

            <h2>Sign Up</h2>
            <p>Enter your email and password to register</p>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel class="form-label" for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="form-control add-billing-address-input"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel class="form-label" for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="form-control"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel class="form-label" for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="form-control"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="form-control"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="col-12">
                <div class="mt-4">
                    <div class="form-check form-check-primary form-check-inline">
                        <input class="form-check-input me-3" required type="checkbox" id="form-check-default">
                        <label class="form-check-label" for="form-check-default">
                            I agree the <a href="/terms" class="text-primary">Terms and Conditions</a>
                        </label>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="mb-4">
                    <PrimaryButton class="ml-4 btn btn-primary  w-100" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </div>

            <div class="col-12 mb-4">
                <div class="">
                    <div class="seperator">
                        <hr>
                        <div class="seperator-text"> <span>WELCOME TO COIN COLLECT</span></div>
                    </div>
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">

                <div class="col-12">
                    <div class="text-center">
                        <p class="mb-0">Already have an account ? <Link :href="route('login')" class="text-warning">Sign in</Link></p>
                    </div>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
