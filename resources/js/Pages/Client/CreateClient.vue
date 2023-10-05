<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm} from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import {computed} from "vue";

defineProps({
    status: {
        type: String,
    },

});


const page = usePage()

const user = computed(() => page.props.auth.user)

const form = useForm({
    phone_number: '',
    country: 'South Africa',
    bank_name: '',
    account_number: '',
    account_name: '',
    account_type: 'Cheque',
    Swift_code: 'Default',
    desired_payment_methods: [],
});

const submit = () => {
    form.post(route('client.store'));
};

</script>

<template>
    <GuestLayout>
        <Head title="Client Information"/>

        <h2>Banking Details</h2>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
           Right {{ user.name }}, in order to sell and buy coins on CoinCollect we will need some information from you.
            Basically we need to know how to pay you and how to contact you.
        </div>

        <div v-if="status"
             class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <div>
                    <InputLabel for="phone_number" value="Phone Number"/>

                    <TextInput
                        id="phone_number"
                        type="text"
                        class="form-control"
                        v-model="form.phone_number"
                        required
                        autofocus
                        placeholder="eg +27 82 123 4567"
                        autocomplete="phone_number" />
                    <InputError class="mt-2" :message="form.errors.phone_number"/>
                </div>

                <div class="mt-4">
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
                </div>

                <div class="mt-4">
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
                </div>

                <div class="mt-4">
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
                </div>

                <div class="mt-4">
                    <InputLabel for="account_type" value="Account Type"/>
                    <TextInput
                        id="account_type"
                        type="text"
                        class="form-control"
                        v-model="form.account_type"
                        required
                        autofocus
                        autocomplete="account_type" />
                    <InputError class="mt-2" :message="form.errors.account_type"/>
                </div>

                <div class="mt-4">
                    <InputLabel for="desired_payment_methods" value="How would you like to get pai?."/>
                    <br/>
                    <div class="form-check form-check-primary form-check-inline">
                        <input v-model="form.desired_payment_methods"  class="form-check-input" type="checkbox" id="desired_payment_methods_ewallet">
                        <label class="form-check-label" for="form-check-default">
                            E Wallet
                        </label>
                    </div>


                    <div class="form-check form-check-primary form-check-inline">
                        <input v-model="form.desired_payment_methods"
                               class="form-check-input"
                               type="checkbox"
                               id="desired_payment_methods_eft">
                        <label class="form-check-label" for="form-check-default">
                            EFT / Direct Bank Transfer
                        </label>
                    </div>
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="btn btn-primary"
                               :class="{ 'opacity-25': form.processing } "
                               :disabled="form.processing">
                    Finish Registration
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
