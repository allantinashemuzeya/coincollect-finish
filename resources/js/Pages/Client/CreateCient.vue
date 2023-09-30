<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm} from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    phone_number: '',
    country: 'South Africa',
    bank_name: '',
    account_number: 'Cheque',
    account_name: '',
    account_type: '',
    Swift_code: '',
    desired_reference: '',
    desired_payment_methods: [],
});

const submit = () => {
    form.post(route('client.store'));
};

</script>

<template>
    <GuestLayout>
        <Head title="Client Information"/>

        <h2>Client Information</h2>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            In order to sell and buy coins on CoinCollect we wiil need some information from you.
            Basically we need to know how to pay you and how to contact you.
        </div>

        <div v-if="status"
             class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>

                <InputLabel for="phone_number" value="Phone Number"/>

                <TextInput
                    id="phone_number"
                    type="text"
                    class="form-control"
                    v-model="form.phone_number"
                    required
                    autofocus
                    autocomplete="phone_number" />
                <InputError class="mt-2" :message="form.errors.phone_number"/>

                <InputLabel for="country" value="Country"/>
                <TextInput
                    id="country"
                    type="text"
                    disabled="disabled"
                    class="form-control"
                    v-model="form.country"
                    required
                    autofocus
                    autocomplete="country" />

                <InputLabel for="bank_name" value="Bank Name"/>
                <TextInput
                    id="bank_name"
                    type="text"
                    class="form-control"
                    v-model="form.bank_name"
                    required
                    autofocus
                    autocomplete="bank_name" />
                <InputError class="mt-2" :message="form.errors.bank_name"/>

                <InputLabel for="account_number" value="Account Number"/>

                <TextInput
                    id="account_number"
                    type="text"
                    class="form-control"
                    v-model="form.account_number"
                    required
                    autofocus
                    autocomplete="account_number" />
                <InputError class="mt-2" :message="form.errors.account_number"/>

                <InputLabel for="account_name" value="Account Name"/>

                <TextInput
                    id="account_name"
                    type="text"
                    class="form-control"
                    v-model="form.account_name"
                    required
                    autofocus
                    autocomplete="account_name" />
                <InputError class="mt-2" :message="form.errors.account_name"/>

                <InputLabel for="account_type" value="Account Type"/>

                <TextInput
                    id="account_type"
                    type="text"
                    class="form-control"
                    v-model="form.account_type"
                    required
                    autofocus
                    autocomplete="account_type" />

                <InputLabel for="Swift_code" value="Swift Code"/>

                <TextInput
                    id="Swift_code"
                    type="text"
                    class="form-control"
                    v-model="form.Swift_code"
                    autofocus
                    autocomplete="Swift_code" />

                <InputLabel for="desired_reference" value="Desired Reference"/>

                <TextInput
                    id="desired_reference"
                    type="text"
                    class="form-control"
                    v-model="form.desired_reference"
                    autofocus
                    autocomplete="desired_reference" />

                <InputLabel for="desired_payment_methods" value="How would you like to get paid."/>

                <select multiple
                    class="form-select"
                    id="desired_payment_methods"
                    required
                    v-model="form.desired_payment_methods"
                    aria-label="Default select example">
                    <option selected>Select Payment Methods </option>
                    <option value="ewallet">E Wallet </option>
                    <option value="electronic_funds_transfer">EFT / Direct Bank Transfer</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="btn btn-primary"
                               :class="{ 'opacity-25': form.processing } "
                               :disabled="form.processing">
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
